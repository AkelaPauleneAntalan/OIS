<html>
<body>
<?php
	$servername ="localhost"; $username ="root"; $password="";$dbname= "OISDb";

	//Create Connection
	 $conn =new mysqli($servername, $username, $password, $dbname);
	 //Check connection 
	 if($conn->connect_error){
	 	die("Connection failed" .$conn->connect_error);
	 }
	
		 // Attempt insert query execution
	$asql = "INSERT INTO staff (id,name,position,num,gender,address,birthday,age) VALUES (1,'Akela','CEO','099999999999','Female','Samal City','01-20-2000',20),
			(2,'Aimee','C0O','09888888888','Female','Pantukan','06-09-2000',20),(3,'Shekinah','CCO','09777777777','Female','Panabo City','09-28-2000',20)";
		if(mysqli_query($conn, $asql)){
    echo "Records inserted successfully.";
	} else{
    	echo "ERROR: Could not able to execute $asql. " . mysqli_error($conn);
	}

	$bsql = "INSERT INTO Reports (name,descr,contact,address,dateOfOccurence,dateFiled,company,status) VALUES ('Akela','The event needs a meeting soon.','09475687193','Samal City','2020-06-18','2020-06-18','Bighit','Pending'),
			('Aimee','Will attend the meeting.','09475687193','Pantukan','2020-06-18','2020-06-18','Bighit','Pending')	";
		if(mysqli_query($conn, $bsql)){
    echo "Records inserted successfully.";
	} else{
    	echo "ERROR: Could not able to execute $bsql. " . mysqli_error($conn);
	}

	$csql = "INSERT INTO finance (id,title,budget,venue,service,food,tax,decoration,others,totalexpense) VALUES (1,'Charity','10,000','Samal','Food giving','Spaghetti','0','Children toys','Put more flowers','10,000')";
		if(mysqli_query($conn, $csql)){
    echo "Records inserted successfully.";
	} else{
    	echo "ERROR: Could not able to execute $csql. " . mysqli_error($conn);
	}
	
	
	 //Close the database connection
	 $conn->close();
?>
</body>
</html>	 