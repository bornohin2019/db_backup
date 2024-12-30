<?php 
    $db=mysqli_connect("localhost","root","","learned");
    if(isset($_POST["submit"])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $db->query("call info_p('$name','$email')");
        header("location:$_SERVER[PHP_SELF]");
    }
    if(isset($_POST["submit2"])){
        $num=$_POST['num'];
        $bid=$_POST['bid'];
        
        $db->query("call findf('$num','$bid')");
        header("location:$_SERVER[PHP_SELF]");
    }
     if(isset($_POST["delete"])){

     }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FFFF</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="name" ><br>
        <input type="text" name="email" ><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <br>
    <form action="" method="post">
       
        <input type="text" name="num" ><br>
        <select name="bid">
            <?php
                $rabbani=$db->query("select * from info");
                while(list($id,$name,$bid)=$rabbani->fetch_row()){
                  echo "<option value='$bid'>$name</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit2" value="Submit">
    </form>
    <form action="" method="post">
        <select name="bid2">
            <?php
                $rabbani=$db->query("select * from info");
                while(list($id,$name,$bid)=$rabbani->fetch_row()){
                  echo "<option value='$bid'>$name</option>";
            }
            ?>
        <input type="submit" name="delete" value="Delete">
    </form>
    
</body>
</html>