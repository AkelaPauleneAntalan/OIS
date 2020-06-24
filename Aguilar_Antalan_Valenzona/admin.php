<?php

session_start();

	$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

		//create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		//check connection
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}

	$adminsql = "INSERT INTO user (fname, lname, username, password) VALUES ('firstname', 'lastname', 'admin1', 'admin1')";

	if($conn->query($adminsql) === TRUE)
		echo "Successfully Created the admin account";
	else
		echo "Error adding category: ".$conn->error;
	$conn->close();
	?>
</div>
</body>
</html>