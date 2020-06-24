
<?php
session_start();
$servername = "localhost";
$user = "root";
$pass = "";
$dbName = "OISDb";

$conn = new mysqli($servername,$user,$pass,$dbName);


//for adding data
if(isset($_POST['add'])){
     
    $servername = "localhost";$user = "root";$pass = "";$dbName = "OISDb";

    $conn = new mysqli($servername,$user,$pass,$dbName);


    $name =mysqli_real_escape_string($conn,$_POST['name']);
    $descr =mysqli_real_escape_string($conn,$_POST['descr']);
    $contact =mysqli_real_escape_string($conn,$_POST['contact']);
    $address =mysqli_real_escape_string($conn,$_POST['address']);
    $dateOfOccurence =mysqli_real_escape_string($conn,$_POST['dateOfOccurence']);
    $dateFiled =mysqli_real_escape_string($conn,$_POST['dateFiled']);
    $dateOfOccurence= date('Y-m-d',strtotime('$dateOfOccurence'));
    $dateFiled = date('Y-m-d',strtotime('$dateFiled'));
    $company =mysqli_real_escape_string($conn,$_POST['company']);
    $status =mysqli_real_escape_string($conn,$_POST['status']);
   
    $query = "insert into Reports (name,descr,contact,address,dateOfOccurence,dateFiled,company,status) 
    values ('$name', '$descr','$contact','$address','$dateOfOccurence','$dateFiled','$company','$status')";

    if(mysqli_query($conn,$query) == True){
        echo "<script>alert('Data inserted!')</script>";
    }else{
        echo "<script>alert('Error 404')</script>";
    }
}


?>
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
    
    input[type=text]{
      padding:10px 300px;
      border-radius:10px;
      display: inline-block;
      margin: 10px;
    }
    .a input[type=text]{
      padding:30px 300px;
      border-radius:10px;
      display: inline-block;
      margin: 10px;
    }
    label{
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
    input[type=radio]{
        top: 9px;
        left: 9px;
        width: 20px;
        height: 15px;
        border-radius: 50%;
        background: white;
        font: 20px;
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
    .add input[type=submit]{
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
<title>Add News</title>
<a href="manageReports.php"><button class="btn btn-theme btn-round">Back</button></a>

</head>
<body>
<h1>Add Report</h1>
    <div class="add">
        <form action="" method= "POST">
            <label for="name">Name: </label>
            <input type="text" id="name" name ="name" required placeholder = "Staff's Name">
            
           
            <div class="a">
            <label for="descr">Description: </label>
            <input type="text" id="descr" name ="descr" requierd placeholder ="Report Description">
            </div>
            
            <div>
            <label for="contact">Contact #: </label>
            <input type="text" id="contact" name ="contact" required placeholder = "Contact NO." maxlength="11">
            </div>
            
            <div>
            <label for="address">Address </label>
            <input type="text" id="address" name ="address" required placeholder ="Staff's Address">
          
            <div>
            <label for="occurence">Date of Occurence: </label>
            <input type="date" id="dateOfOccurence" name ="dateOfOccurence" required>
            </div>
            <br>
            <div>
            <label for="filed">Date Filed: </label>
            <input type="date" id="dateFiled" name ="dateFiled" required >
            </div>
            <br>
            <div>
            <label for="company">Company</label>
            <input type="text" id="company" name ="company" required placeholder ="Company">
            </div>
            <br>
            <div>
            <label for="status">Status: </label>
            <input type="text" id="status" name ="status" required placeholder ="Status of the news">
            </div>
            <br>
            <input type="submit" name="add" value = "Save">
        </form>
    </div>
    </div>


</body>
</html>