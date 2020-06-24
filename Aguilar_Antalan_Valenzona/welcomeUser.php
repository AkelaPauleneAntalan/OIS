<?php
	session_start();
	if(isset($_SESSION['user'])){
		header ('location:dashboard.php');
	}

	$servername = "localhost"; $username = "root"; $password = ""; $dbname = "OISDb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
//SQL to select records from Profile table
if(isset($_POST["submit"])){

	$sql = "SELECT * FROM user";
	$result = $conn -> query($sql);
	$user = mysqli_fetch_array($result);

	if($user){
		if(!empty($_POST['remember'])){
			setcookie("member_login", $_POST['username'],time()+(10 * 365 * 24 * 60 * 60));
			setcookie("member_password", $_POST['password'],time()+(10 *365 * 24 * 60 *60));
		}else{ 
			if(isset($_COOKIE["member_login"])){
				setcookie("member_login","");
			}if(isset($_COOKIE["member_password"])){
				setcookie("member_password","");
			}
		}
		header("location:welcomeUser.php");
	}
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body{
		font-family: sans-serif;
		background-color: mistyrose;
		background-size: 100%;
		margin: 0px;
		padding: 0px;
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
	#forbg{
		background: url('images/main-bg.jpg') no-repeat;
		background-size: 100% 100%;
	}
	#footer li{
		display: inline-block;
		margin: 0px;
		width: 120px;
	}
	#footer{
		text-align: center;	
		margin: 30% 15% 0 15%;
		font-size: 12px;
	}
	#footer img{
		width: 30px;
		height: 25px;
	}
	.form-login {
		max-width: 100%;
		margin: 25px;
		background: #fff;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		height: 100%;
	}
	.form-login h2.form-login-heading {
		margin: 0;
		padding: 15px 20px;
		text-align: center;
		background: lightpink;
		border-radius: 5px 5px 0 0;
		-webkit-border-radius: 5px 5px 0 0;
		font-size: 28px;
		text-transform: uppercase;
	}
	#login-wrap {
		padding: 2px 20px 5px 20px;
		font-size: 14px;
		text-align: center;
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
	#infosec{
		text-align: center;
	}
	.row::after {
  		content: "";
		clear: both;
		display: table;
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
	* { 
    	box-sizing: border-box; 
    	/*border: 1px solid red;*/
    	font-family: sans-serif;
  	}
	[class*="col-"] {
		float: left;
		padding:15px; 
	}
	/* For mobile phones: */
	[class*="col-"] {
		width: 100%;
	}

	@media only screen and (min-width: 600px) {
  	/* For tablets: */
	.col-s-1 {width: 8.33%;}
  	.col-s-2 {width: 16.66%;}
  	.col-s-3 {width: 25%;}
  	.col-s-4 {width: 33.33%;}
  	.col-s-5 {width: 41.66%;}
  	.col-s-6 {width: 50%;}
  	.col-s-7 {width: 58.33%;}
  	.col-s-8 {width: 66.66%;}
  	.col-s-9 {width: 75%;}
  	.col-s-10 {width: 83.33%;}
  	.col-s-11 {width: 91.66%;}
  	.col-s-12 {width: 100%;}
	}

	@media only screen and (min-width: 800px) {
  	/* For desktop: */
	.col-1 {width: 8.33%;}
	.col-2 {width: 16.66%; /*background-color: red;*/}
	.col-3 {width: 25%;}
	.col-4 {width: 33.33%;}
	.col-5 {width: 41.66%;}
	.col-6 {width: 50%;}
	.col-7 {width: 58.33%;}
	.col-8 {width: 66.66%;}
	.col-9 {width: 75%;}
	.col-10 {width: 83.33%;}
	.col-11 {width: 91.66%;}
	.col-12 {width: 100%;}
	}
	</style>
</head>
<body>
<div id="header">
<ul>
	<li><a href="welcomeNews.php">News</a></li>
	<hr>
	<li><a href="signUp.php">Signup</a></li>
</ul>
</div>
<div id="container">
	<div class="col-2"></div>
	<div id="forbg" class="col-8">
	<div style="padding: 0px;" class="col-7">
		<div id="infosec" class="row">
			<img src="images/header.png" style="max-width: 320px; margin-top: 30px; padding: 0px">
			<p style="font-size: 20px;"><i> "We can manage" </i></p>
		</div>
	</div>
	<div style="padding: 0px;" class="col-5">
		<div id="login-page">
			<form class="form-login" name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<h2 style="color:black" class="form-login-heading">LOG IN HERE</h2>

			<div id="login-wrap">
				<p>Username: <input type="text" class="form-control"name="username" required autofocus value="<?php if(isset($_COOKIE["member_login"])) {echo $_COOKIE["member_login"];}?>"></p>
				<p>Password: <input type="password" class="form-control" name="password" required value="<?php if(isset($_COOKIE["member_password"])) {echo $_COOKIE["member_password"];}?>"></p>
				<p><input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])){?> checked <?php } ?> >Remember me</p>
				<p style="font-size: 12px;">Don't have an account? <a href="signup.php">Sign up here</a></p>
				<button class="btn btn-theme btn-round" type="submit" name="submit">Log in</button>
			</div>
			</form>
		</div>
	</div>
	</div>
	<div class="col-2"></div>
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
if(isset($_POST["submit"])){
	$sql = "SELECT * FROM user";
	$result = $conn -> query($sql);
	
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
	}else{
		echo "0 results";
	}
}
$conn->close();
?>
<div id="footer" class="row">
		<div class="col-2"></div>
		<div class="col-2">
			<li><img src="images/fb.jpg">@15orginformsyspage</li>
		</div>
		<div class="col-2">
			<li><img src="images/ig.jpg">@15orginformsys</li>
		</div>
		<div class="col-2">
			<li><img src="images/tw.jpg">@15orginformsys</li>
		</div>
		<div class="col-2">
			<li><img src="images/em.jpg">orginfosys@gmail.com</li>
		</div>
		<div class="col-2"></div>
	<div style="padding: 0px; margin: 0px;"class="col-12">
		<p>Copyright &copy; 2015 All Rights Reserved</p>
	</div>
</div>
</body>
</html>