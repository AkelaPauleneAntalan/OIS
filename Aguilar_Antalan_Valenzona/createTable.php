<?php

session_start();

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
//sql to create table

$usql = "CREATE TABLE IF NOT EXISTS user(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(30) NOT NULL,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL
)";

$ssql = "CREATE TABLE IF NOT EXISTS staff(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	position VARCHAR(150) NOT NULL,
	num VARCHAR(11) NOT NULL,
	gender VARCHAR(10) NOT NULL,
	address VARCHAR(100) NOT NULL,
	birthday date NOT NULL,
	age INT NOT NULL
)";

$csql = "CREATE TABLE IF NOT EXISTS categories(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	category VARCHAR(100) NOT NULL
)";

$esql = "CREATE TABLE IF NOT EXISTS event(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	category VARCHAR(100) NOT NULL,
	title VARCHAR(100) NOT NULL,
	theme VARCHAR(100) NOT NULL,
	startdate date NOT NULL,
	enddate date NOT NULL,
	location VARCHAR(100) NOT NULL,
	poster VARCHAR(100) NOT NULL,
	status VARCHAR(50) NOT NULL
)";

$asql = "CREATE TABLE IF NOT EXISTS Reports(
	name VARCHAR(50) PRIMARY KEY,
	descr VARCHAR(255) NOT NULL,
	contact VARCHAR(11) NOT NULL,
	address VARCHAR(100) NOT NULL,
	dateOfOccurence date NOT NULL,
	dateFiled date NOT NULL,
	company VARCHAR(50) NOT NULL,
	status VARCHAR(50) NOT NULL

)";

$bsql = "CREATE TABLE IF NOT EXISTS finance(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	budget VARCHAR(50) NOT NULL,
	venue VARCHAR(50) NOT NULL,
	service VARCHAR(50) NOT NULL,
	food VARCHAR(50) NOT NULL,
	tax VARCHAR(50) NOT NULL,
	decoration VARCHAR(50) NOT NULL,
	others VARCHAR(50) NOT NULL,
	totalexpense VARCHAR(50) NOT NULL
)";

$dsql= "CREATE TABLE IF NOT EXISTS monitoring (
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name varchar(200) NOT NULL,
	image longtext NOT NULL
  ) ";

if($conn->query($usql) === TRUE)
	echo "User table created successfully.";
else
	echo "Error creating table: ".$conn->error;
	
	echo "<br>";

if($conn->query($ssql) === TRUE)
	echo "Staff table created successfully.";
else
	echo "Error creating table: ".$conn->error;

	echo "<br>";

if($conn->query($csql) === TRUE)
	echo "Categories table created successfully.";
else
	echo "Error creating table: ".$conn->error;

	echo "<br>";

if($conn->query($esql) === TRUE)
	echo "Event table created successfully.";
else
	echo "Error creating table: ".$conn->error;
	
	echo "<br>";

if($conn->query($asql) === TRUE)
	echo "Reports table created successfully.";
else
	echo "Error creating table: ".$conn->error;

	echo "<br>";

if($conn->query($bsql) === TRUE)
	echo "Finance table created successfully.";
else
	echo "Error creating table: ".$conn->error;

	
	echo "<br>";

	if($conn->query($dsql) === TRUE)
	echo "Monitoring table created successfully.";
else
	echo "Error creating table: ".$conn->error;
	
$conn->close();
?>