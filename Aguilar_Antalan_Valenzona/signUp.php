<?php
	session_start();
	if(isset($_SESSION['user'])){
		header ('location:homeUser.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body {
    	color: black;
		background: url("images/manage.jpg");
    	font-family: 'Ruda', sans-serif;
    	padding: 0px !important;
    	margin: 0px !important;
    	/*font-size:13px;*/
	}
	ul{
		padding: 0px;
		display: flex;
		margin: 0px;
	}
	#header{
		margin-left: 16.66%;
		margin-top: 2%; 
	}
	#header li{
		display: inline-block;
		padding: 25px 45px;
	}
	#header ul a:link{
		text-decoration: none;
	}
	#header ul li:visited{
		color:black;
	}
	#header ul li:hover{
		background: #f2dace;
		color: white;
	}
	#header ul li:active{
		text-decoration: underline;
		color: white;
	}
	.form-signup {
		max-width: 380px;
		margin: 70px auto 0;
		background: #fff;
		border-radius: 5px;
		-webkit-border-radius: 5px;
	}

	.form-signup h2.form-signup-heading {
		margin: 0;
		padding: 25px 20px;
		text-align: center;
		background: lightpink;
		border-radius: 5px 5px 0 0;
		-webkit-border-radius: 5px 5px 0 0;
		font-size: 25px;
		text-transform: uppercase;
		font-weight: 300;
	}

	#signup-wrap {
		padding: 2px 20px 5px 20px;
		margin: 0 5%;
		font-size: 14px;
		/*text-align: center;*/
	}
	.btn {
		height: 25px;
		width: 50%;
		font-size: 14px;
		margin: 2% 25% 5% 25%;
	}
	.btn-theme {
  		background-color: lightpink;
  		border-color: lightcoral;
	}
	.btn-round {
		border-radius: 20px;
		-webkit-border-radius: 20px;
	}
	hr { 
  		display: block;
  		margin-top: 0.5em;
  		margin-bottom: 0.5em;
  		margin-left: 0;
  		margin-right: 0;
  		border-style: inset;
  		border-width: 2px;
  		padding: 0px;
	}
	</style>

</head>
<body>
<div id="header">
<ul>
	<li><a href="welcomeNews.php">News</a></li>
	<hr>
	<li><a href="welcomeUser.php">Log In</a></li>
</ul>
</div>
		<form class="form-signup" name="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2 class="form-signup-heading">SIGN UP FORM</h2>

		<div id="signup-wrap">
			<p>First Name: <input type="text" class="form-control" name="fname" required></p>
			<p>Last Name: <input type="text" class="form-control" name="lname" required></p>
			<p>Username: <input type="text" class="form-control" name="username" required></p>
			<p>Password: <input type="password" class="form-control"name="password" required></p>
			<p>Confirm Password: <input type="password" class="form-control" name="conpassword" required></p>
			<p style="font-size: 12px;">Already have an account? <a href="welcomeUser.php">Log in here</a></p>
			<button class="btn btn-theme btn-round" type="submit" name="submit" onclick="confirmlogin()">SIGN UP</button>
		</div>
		</form>
	</div>

<?php
	$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
if(isset($_POST["submit"])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$signup_sql = "INSERT INTO user (fname, lname, username, password) VALUES ('$fname', '$lname', '$username', '$password')";

	if($conn->query($signup_sql) === FALSE)
		echo "Error Signing up: ".$conn->error;
}
$conn->close();
?>

<script type="text/javascript">
	function confirmlogin(){
		alert("Your information has been added successfully! You can now log in");
		document.location.href = "welcomeUser.php";
	}
</script>
</body>
</html>