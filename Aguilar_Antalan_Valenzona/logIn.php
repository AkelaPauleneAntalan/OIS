<?php
	session_start();
	if(isset($_SESSION['user'])){
		header ('location: homeUser.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body {
    	color: black;
		background: url("images/bg-admin.jpg") no-repeat;
		background-size: 100%;
    	font-family: 'Ruda', sans-serif;
    	padding: 0px !important;
    	margin: 0px !important;
    	font-size:13px;
	}
	ul{
		padding: 0px;
		display: flex;
		margin: 0px;
	}
	#header li{
		display: inline-block;
		padding: 25px 35px;
	}
	#header ul a:link{
		text-decoration: none;
	}
	#header ul li:visited{
		color:black;
	}
	#header ul li:hover{
		background: lightcoral;
		color: white;
	}
	#header ul li:active{
		text-decoration: underline;
		color: white;
	}
	.form-login {
		max-width: 330px;
		margin: 70px auto 0;
		background: #fff;
		border-radius: 5px;
		-webkit-border-radius: 5px;
	}

	.form-login h2.form-login-heading {
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

	#login-wrap {
		padding: 25px;
	}

	.btn {
		height: 34px;
		width: 100%;

	}
	.btn-theme {
  		background-color: lightpink;
  		border-color: lightcoral;
	}
	.btn-round {
	border-radius: 20px;
	-webkit-border-radius: 20px;
	}

	</style>

</head>
<body>
	<div id="login-page">
		<div id="header">
			<ul>
				<li><a href="welcomeUser.php">BACK TO HOME</a></li>
			</ul>
		</div>
		 
		<form class="form-login" name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2 style="color:black" class="form-login-heading">USER PANEL</h2>

		<div id="login-wrap">
			<p>Username: <input type="text" class="form-control"name="member_username" required autofocus value="<?php if(isset($_COOKIE["member_login"])) {echo $_COOKIE["member_login"];}?>"></p>
			<p>Password: <input type="password" class="form-control" name="member_password" required value="<?php if(isset($_COOKIE["member_password"])) {echo $_COOKIE["member_password"];}?>"></p>
			<p><input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])){?> checked <?php } ?> >Remember me</p>
			<button class="btn btn-theme btn-round" type="submit" name="submit">Log in</button>
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
//SQL to select records from Profile table
$sql = "SELECT * FROM user";
$result = $conn -> query($sql);

if(isset($_POST["submit"])){
	if($result->num_rows>0){
				//output data of each row
		while($row = $result->fetch_assoc()){
			$_SESSION['user'] = $row["username"];
			$_SESSION['pass'] = $row["password"];

			if($_SESSION['user'] == $_POST["username"] && $_SESSION['pass'] == $_POST["password"]){
				header('location:dashboard.php');
			}else{
				echo "<script>alert('Account does not exist!')</script>";
			}
		}

		if($user){
		if(!empty($_POST['remember'])){
			setcookie("member_login", $_POST['username'],time()+(10 * 365 * 24 * 60 * 60));
			setcookie("member_password", $_POST['password'],time()+(10 *365 * 24 * 60 *60));
		}else{ 
			if(isset($_COOKIE["member_login"])){
				setcookie("member_login","");
			}
			if(isset($_COOKIE["member_password"])){
				setcookie("member_password","");
			}
		}
		header("location:login.php");
	}

	}else{
		echo "0 results";
	}
}
$conn->close();
?>
</body>
</html>