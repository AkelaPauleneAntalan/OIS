<html>
<head>

<title>Manage News</title>
<style>
body{
        font-family: sans-serif;
		background: url('images/dashboard.jpg') repeat-y;
		background-size: 100%;
		margin: 0px;
		padding: 0px;
    }
    table {
    border-collapse: collapse;
    width: 100%;
    color: #588c7e;
    font-family: monospace;
    font-size: 25px;
    text-align: left;
    margin-top: 40px;
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
    p{
        font-family: "Times New Roman", Times, serif;
        padding-left: 30px;
        font-size: 30px;
        color:black;
    }
    h1{
        color:black;
        font-family: "Times New Roman", Times, serif;
        text-align:center;
    }
    input[type=text]{
        padding:10px 300px;
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
    input[type=submit]:hover{
        background:white;
        color: grey;
    }
    input[type=file]{
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
    button:hover{
        background:white;
        color: grey;
    }
    th {
    background-color: pink;
    color: grey;
  }
   tr:nth-child(even) {background-color: #f2f2f2}

  /* .but{
    margin-left:36%;
    padding:5px;
  } */

</style>
    </head>
    
    <body>
    <!-- <nav class="navtop"> -->
    <div>
    <div>
    <a href="dashboard.php"><h2><img src="images/home.png" style="width:35px;"> DASHBOARD </h2></a>
     
            </div> 
    
<table>
<p>
    <input type="submit" onclick="location.href='addReports.php'"name = "search" value ="Add News">
    <input type="submit" onclick="location.href='updateReports.php'"name = "search" value ="Update News">
    <input type="submit" onclick="location.href='images.php'"name = "search" value ="Images">

</p>
        <caption>News List</caption>
       
   <tr>
    <th>Staff Name</th>
    <th>Description</th>
    <th>Contact No.</th>
    <th>Address</th>
    <th>Date of Occurence</th>
    <th>Date filed</th>
    <th>Company</th>
    <th>Status</th>

    </tr>
    <?php
     $conn = mysqli_connect("localhost", "root", "", "OISDb");
     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT name,descr,contact,address,dateOfOccurence,dateFiled,company,status FROM Reports";
    $select = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($select);
    
      if ($num_rows > 0) {
 
     while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
         echo "<tr>";
         echo "<td>" . $rows['name'] . "</td>";
         echo "<td>" . $rows['descr'] . "</td>";
         echo "<td>" . $rows['contact'] . "</td>";
         echo "<td>" . $rows['address'] . "</td>";
         echo "<td>" . $rows['dateOfOccurence'] . "</td>";
         echo "<td>" . $rows['dateFiled'] . "</td>";
         echo "<td>" . $rows['company'] . "</td>";
         echo "<td>" . $rows['status'] . "</td>";
         echo "</tr>";
     }
 }
 echo "</table>";
 
     $conn->close();
 ?>
</table>



</body>