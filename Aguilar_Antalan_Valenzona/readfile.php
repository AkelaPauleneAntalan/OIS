<?php 

$conn = mysqli_connect("localhost", "root", "", "OISDb");
     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }

$images_sql = "SELECT * FROM monitoring ORDER BY id desc limit 1";

$result = mysqli_query($con,$images_sql);

$row = mysqli_fetch_array($result);

$filename = $row['name'];
$image = $row['image'];

?>
<!DOCTYPE html>
<html>
<head></head>
<body>

	<!-- Image -->
	<img src="upload/<?= $filename ?>" width="300px" height="300px" >

	<!-- Base64 image -->
	<img src="<?= $image ?>" width="300px" height="300px"  >
</body>
</html>