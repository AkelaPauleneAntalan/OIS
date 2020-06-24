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
		<li><a href="manageEvent.php"><h2><img src="images/event.png" style="width:35px;"> VIEW EVENT </h2></a></li>
		</ul>
	</div>
	<form class="form-add" name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div id="add-wrap">
		<select class="btn" name="category">
			<option selected disabled>CATEGORY</option>
			<?php
			
			session_start();

			$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDB";

			//create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			//check connection
			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			}
			
			$sql = "SELECT * FROM categories";
			$result = $conn -> query($sql);
				if($result->num_rows>0){
					while($row = $result->fetch_assoc()){
						echo "<option
						value =' ".$row['category']." ' required>".$row['category']."</option><br>";
					}
				}else{
					echo "0 results";
				}
			$conn->close();
			?>
		</select>
			<p>Event Title:<input type="text" name="title" class="form-control" required></p>
			<p>Theme:" <input type="text" name="theme" class="form-control" required> "</p>
			<p>Start Date:<input type="date" name="startdate" class="form-control" required></p>
			<p>End Date:<input type="date" name="enddate" class="form-control" required></p>
			<p>Location:<input type="text" name="location" class="form-control" required></p>
			<p>Status:<br>
			<input type="radio" name="status" value="Up Coming" class="form-control">Up Coming<br>
			<input type="radio" name="status" value="On Going" class="form-control">On Going<br>
			<input type="radio" name="status" value="Accomplished" class="form-control">Accomplished</p>
			<button class="btn btn-theme btn-round" type="submit" name="save">ADD EVENT</button>
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
	$category = $_POST['category'];
	$title = $_POST['title'];
	$theme= $_POST['theme'];
	$startdate= $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$location = $_POST['location'];
	$status = $_POST['status'];

	$sql = "INSERT INTO event (category, title, theme, startdate, enddate, location, status) VALUES ('$category', '$title', '$theme', '$startdate', '$enddate', '$location', '$status')";

	if($conn->query($sql) === TRUE){
		header('location:manageEvent.php');
	}else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
}
$conn->close();
?>
</body>
</html>