<?php 
    $database=mysqli_connect("localhost","root","","learn");

    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];

        $sql="INSERT INTO info(name,email) VALUES('$name','$email')";
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
        <!-- Id <br><input type="number" name="id"><br> -->
        Name <br><input type="text" name="name"><br>
        Email <br><input type="text" name="email"><br><br>

        <input type="submit" value="Submit" name="submit">
    </form><br> 
    <?php 
        $user=$database->query("SELECT * FROM info");
        $count=1;
        echo "<table border='1' style='border-collapse:collapse; width:300px;'>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        ";
        while(list($id,$name,$email)=$user->fetch_row()){
            echo " <tr>
                <td>$count</td>
                <td>$name</td>
                <td>$email</td>
                <td>
                    <a href='edit.php?editid=$id'>Edit</a>
                    <a href='delete.php?deleteid=$id'>Delete</a>
                </td>
            </tr>";
            $count++;
        }

        
    ?>
</body>
</html>