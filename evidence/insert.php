<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ecommerc";
    $conn = new mysqli($servername, $username, $password, $database);

    // if(isset($_POST['submitBtn'])){
    //     $name= $_POST['name'];
    //     $address = $_POST['address'];
    //     $contact = $_POST['contact'];

    //     $conn->query("CALL call_manufacturer('$name', '$address','$contact')");
    // }

    // if(isset($_POST['addBtn'])){
    //     $name = $_POST['aName'];
    //     $price = $_POST['aPrice'];
    //     $aid = $_POST['productList'];

    //     $conn->query("CALL call_product('$name', '$price', '$aid')");
    // }
    // if(isset($_POST['delBtn'])){
    //     $aid = $_POST['delManu'];

    //     $conn->query("DELETE FROM manufacturer WHERE id = '$aid'");
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Table</title>
</head>
<body>
    <section>
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
        <!-- <form method="POST" action="">
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
                                    $productList = $conn->query('SELECT * FROM manufacturer');
                                    while(list($id,$name) = $productList->fetch_row()){
                                        echo "<option value= '$id'>$name</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                </table>
                <button name='addBtn'>Add Product</button><br><br>
                <!-- <table>
                <tr>
                    <td><label for="">Delete Manufactur</label></td>
                    <td>
                        <select name="delManu" id="">
                            <?php
                                $productList = $conn->query('SELECT * FROM manufacturer');
                                while(list($id,$name) = $productList->fetch_row()){
                                    echo "<option value= '$id'>$name</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                </table>
                <button name='delBtn'>Delete Product</button><br><br>
            </div>
        </form> -->
    <?php

        $productList = $conn->query('SELECT p.id, p.name AS product_name, p.price, m.name AS manufacturer_name FROM product p JOIN manufacturer m ON p.manufacturer_id = m.id');

        if ($productList) {

            echo "<table border='1' style='border-collapse: collapse;'>";
            echo "<tr><th>ID</th><th>Product Name</th><th>Price</th><th>Manufacturer Name</th></tr>";

            while ($row = $productList->fetch_assoc()) {

                if ($row['price'] > 5000) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['manufacturer_name']) . "</td>";
                    echo "</tr>";
                }
            }


            echo "</table>";
        } else {
            echo "Error fetching product data.";
        }

    ?>


    </section> -->
</body>
</html>