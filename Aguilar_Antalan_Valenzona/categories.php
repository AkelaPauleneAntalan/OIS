<?php

session_start();

	$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

		//create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		//check connection
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}

	$firsql = "INSERT INTO categories (id, category) VALUES ('1', 'Festivals and Fairs')";
	$secsql = "INSERT INTO categories (id, category) VALUES ('2', 'Seminars and Lectures')";
	$thisql = "INSERT INTO categories (id, category) VALUES ('3', 'Charities')";
	$fousql = "INSERT INTO categories (id, category) VALUES ('4', 'Fashion')";
	$fifsql = "INSERT INTO categories (id, category) VALUES ('5', 'Sports and Active life')";
	$sixsql = "INSERT INTO categories (id, category) VALUES ('6', 'Night Life')";

	if($conn->query($firsql) === TRUE)
		echo "Festivals and Fairs, ";
	else
		echo "Error adding category: ".$conn->error;
	if($conn->query($secsql) === TRUE)
		echo "Seminars and Lectures, ";
	else
		echo "Error adding category: ".$conn->error;
	if($conn->query($thisql) === TRUE)
		echo "Charities, ";
	else
		echo "Error adding category: ".$conn->error;
	if($conn->query($fousql) === TRUE)
		echo "Fashion, ";
	else
		echo "Error adding category: ".$conn->error;
	if($conn->query($fifsql) === TRUE)
		echo "Sports and Active Life, ";
	else
		echo "Error adding category: ".$conn->error;
	if($conn->query($sixsql) === TRUE)
		echo "and Night Life categories added successfully";
	else
		echo "Error adding category: ".$conn->error;
	$conn->close();
	?>
</div>
</body>
</html>