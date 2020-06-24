<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<?php
	session_unset();
	session_destroy();
	header('location:welcomeUser.php');
?>
</body>
</html>