<?php
$db= mysqli_connect('localhost', 'root','','demo_database');
if (isset($_GET['btnid'])){
 $delete_id = $_GET['btnid'];
$sql = "DELETE FROM employee_data WHERE id = $delete_id";

if(mysqli_query($db, $sql) == TRUE) {

header('location:evidence.php');
}

}
?>
<table border='1' style='border-collapse: collapse;'>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>mail</th>
        <th>delete</th>
    </tr>

    <?php
     $db= mysqli_connect('localhost', 'root','','demo_database');
    $users = $db->query('select * from employee_data');
    while(list($_id,$_name,$_email)= $users ->fetch_row()){
        echo "
        <tr>
        <td>$_id</td>
        <td>$_name</td>
        <td>$_email</td>
        <td><a href='evidence.php?btnid=$_id'>Delete</a></td>
        </tr>";
    }
    ?>