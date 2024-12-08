<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method='post'>
        <div>
            <label for="name">Name</label>
            <input type="text" name='name' id='name'>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name='email' id='email'>
        </div>

        <div class="btn">
            <input type="submit" value="Insert" name='insertBtn'>
        </div>
    </form>


    <?php

    $dbConn = mysqli_connect('localhost', 'root', '', 'students_info');

    if (isset($_POST['insertBtn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $insertInfo = "INSERT INTO student_info(name, email)
                        VALUES ('$name', '$email')";   // get input string values;
    
        if (mysqli_query($dbConn, $insertInfo)) {
            header("location:showDb_delet_edit.php");
            echo "insert info successfully!";
            exit();
        } else {
            echo "error";
        }
    }

    ?>
</body>

</html>