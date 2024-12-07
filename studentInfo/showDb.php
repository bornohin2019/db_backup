<table border="1" style="border-collaspe:'collaspe'">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php
    // database 
    $dbConn = mysqli_connect('localhost', 'root', '', 'students_info');

    // insert student Info 
    
    $getStudentInfo = $dbConn->query('select * from student_info');
    while (list($id, $email, $name) = $getStudentInfo->fetch_row()) {
        echo "
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td><span><a href='showDb.php?deletedId=$id'>Delete</a></span></td>
            </tr>
        ";
    }


    // deleted student information
    if (isset($_GET['deletedId'])) {
        $delId = $_GET['deletedId'];

        // print_r($delId);
    
        $studentDelete = "delete from student_info where id = $delId";

        if (mysqli_query($dbConn, $studentDelete)) {
            header("location:showDb.php");
        }
    }
    ?>
</table>