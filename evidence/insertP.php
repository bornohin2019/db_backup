<?php 
$conn = new mysqli('localhost', 'root', '', 'evidence');
// insert brandInfo 
if(isset($_POST['submitBtn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    //call prosedual no.1 table

    $conn->query("call manuf('$name', '$address', '$contact')");
    header('location:' . $_SERVER['PHP_SELF']);
    exit();
}


// insert product info 
if(isset($_POST['insretProductBtn'])) {
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $mdId = $_POST['md_id'];

    $conn->query("call productf('$name', '$price', '$mdId')");
    header('location:' . $_SERVER['PHP_SELF']);
    exit();
}
// delete 
if(isset($_POST['delProduct'])) {
    $mdId = $_POST['md_id'];

    $conn->query("delete from manufacturer where id = '$mdId'");
    header('location:' . $_SERVER['PHP_SELF']);
    exit();
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
    <!-- manufacture form  -->
    <form action="" method='POST'>
            <div>
                <label for="">Name</label><br>
                <input type="text" name="name" id="name"><br>
                <label for="">Address</label><br>
                <input type="text" name="address" id="address"><br>
                <label for="">Contact</label><br>
                <input type="text" name="contact" id="contact"><br>
                <button name="submitBtn">Submit</button>
            </div>
        </form>


 <!-- product form  -->

 <form action="" method='POST' style='margin-top: 20px;'>
            <div>
                <label for="">Product Name</label><br>
                <input type="text" name="pname" id="pname"><br>
                <label for="">Price</label><br>
                <input type="text" name="price" id="price"><br>
                <label for="">Brand Info</label><br>
                <select name="md_id" id="md_id">
                    <?php 
                    $getManufa = $conn->query("select * from manufacturer");
                    while(list($id,$name) = $getManufa->fetch_row()){
                        echo "<option value= '$id'>$name</option>";
                    }
                    ?>
                </select>
                <button name="insretProductBtn">Insert</button>
            </div>
        </form>


        <!-- del product  -->
         <div style='margin-top:20px'>
            <form action="" method="post">
            <select name="md_id" id="md_id">
                    <?php 
                    $getManufa = $conn->query("select * from manufacturer");
                    while(list($id,$name) = $getManufa->fetch_row()){
                        echo "<option value= '$id'>$name</option>";
                    }
                    ?>
                </select>
                <button name="delProduct">delete</button>
            </form>
         </div>
</body>
</html>