<?php
$conn = new mysqli("localhost", "root","", "myweb");

    if(isset($_POST['submitBtn'])){
        $name= $_POST['name'];
        $contact = $_POST['contact'];

        $conn->query("CALL call_brand('$name', '$contact')");
    }

    if(isset($_POST['addBtn'])){
        $name = $_POST['aName'];
        $price = $_POST['aPrice'];
        $aid = $_POST['productList'];

        $conn->query("CALL call_product('$name', '$price', '$aid')");
    }
        if(isset($_POST['delBtn'])){
        $aid = $_POST['delMenu'];
        $conn->query("DELETE FROM brand WHERE id = '$aid'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <​meta charset="UTF-8">
    <​meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Table</title>
        <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section>
        <form action="" method='POST'>
            <div>
                <label for="">Name</label><br>
                <input type="text" name="name" id="name"><br>
                <label for="">Contact</label><br>
                <input type="text" name="contact" id="contact"><br>
                <button name="submitBtn">Submit</button>
            </div>
        </form>
        <form method="POST" action="">
        <h2>Product Table</h2>
            <div>
                <table>
                    <tr>
                        <td><label for="">Name</label></td>
                        <td><input type="text" name="aName" id="name"></td>
                    </tr>
                    <tr>
                        <td><label for="">Price</label></td>
                        <td><input type="text" name="aPrice" id="price"></td>
                    </tr>
                    <tr>
                        <td><label for="">Product List</label></td>
                        <td>
                            <select name="productList" id="">
                                <?php
                                    $productList = $conn->query('SELECT * FROM brand');
                                    while(list($id,$name) = $productList->fetch_row()){
                                        echo "<option value= '$id'>$name</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                </table>
                <button name='addBtn'>Add Product</button><br><br>
                <table>
                    <tr>
                        <td><label for="">Product List</label></td>
                        <td>
                            <select name="delMenu" id="">
                                <?php
                                    $productList = $conn->query('SELECT * FROM brand');
                                    while(list($id,$name) = $productList->fetch_row()){
                                        echo "<option value= '$id'>$name</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button name='delBtn'>Delete Product</button>
            </div>
        </form>
    </section>

<div class="table-container">
    <h3>View Details</h3>
        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Products Name</th>
                    <th>Contact</th>
                    <th>Model</th>
                    <th>Price</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root","", "myweb");
                if (!$conn) {
                    die('Connection failed:' . mysqli_connect_error());
                } else {
                    $user = $conn->query("SELECT * FROM details");
                    $counter = 1;
                    while (list($brand, $contact, $product_name, $price) = $user->fetch_row()) {
                        $sl=$counter++;
                        echo "<tr>
                    <td>$sl</td>
                    <td>$brand</td>
                    <td>$contact</td>
                    <td>$product_name</td>
                    <td>$price</td>
                </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>