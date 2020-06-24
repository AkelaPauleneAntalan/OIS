<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header ('location:welcomeUser.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body{
		font-family: sans-serif;
		background: url('images/dashboard.jpg') repeat-y;
		background-size: 100%;
		margin: 0px;
		padding: 0px;
		/*background-color: blue;*/
	}
	h2{
		margin-left: 14%;
	}
	ul{
		padding: 0px;
		display: flex;
		margin: 0px;
	}
	#header li{
		display: inline-block;
		margin-top: 10px;
	}
	#header ul a:link{
		text-decoration: none;
	}
	#header ul li:hover{
		background: #f2dace;
		color: white;
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
	#content{
		text-align: center;
		padding: 0 16.66%;
	}
	.btn {
		height: 100px;
		width: 250px;
		margin: 22px 11px 22px 17px;
	}
	.btn-theme {
  		background-color: lightpink;
  		border-color: lightcoral;
		color: black;
		font-weight: bold;
		font-size: 20px;
  	}
	.btn-round {
		border-radius: 20px;
		-webkit-border-radius: 20px;
	}
	.btn:hover{
        background:white;
        color: grey;
    }
	#container {
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
    	/*border: 1px solid black;*/
    	font-family: sans-serif;
  	}
	[class*="col-"] {
		float: left;
		padding:15px; 
	}
	 /*For mobile phones: */
	[class*="col-"] {
		width: 100%;
	}

	@media only screen and (min-width: 600px) {
  	 For tablets: 
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
  	 For desktop: 
	.col-1 {width: 8.33%;}
	.col-2 {width: 16.66%;}
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
		<h2>DASHBOARD</h2>
		<div class="col-6"></div>
		<li style="padding: 8px 20px 0 20px; text-align: center; width: 120px; font-size: 12px; "><a href="viewProfile.php"><img src="images/profile.png" style="width:45px;"></a><br>View Profile</li>
			<hr>
		<li style="padding: 30px 20px;"><a href="logOut.php">Logout</a></li>
	</ul>
</div><!--end of header-->

<div id="content" style="margin: 6% 0;"class="col-12">
		<a href="manageEvent.php"><button class="btn btn-theme btn-round">Manage Events</button></a>
		<a href="manageStaff.php"><button class="btn btn-theme btn-round">Manage Staff</button></a>
		<a href="manageFinance.php"><button class="btn btn-theme btn-round">Manage Finances</button></a>
		<a href="manageReports.php"><button class="btn btn-theme btn-round">Manage News</button></a>
		<a href="viewUser.php"><button class="btn btn-theme btn-round">View Users</button></a>
</div>
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