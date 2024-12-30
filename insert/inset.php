<?php 
$conn = mysqli_connect('localhost','root','','menufooter');

if (isset($_POST['insert'])){ 
    $name = $_POST['name'];
     $contact = $_POST['contact'];
    //  $conn->query("call brand_insert('$name','$contact')");

     $sql = "INSERT INTO brand (name,contact) VALUES ('$name','$contact')";
     if(mysqli_query($conn, $sql) == TRUE){ 
        echo "DATA INSERTED";
        header('location:inset.php');
     }else{ 
        echo "not inserted";
     }
}


?>

<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <div class="container"> 
    <div class="row"> 
        <div class="col-sm-3"></div>
        <a href="view.php">View Result</a>
        <div class="col-sm-6 pt-4 mt-4 border border-success"> 
    <form action="" method="POST"> 
        Name:<br>
        <input type ="text" name ="name"><br><br>
        Contact:<br>
        <input type ="number" name ="contact"><br><br>

         <button type="submit" name="insert">insert</button>
    </form>
    </div>
        <div class="col-sm-3"></div>
    </div>
   </div>
</body>
</html>