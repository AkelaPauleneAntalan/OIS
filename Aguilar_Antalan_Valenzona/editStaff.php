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
$dis_sql = "SELECT * FROM staff WHERE id = '$id' ";
$result = $conn -> query($dis_sql);

//check if the number of rows in the result set is greater than 0 which means that record(s) exist
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){		
		$name=$row['name'];
		$position=$row['position'];
		$num=$row['num'];
		$gender=$row['gender'];
		$address=$row['address'];
		$birthday=$row['birthday'];
		$age=$row['age'];
	}
}
}

if(isset($_POST['update'])){

	$id = $_POST['id'];

	$name = $_POST['name'];
	$position = $_POST['position'];
	$num = $_POST['num'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$age = $_POST['age'];

	$upd_sql = "UPDATE staff SET name = '$name', position = '$position', num = '$num', gender = '$gender', address = '$address', birthday = '$birthday', age = '$age' WHERE id = $id";

	if($conn->query($upd_sql) === TRUE){
		// echo "UPDATED SUCCESSFULLY";
		header('location:manageStaff.php');
	}else{
		echo "Error: ".$upd_sql."<br>".$conn->error;
	}
}


?>
<html>
<head>
	<title></title>
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
		margin: 50px auto 0;
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
		<li><a href="manageStaff.php"><h2><img src="images/event.png" style="width:35px;"> VIEW STAFF </h2></a></li>
		</ul>
	</div>
<div>
	<form class="form-add" name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="hidden" name="id" value=<?php echo $id; ?> >
		<div id="add-wrap">
			<p>Name:<input type="text" name="name" class="form-control" value="<?php echo $name ?>" required></p>
			<p>Position:<input type="text" name="position" class="form-control" value="<?php echo $position ?>" required></p>
			<p>Contact Number:<input type="text" name="num" class="form-control" value="<?php echo $num ?>" required></p>
			<p>Gender:
			<input type="radio" name="gender" value="Female" class="form-control" <?php if($gender == "Female"){ ?> checked <?php } ?>>Female
			<input type="radio" name="gender" value="Male" class="form-control" <?php if($gender == "Male"){ ?> checked <?php } ?> >Male
			<input type="radio" name="gender" value="Other" class="form-control" <?php if($gender == "Other"){ ?> checked <?php } ?> >Other</p>
			<p>Address:<input type="text" name="address" class="form-control" value="<?php echo $address ?>" required></p>
			<p>Birthday:<input type="date" name="birthday" class="form-control" value="<?php echo $birthday ?>"required></p>
			<p>Age:<input type="number" name="age" class="form-control" value="<?php echo $age ?>" required></p>
			<button class="btn btn-theme btn-round" type="submit" name="update">UPDATE STAFF</button>
		</div>
	</form>
</div>
<?php $conn->close(); ?>
</body>
</html>