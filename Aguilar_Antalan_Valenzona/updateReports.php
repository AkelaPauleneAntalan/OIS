<html>
<style>
  body{
    font-family: sans-serif;
		background: url('images/dashboard.jpg') repeat-y;
		background-size: 100%;
		margin: 0px;
		padding: 0px;
    }
    h1{
        font-family: "Times New Roman", Times, serif;
        padding-left: 30px;
        font-size: 30px;
        color:black;
        text-align: center;
    }
    p{
        font-family: "Times New Roman", Times, serif;
        padding-left: 30px;
        font-size: 30px;
        color:black;
    }
    .a input[type=text]{
        padding:10px 300px;
        border-radius:10px;
    }
    .b input[type=text]{
      padding:10px 300px;
      border-radius:10px;
      display: inline-block;
  
    }
    .b label{
      display: inline-block;
      width: 100px;
      font-family: "Times New Roman", Times, serif;
      font-size:20px;
    }
    form{
      margin-left:150px;
    }
    .btn{
        transition-duration: 0.4s;
    }
    .btn:hover{
        background:white;
        color: grey;
    }
	.btn-round {
		border-radius: 12px;
		-webkit-border-radius: 12px;
    }
    input[type=submit]{
        background-color: lightpink;
  		border-color: lightcoral;
        color: black;
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
        padding:12px 28px;
        margin:5px;
        /* margin-left:80%; */
        border-radius: 12px;
    }
    .b input[type=submit]{
        background-color: lightpink;
  		border-color: lightcoral;
        color: black;
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
        padding:12px 100px;
        margin-left:300px;
        /* margin-left:80%; */
        border-radius: 12px;
    }
    button:hover{
        background:white;
        color: grey;
    }
    .btn-theme {
  		background-color: lightpink;
  		border-color: lightcoral;
        color: black;
        margin-right:10px;
        margin-left: 10px;
        margin-top: 10px;
        padding:12px 28px;
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
    }
</style>
<head>
<title>Update News</title>
<a href="manageReports.php"><button class="btn btn-theme btn-round">Back</button></a>

</head>
<h1>Update News</h1>
<body>
<form method="post" action="">
<div class= "a"><label for="id">Staff Name:</label>
<input type="text"  placeholder="Staff Name to search" name = "name" value ="<?php if(isset($_POST['name'])){ echo $_POST['name'];} ?>">  
            <input type="submit" name = "search" value ="Search">
            </div>
            <div class="b">
        
            <div>
            <div><label for="descr">Report Description:</label>
            <input type="text" id="descr" name ="descr">
            </div>
            
            <br>
            <div>
            <div><label for="contact">Contact No.:</label>
            <input type="text" id="contact" name ="contact"  maxlength="11">
            </div>
            
            <br>
            <div>
            <div><label for="address">Address:</label>
            <input type="text" id="address" name ="address">
            </div>
            
            <br>
            <div>
            <div><label for="dateOfOccurence">Date of Occurence:</label>
            <input type="date" id="dateOfOccurence" name ="dateOFOccurence">
            </div>
            
            <br>
            <div>
            <div><label for="dateFiled">Date Filed:</label>
            <input type="date" id="dateFiled" name ="dateFiled">
            </div>
            
            <br>
            <div>
            <div><label for="company">Company:</label>
            <input type="text" id="company" name ="company">
            </div>
            <br>
            <br>
            <div>
            <div><label for="status">Status:</label>
            <input type="text" id="status" name ="status"placeholder ="Status of the news">
            </div>
            <br>
            

<input type="submit" name="update" value="Update" class="buttom">

</div>

</form>
<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbName = "OISDb";

$conn = new mysqli($servername,$user,$pass,$dbName);


//magsearch tapos ma display sa form
if(isset($_POST['search'])){
$name = $_POST['name'];
$query = "select * from reports where name = '$name'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
      $descr = $row['descr'];
      $contact = $row['contact'];
      $address = $row['address'];
      $dateOfOccurence  = $row['dateOfOccurence '];
      $dateFiled = $row['dateFiled'];
      $company = $row['company'];
      $status = $row['status'];

      echo "<script> document.getElementById('descr').value += '$descr'; </script>";
      echo "<script> document.getElementById('contact').value += '$contact'; </script>";
      echo "<script> document.getElementById('address').value += '$address'; </script>";
      echo "<script> document.getElementById('dateOfOccurence ').value += '$dateOfOccurence '; </script>";
      echo "<script> document.getElementById('dateFiled').value += '$dateFiled'; </script>";
      echo "<script> document.getElementById('company').value += '$company'; </script>";
      echo "<script> document.getElementById('status').value += '$status'; </script>";
      
      
  }
}
}

//magupdate sa db
if(isset($_POST['update'])){
       
  $servername = "localhost";$user = "root";$pass = "";$dbName = "OISDb";

  $sid = $_POST['name'];

  $conn = new mysqli($servername,$user,$pass,$dbName);

    $descr =mysqli_real_escape_string($conn,$_POST['descr']);
    $contact =mysqli_real_escape_string($conn,$_POST['contact']);
    $address =mysqli_real_escape_string($conn,$_POST['address']);
    $dateOfOccurence  =mysqli_real_escape_string($conn,$_POST['dateOfOccurence ']);
    $dateFiled =mysqli_real_escape_string($conn,$_POST['dateFiled']);
    $dateOfOccurence= date('Y-m-d',strtotime('$dateOfOccurence'));
    $dateFiled = date('Y-m-d',strtotime('$dateFiled'));
    $company =mysqli_real_escape_string($conn,$_POST['company']);
    $status =mysqli_real_escape_string($conn,$_POST['status']);
 
  $query = "update reports set  descr = '$descr', contact='$contact' , address = '$address', dateOfOccurence = '$dateOfOccurence ', dateFiled= '$dateFiled',company = '$company', status = '$status' where name ='$sid'";

  if(mysqli_query($conn,$query) == TRUE){
      echo "<script>alert('Data was Updated!')</script>";
  }else{
      echo "<script>alert('ERROR 404')</script>";
  }
}

?>
</body>
</html>