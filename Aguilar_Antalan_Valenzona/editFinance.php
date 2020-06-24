<?php 

session_start();

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

if(isset($_GET['upds'])){
$id = $_GET['upds'];
$dis_sql = "SELECT * FROM finance WHERE id ='$id' ";
$result = $conn -> query($dis_sql);

//check if the number of rows in the result set is greater than 0 which means that record(s) exist
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		$id=$row['id'];
		$title=$row['title'];
		$budget=$row['budget'];
		$totalexpense=$row['totalexpense'];
		$venue=$row['venue'];
		$service=$row['service'];
		$food=$row['food'];
		$tax=$row['tax'];
		$decoration=$row['decoration'];
		$others=$row['others'];
	}
}
}

if(isset($_POST['update'])){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$budget = $_POST['budget'];
	$totalexpense= $_POST['totalexpense'];
	$venue = $_POST['venue'];
	$service = $_POST['service'];
	$food = $_POST['food'];
	$tax = $_POST['tax'];
	$decoration = $_POST['decoration'];
	$others = $_POST['others'];
	
	$sql = "UPDATE finance SET title = '$title', budget = '$budget', totalexpense = '$totalexpense', venue = '$venue', service = '$service', food = '$food', tax = '$tax', decoration = '$decoration', others = '$others' WHERE id = '$id' ";

	if($conn->query($sql) === TRUE){
		// echo "UPDATED SUCCESSFULLY";
		header('location:manageFinance.php');
	}else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
}

?>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
	body{
		font-family: sans-serif;
		background: url('images/manage.jpg') repeat-y;
		background-size: 100%;
	}
	ul{
		padding: 0px;
		display: flex;
		margin: 0px;
	}
	#header li{
		display: inline-block;
		padding: 0;
		color: black;
		width: 250px;
	}
	#header a{
		color: black;
	}
	.form-add {
		max-width: 350px;
		margin: 5px auto 0;
		background: lightpink;
		border-radius: 5px;
		-webkit-border-radius: 5px;
	}
	#add-wrap {
		padding: 25px;
		border: 1px solid black;
	}
	.btn {
		height: 34px;
		width: 100%;
		cursor: pointer;
	}
	.btn-theme {
  		background-color: #fff;
  		border-color: lightcoral;
	}
	.btn-round {
		border-radius: 20px;
		-webkit-border-radius: 20px;
	}
  	.errorMsg{
  		color: #FF0000; 
  	}
	hr { 
  		display: block;
  		margin-top: 0.5em;
  		margin-bottom: 0.5em;
  		margin-left: 0;
  		margin-right: 20px;
  		border-style: inset;
  		border-width: 2px;
  		padding: 0px;
	} 

	</style>
</head>
<body>
	<div id="header">
		<ul>
		<li><a href="dashboard.php"><h2><img src="images/home.png" style="width:35px;"> DASHBOARD </h2></a></li>
		<hr>
		<li><a href="manageFinance.php"><h2><img src="images/event.png" style="width:35px;"> VIEW FINANCE </h2></a></li>
		</ul>
	</div>
	<form class="form-add" name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<!-- <input type="hidden" name="id" value=<?php echo $id; ?> > -->
		<div id="add-wrap">
		</select>
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<h2> Event Title: <input type="text" name="title" value="<?php echo $title ?>" required/></h2>
		<h2>  BUDGET: <input type="text" name="budget" class="form-control" value="<?php echo $budget ?>" required> </h2>
		<p>
		<h2> Expenses:</h2>
				VENUE:  <input type="text" name="venue" id="venue" value="<?php echo $venue ?>" required/><br> <br>
				SERVICE: <input type="text"name="service"id="service" value="<?php echo $service ?>" required/><br> <br>
				FOOD: <input type="text" name="food"id="food" value="<?php echo $food ?>" required/><br> <br>
				TAX: <input type="text" name="tax" id="tax" value="<?php echo $tax ?>" required/><br> <br>
				DECORATION: <input type="text" name="decoration" id="decoration" value="<?php echo $decoration ?>" required/><br> <br>
				OTHERS: <input type="text" name="others" id="others" value="<?php echo $others ?>" required/><br> <br>
				<input type="button" onClick="addition()" value="Total Expense" /> 
				<input type="text" name="totalexpense" id="totalexpense" class="form-control" value="<?php echo $totalexpense ?>" class="form-control" style="color:black; background-color:white; border:2px;" required /> <br></p>
		<script>
		function addition()
		{
		      var  num1 = parseInt(document.getElementById("venue").value);
		      var  num2 = parseInt(document.getElementById("service").value);
		      var  num3 = parseInt(document.getElementById("food").value);
		      var  num4 = parseInt(document.getElementById("tax").value);
		      var  num5 = parseInt(document.getElementById("decoration").value);
		      var  num6 = parseInt(document.getElementById("others").value);
		        document.getElementById("totalexpense").value = num1 + num2 + num3 + num4 + num5 + num6;
		}
		</script>
		<button class="btn btn-theme btn-round" type="submit" name="update">UPDATE CASHFLOW</button>
		</div>
	</form>
</div>
	</form>
<?php 
$conn->close(); 
?>

</body>
</html>