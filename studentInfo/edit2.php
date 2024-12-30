<?php
$Conn = mysqli_connect('localhost', 'root', '', 'students_info');

if(isset($_GET['editId'])){
    $getId = $_GET['editId'];

    $sql = "SELECT * FROM student_info WHERE id = $getId";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql1 = "UPDATE student_info SET name = '$name', email = '$email', WHERE id = $id";
    if(mysqli_query($conn, $sql1) == TRUE){
        header ('location:showDb_delet_edit');
    }
    else{
        echo 'data not update';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<div class="login-container">
        <h2>Data Update</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Name:</label>
                <input type="text" id="username" value="<?php echo $name  ?>" name="name" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" value="<?php echo $email  ?>" id="email" name="email" required>
            </div>
               <input type="text" name="id" value="<?php echo $id ?>" hidden>
            <button type="submit" value="Edit" name="update">Update</button>
        </form>
    </div>

</body>
</html>