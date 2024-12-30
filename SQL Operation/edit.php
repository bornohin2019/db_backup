<?php
    $database=mysqli_connect("localhost","root","","learn");
    $id=$_GET['editid'];
    $sql="SELECT * FROM info WHERE id=$id";

    $query=mysqli_query($database,$sql);
    $data=mysqli_fetch_assoc( $query);
    $name=$data['name'];
    $email=$data['email'];

    if(isset($_POST['edit'])){
      
        $name=$_POST['name'];
        $email=$_POST['email'];

        $sql="UPDATE info SET name='$name',email='$email' WHERE id=$id ";
        if(mysqli_query($database,$sql)==TRUE){
            header("location:index.php");
        }
    }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Id <br><input type="number" name="id" readonly value="<?php echo $id;?>"><br>
        Name <br><input type="text" name="name" value="<?php echo $name;?>"><br>
        Email <br><input type="text" name="email" value="<?php echo $email;?>"><br><br>

        <input type="submit" value="Confirm" name="edit">
    </form><br> 
</body>
</html>