<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'products');
// Insert data into manufacturere
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $address = $_POST['ad'];
    $contact = $_POST['cont'];

    $conn->query("CALL manuf('$name', '$address', '$contact')");
    header('location:' . $_SERVER['PHP_SELF']);
    exit();
}

// Insert product
if (isset($_POST['product'])) {
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $manufacturer_id = $_POST['pid'];

    $conn->query("CALL productf('$name', '$price', '$manufacturer_id')");
    header('location:' . $_SERVER['PHP_SELF']);
    exit();
}

// Delete manufacturere
if (isset($_POST['delet'])) {
    $manufacturer_id = $_POST['pid'];

    $conn->query("DELETE FROM manufacturer WHERE id = '$manufacturer_id'");
    header('location:' . $_SERVER['PHP_SELF']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Information</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Insert data into manufacturere -->
    <form action="" method="post" class="f1">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="ad">Address:</label>
        <input type="text" name="ad" required><br>
        <label for="cont">Contact No:</label>
        <input type="text" name="cont" required><br>
        <input type="submit" value="Submit" name="insert">
    </form>

    <!-- Insert Product -->
    <form action="" method="post" class="f1">
        <label for="pname">Product Name:</label>
        <input type="text" name="pname" required><br>
        <label for="price">Price:</label>
        <input type="text" name="price" required><br>
        <label for="pid">Brand Info:</label>
        <select name="pid" required>
            <?php
            $getm = $conn->query("SELECT * FROM manufacture");
            while (list($id, $name) = $getm->fetch_row()) {
                echo "<option value='$id'>$name</option>";
            }
            ?>
        </select>
        <button name="product">Insert</button><br><br>
        
                <label for="pid">Select Brand to Delete:</label>
        <select name="pid" id="pid" required>
            <?php
            $getm = $conn->query("SELECT * FROM manufacture");
            while (list($id, $name) = $getm->fetch_row()) {
                echo "<option value='$id'>$name</option>";
            }
            ?>
        </select>
        <button name="delet">Delete</button>
    </form>
<!-- show display  -->
 <div>
<h2>Products View</h2>
    
    <table>
        <thead>
            <tr>
              
                <th>Name</th>
                <th>Price</th>
                <th>Manu ID</th>
                <th>Manu Name</th>
                <th>Address</th>
                <th>Contact</th>
                  
            </tr>
        </thead>
        <tbody>
            <?php
        $getm = $conn->query("SELECT * FROM product_details");
         while (list($name, $price, $manufacturer_id,$manu_namne,$address, $contact) = $getm->fetch_row()) {
                echo "  <tr>
                <td>$name</td>
                <td> $price</td>
                <td>$manufacturer_id</td>
                <td>$manu_namne</td>
                <td>$address</td>
                <td>$contact</td>
            </tr> 
                ";
            }
            ?>



</body>

</html>