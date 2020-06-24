<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
	body{
		font-family: sans-serif;
		background: url('images/manage.jpg') no-repeat;
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
	.dropbtn {
		background-color: #fff;
  		border-color: lightcoral;
		cursor: pointer;
		border-radius: 20px;
		-webkit-border-radius: 20px;
		height: 34px;
	}
	.dropbtn:hover, .dropbtn:focus {
		background-color: lightpink;
	}
	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 180px;
		overflow: auto;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}
	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}
	.dropdown:hover {
		background-color: #ddd;
	}
	.show {
		display: block;
	}
	.dropdown img{
		width: 50px;
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
		<div id="add-wrap">
			<input type="text"  placeholder="Search Event ID" name ="id">
			<input type="submit" name = "search" value ="Search"> 
		<h2> Event Title: 
			<?php
		
		$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

		//create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//check connection
		if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}




		if(isset($_POST['search'])){
		$id = $_POST['id'];
		$query = "SELECT * FROM event WHERE id = '$id'";
		$result = mysqli_query($conn,$query);

			while ($row = mysqli_fetch_array($result)) {

			?>	

			<input type="text" name="title"  id="title" value="<?php echo $row['title'] ?>"style="color:black; background-color:white; border:2px;"  required  />

			<?php
			}
		}
			?>
		<h2> Budget: <input type="text" id="budget" name="budget" class="form-control" > </h2>
		<p>
		<h2> Expenses:</h2>
				VENUE:  <input type="text" id="venue" name="venue"/><br> <br>
				SERVICE: <input type="text" id="service" name="service"/><br> <br>
				FOOD: <input type="text" id="food" name="food"/><br> <br>
				TAX: <input type="text" id="tax" name="tax"/><br> <br>
				DECORATION: <input type="text" id="decoration" name="decoration"/><br> <br>
				OTHERS: <input type="text" id="others" name="others"/><br> <br>
				<input type="button" onClick="addition()" Value="Total Expense" /> 
				<input type="text" id="totalexpense" name="totalexpense" class="form-control" style="color:black; background-color:white; border:2px;" /> <br></p>
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
		<button class="btn btn-theme btn-round" type="submit" name="save">SAVE CASHFLOW</button>
		</div>
	</form>
</div>
<?php
	$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

	//create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	//check connection
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}



	if(isset($_POST['save'])){

		$title = $_POST['title'];
		$budget = $_POST['budget'];
		$totalexpense= $_POST['totalexpense'];
		$venue = $_POST['venue'];
		$service = $_POST['service'];
		$food = $_POST['food'];
		$tax = $_POST['tax'];
		$decoration = $_POST['decoration'];
		$others = $_POST['others'];
		

		$sql = "INSERT INTO finance (title, budget, venue, service, food, tax, decoration, others, totalexpense) VALUES ('$title', '$budget', '$venue', '$service', '$food', '$tax', '$decoration', '$others', '$totalexpense')";
		if($conn->query($sql) === TRUE){
			// echo $num;
			header('location:manageFinance.php');
		}else{
			echo "Error: ".$sql."<br>".$conn->error;
		}
	}
	$conn->close();
?>
</body>
</html>