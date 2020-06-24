<?php

session_start();

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDB";
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

	$delete_id = $_GET['del'];
	echo $delete_id;
	$delete_sql = "DELETE FROM event WHERE id = '$delete_id' ";

	if ($conn->query($delete_sql) === TRUE){
		header('location: manageEvent.php');
	} else {
  		echo "Error deleting record: ".$conn->error;
	}

$conn->close();
?>

