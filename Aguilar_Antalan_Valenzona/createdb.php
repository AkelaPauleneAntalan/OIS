<?php
session_start();

$servername = "localhost"; $username = "root"; $password = "";

//create connection
$conn = new mysqli($servername, $username, $password);
//check connection 
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
//create database
$sql = "CREATE DATABASE OISDb";
if($conn->query($sql) === TRUE)
	echo "Database created successfully";
else
	echo "Error creating database: ".$conn->error;
//close the database connection
$conn->close();
?>