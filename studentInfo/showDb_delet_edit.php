<a href="insert.php">Insert_Info</a>
<table border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Action</th>
    </tr>

    <?php
    // Database connection
    $dbConn = mysqli_connect('localhost', 'root', '', 'students_info');

    // Check if database connection is successful
    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get student information
    $getStudentInfo = $dbConn->query('SELECT * FROM student_info');
    while ($row = $getStudentInfo->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];

        echo "
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td><a href='edit.php?editId=$id'>Edit</a></td>
                <td><a href='showDb_delet_edit.php?deletedId=$id'>Delete</a></td>
            </tr>
        ";
    }

    if (isset($_GET['deletedId'])) {
        $delId = $_GET['deletedId'];

        if (is_numeric($delId)) {
            $studentDelete = "DELETE FROM student_info WHERE id = $delId";

            if (mysqli_query($dbConn, $studentDelete)) {
                header("Location: showDb_delet_edit.php");
                exit; 
            } else {
                echo "Error deleting record: " . mysqli_error($dbConn);
            }
        } else {
            echo "Invalid ID for deletion.";
        }
    }
 
    mysqli_close($dbConn);
    ?>
</table>
