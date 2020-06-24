 <?php

session_start();
$servername = "localhost";
$user = "root";
$pass = "";
$dbName = "OISDB";

$conn = new mysqli($servername,$user,$pass,$dbName);

$sql = "DELETE FROM staff WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

header('location:monitoringManagement.php');
$conn->close();

?> 
<!-- alternative code 
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "OISDB";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     /* set the PDO error mode to exception */
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//      /*sql to delete a record*/
//     $sql = "DELETE FROM staff WHERE id='" . $_GET["id"] . "'";

//     /*use exec() because no results are returned*/
//     $conn->exec($sql);
//     echo "Record deleted successfully";
//     }
// catch(PDOException $e)
//     {
//     echo $sql . "
// " . $e->getMessage();
//     }

// $conn = null;
?> -->