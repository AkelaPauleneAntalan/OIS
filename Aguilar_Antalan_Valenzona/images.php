
<html>
<head>

<style>
        body{
        font-family: sans-serif;
		background: url('images/dashboard.jpg') repeat-y;
		background-size: 100%;
		margin: 0px;
		padding: 0px;
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
        margin-left:450px;
        /* margin-left:80%; */
        border-radius: 12px;
    }
    h1{
        color:black;
        font-family: "Times New Roman", Times, serif;
        text-align:center;
        margin-top: 100px;
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

</style>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "OISDb");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
 
    if(isset($_POST['but_upload'])){
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $query = "insert into monitoring(name,image) values('".$name."','".$image."')";
           
            mysqli_query($conn,$query) or die(mysqli_error($conn));
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }
    
    }
    ?>
<body>
<a href="manageReports.php"><button class="btn btn-theme btn-round">Back</button></a>
<h1> IMAGES</h1>

    <form method="post" action="" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Save Image' name='but_upload'>
        
    </form>

</body>
</html>
