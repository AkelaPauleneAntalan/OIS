<!DOCTYPE html>
<html>
<head>
	<title></title>
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
  	.dropbtn {
		background-color: #fff;
  		border-color: lightcoral;
		cursor: pointer;
		border-radius: 5px;
		height: 34px;
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
		<div id="add-wrap">
			<p>Name:<input type="text" name="name" class="form-control" required></p>
			<p>Position:<input type="text" name="position" class="form-control" required></p>
			<p>Contact Number:<input type="text" name="num" class="form-control" placeholder="09*********" required ></p>
			<p>Gender:
			<input type="radio" name="gender" value="Female" class="form-control">Female
			<input type="radio" name="gender" value="Male" class="form-control">Male
			<input type="radio" name="gender" value="Other" class="form-control">Other</p>
			<p>Address:<input type="text" name="address" class="form-control" required></p>
			<p>Birthday:<input type="date" name="birthday" class="form-control" required></p>
			<p>Age:<input type="number" name="age" class="form-control" required></p>
			<button class="btn btn-theme btn-round" type="submit" name="save">ADD STAFF</button>
		</div>
	</form>
</div>
<?php

session_start();


$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

if(isset($_POST['save'])){

	$name = $_POST['name'];
	$position = $_POST['position'];
	$num = $_POST['num'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$age = $_POST['age'];

	$sql = "INSERT INTO staff (name, position, num, gender, address, birthday, age) VALUES ('$name', '$position', '$num', '$gender', '$address', '$birthday', '$age')";

	if($conn->query($sql) === TRUE){
		// echo $num;
		header('location:manageStaff.php');
	}else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
}
$conn->close();
?>
</body>
</html>