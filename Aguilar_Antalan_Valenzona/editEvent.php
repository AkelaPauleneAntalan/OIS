<?php 

session_start();

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

if(isset($_GET['upd'])){
$id = $_GET['upd'];
$dis_sql = "SELECT * FROM event WHERE id ='$id' ";
$result = $conn -> query($dis_sql);

//check if the number of rows in the result set is greater than 0 which means that record(s) exist
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		$category=$row['category'];
		$title=$row['title'];
		$theme=$row['theme'];
		$startdate=$row['startdate'];
		$enddate=$row['enddate'];
		$location=$row['location'];
		$status=$row['status'];
	}
}
}

if(isset($_POST['update'])){

	$id = $_POST['id'];

	$category = $_POST['category'];
	$title = $_POST['title'];
	$theme = $_POST['theme'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$location = $_POST['location'];
	$status = $_POST['status'];

	$upd_sql = "UPDATE event SET category = '$category', title = '$title', theme = '$theme', startdate = '$startdate', enddate = '$enddate', location = '$location', status = '$status' WHERE id = '$id' ";

	if($conn->query($upd_sql) === TRUE){
		// echo "UPDATED SUCCESSFULLY";
		header('location:manageEvent.php');
	}else{
		echo "Error: ".$upd_sql."<br>".$conn->error;
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
	.dropdown a:hover {
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
		<input type="hidden" name="id" value=<?php echo $id; ?> >
		<input type="hidden" name="category" value=<?php echo $category; ?> >
		<div id="add-wrap">
		<select class="btn" name="category">
			<option selected disabled>
 				<?php
					if($category != ""){
						echo $category;
					}else{
						echo "CATEGORY";
					}
				?>
			</option>
			<?php
						
			$sql = "SELECT * FROM categories";
			$result = $conn -> query($sql);
				if($result->num_rows>0){
					while($row = $result->fetch_assoc()){
						echo "<option value =' ".$row['category']." '>".$row['category']."</option><br>";
					}
				}else{
					echo "0 results";
				}
			?>
		</select>
			<p>Event Title:<input type="text" name="title" class="form-control" value="<?php echo $title ?>" required></p>
			<p>Theme:" <input type="text" name="theme" class="form-control" value="<?php echo $theme ?>" required> "</p>
			<p>Start Date:<input type="date" name="startdate" class="form-control" value="<?php echo $startdate ?>" required></p>
			<p>End Date:<input type="date" name="enddate" class="form-control" value="<?php echo $enddate ?>" required></p>
			<p>Location:<input type="text" name="location" class="form-control" value="<?php echo $location ?>" required></p>
			<p>Status:<br>
			<input type="radio" name="status" value="Up Coming" class="form-control" <?php if($status == "Up Coming"){ ?> checked <?php } ?> >Up Coming<br>
			<input type="radio" name="status" value="On Going" class="form-control" <?php if($status == "On Going"){ ?> checked <?php } ?>
			>On Going<br>
			<input type="radio" name="status" value="Accomplished" class="form-control" <?php if($status == "Accomplished"){ ?> checked <?php } ?> >Accomplished</p>
			<button class="btn btn-theme btn-round" name="update">UPDATE EVENT</button>
		</div>
	</form>
<?php $conn->close(); ?>
</body>
</html>