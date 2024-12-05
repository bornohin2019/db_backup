<?php
$db= mysqli_connect('localhost', 'root','','demo_database');
if(!$db) //($db->connect_errno)
{
    die('connection faield');//.$db->connect_errno
}
else{
    echo 'connect Succesful';
}

?>

<table border='1' style='border-collapse: collapse;'>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>mail</th>
    </tr>

    <?php
    $users = $db->query('select * from employee_data');
    while(list($_id,$_name,$_email)= $users ->fetch_row()){
        echo "
        <tr>
        <td>$_id</td>
        <td>$_name</td>
        <td>$_email</td>
        </tr>";
    }
    ?>