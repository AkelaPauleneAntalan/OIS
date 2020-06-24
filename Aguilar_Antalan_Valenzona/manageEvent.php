<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body{
		font-family: sans-serif;
		background: url('images/manage.jpg') repeat-y;
		background-size: 100%;
	}
	#header a{
		text-decoration: underline;
		color: black;
	}	
	table{
		margin: 0px;
		border-collapse: collapse;
		margin: 2% 0;
		width: 100%;
		font-size: 14px;
	}
	#rwd td, #rwd th{
		border: 1px solid black;
		padding: 8px;
	}
	#rwd tr:nth-child(odd){
		background-color:  darksalmon;
	}
	#rwd tr:hover{
		background-color: #ddd;
	}
	#rwd th{
		padding: 12px 10px;
		background-color: lightcoral;
	}
	.btn {
		height: 50px;
		width: 150px;
		margin: 20px; 
	}
	.btnbtn{
		height: 25px;
		width: 100%;
		margin: 10px 3px 0 3px;
	}
	.button{
		height: 25px;
		width: 45%;
		margin: 10px 3px 0 3px;
	}
	.btn-theme {
  		background-color: lightpink;
  		border-color: lightcoral;
		color: black;
		/*font-weight: bold;*/
		font-size: 15px;
  	}
	.btn-round {
		border-radius: 20px;
		-webkit-border-radius: 20px;
	}
	</style>
</head>
<body>
	<div id="header">
		<a href="dashboard.php"><h2><img src="images/home.png" style="width:35px;"> DASHBOARD </h2></a>
	</div>
	<a href="addEvent.php"><button class="btn btn-theme btn-round">ADD NEW EVENT</button></a>
<div style="overflow-x: auto;">
<table id="rwd">
<tr>
	<th>Event ID</th>
	<th>Category</th>
	<th>Event Name</th>
	<th>Theme</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Location</th>
	<!-- <th>Poster</th> -->
	<th>Status</th>
	<th>Action</th>
</tr>

<?php

session_start();

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDB";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
//SQL to select records from Profile table
$sql = "SELECT * FROM event";
$result = $conn -> query($sql);

//check if the number of rows in the result set is greater than 0 which means that record(s) exist
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		$id=$row['id'];
		$category=$row['category'];
		$title=$row['title'];
		$theme=$row['theme'];
		$startdate=$row['startdate'];
		$enddate=$row['enddate'];
		$location=$row['location'];
		$status=$row['status'];
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $category; ?></td>
		<td><?php echo $title; ?></td>
		<td><i>"<?php echo $theme; ?>"</i></td>
		<td><?php echo $startdate; ?></td>
		<td><?php echo $enddate; ?></td>
		<td><?php echo $location; ?></td>
		<td><?php echo $status; ?></td>
		<td><a href="deleteEvent.php?del=<?php echo $id;?>"><button class="btnbtn btn-theme btn-round">Delete</button></a>
			<a href="editEvent.php?upd=<?php echo $id;?>"><button class="btnbtn btn-theme btn-round">Edit</button></a></td>
	</tr>
 <?php } ?>
 		</table>
	</div>
<?php 
// }else{
// 	echo "0 results";
}
$conn->close();
?>

</body>
</html>