<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body{
		font-family: sans-serif;
		background: url('images/manage.jpg') no-repeat;
		background-size: 100%;
	}
	#header a{
		text-decoration: underline;
		color: black;
		display: center;
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
		background-color: darksalmon;
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
		border-radius: 10px;
		-webkit-border-radius: 10px;
	}
	</style>
</head>
<body>
	<div id="header">
		<a href="dashboard.php"><h2><img src="images/home.png" style="width:35px;"> DASHBOARD </h2></a>
	</div>
	<a href="addFinance.php"><button class="btn btn-theme btn-round">Add CASH FLOW</button></a>
<div style="overflow-x: auto;">
<table id="rwd">
<tr>
	<th>Event ID</th>
	<th>TITLE</th>
	<th>BUDGET</th>
	<th>Venue</th>
	<th>Service</th>
	<th>Food</th>
	<th>Tax</th>
	<th>Decoration</th>
	<th>Others</th>
	<th>TOTAL EXPENSES</th>
	<th>Action</th>
</tr>

<?php

session_start();

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
$sql = "SELECT * FROM finance";
$result = $conn -> query($sql);

//check if the number of rows in the result set is greater than 0 which means that record(s) exist
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		$id=$row['id'];
		$title=$row['title'];
		$budget=$row['budget'];
		$venue=$row['venue'];
		$service=$row['service'];
		$food=$row['food'];
		$tax=$row['tax'];
		$decoration=$row['decoration'];
		$others=$row['others'];
		$totalexpense=$row['totalexpense'];
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $title; ?></td>
		<td><?php echo $budget; ?></td>
		<td><?php echo $venue; ?></td>
		<td><?php echo $service; ?></td>
		<td><?php echo $food; ?></td>
		<td><?php echo $tax; ?></td>
		<td><?php echo $decoration; ?></td>
		<td><?php echo $others; ?></td>
		<td><?php echo $totalexpense; ?></td>
		<td><a href="deleteFinance.php?dels=<?php echo $id;?>"><button class="btnbtn btn-theme btn-round">Delete</button></a>
			<a href="editFinance.php?upds=<?php echo $id;?>"><button class="btnbtn btn-theme btn-round">Edit</button></a></td>
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