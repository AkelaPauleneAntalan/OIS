<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body{
		font-family: sans-serif;
		background: url('images/bg-admin.jpg') no-repeat;
		background-size: 100%;
	}
	ul{
		padding: 0px;
		display: flex;
		margin: 0px;
	}
	#header li{
		display: inline-block;
		padding: 25px 35px;
	}
	#header ul a:link{
		text-decoration: none;
	}
	#header ul li:visited{
		color:black;
	}
	#header ul li:hover{
		background: lightcoral;
		color: white;
	}
	#header ul li:active{
		text-decoration: underline;
		color: white;
	}
	table{
		margin: 0px;
		color: black;
		border-collapse: collapse;
		background-color: white;
		margin: 50px auto 0;
	}
	table, th{
		border: 2px solid black;
		padding: 5px 55px 5px 5px;
	}
	td{
		padding: 15px;
		text-align: center;
	}
	th{
		padding: 25px 35px; 
		background-color: lightpink;
	}
	</style>
</head>
<body>
	<div id="header">
		<ul>
			<li><a href="dashboard.php">BACK TO DASHBOARD</a></li>
		</ul>
	</div>
	<br>
<table>
<tr>
	<th>User ID</th>
	<th>Username</th>
	<th>Password</th>
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
$sql = "SELECT * FROM user";
$result = $conn -> query($sql);

//check if the number of rows in the result set is greater than 0 which means that record(s) exist
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		echo "<tr>
				<td>".$row['id']."</td>
				<td>".$row['username']."</td>
				<td>".$row['password']."</td>
			</tr>";
	}echo "</table>";
}
// else{
// 	echo "0 results";
// }
$conn->close();
?>