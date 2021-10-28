<?php
require_once('../connect.php');
include('../admin/index_head.php');
    
echo "<div>";
echo "<h2>Inserting</h2>";

$productname = mysqli_real_escape_string($connection,$_POST["product_name"]);
$brand = mysqli_real_escape_string($connection,$_POST["brand"]);
$category = mysqli_real_escape_string($connection,$_POST["category"]);
$description = mysqli_real_escape_string($connection,$_POST["description"]);
$price = mysqli_real_escape_string($connection,$_POST["price"]);
$quantity = mysqli_real_escape_string($connection,$_POST["quantity"]);
$sku = mysqli_real_escape_string($connection,$_POST["sku"]);
$color = mysqli_real_escape_string($connection,$_POST["color"]);
$size = mysqli_real_escape_string($connection,$_POST["size"]);
$tag = mysqli_real_escape_string($connection,$_POST["tag"]);


//$myImg = "images/" . $_FILES['img']['name'];

$fileName = $_FILES['img']['name'];
$fileTmpName = $_FILES['img']['tmp_name'];
$fileError = $_FILES['img']['error'];
$fileSize = $_FILES['img']['size'];
$fileType = $_FILES['img']['type'];

$fileExt = explode('.', $fileName);

$fileActualExist = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExist, $allowed)) {
                if ($fileError === 0) {
                    if($fileSize < 1500000) {
                        $fileNameNew = uniqid('', true).".".$fileActualExist;
                        $fileDestination = '../images/products/shoes' . $fileNameNew;

                        //tag table
                        $queryTable = "SELECT * FROM TAG";
                        $result = mysqli_query($connection, $queryTable);

                        $sql = "INSERT INTO TAG(name) VALUES('" . $tag . "')"; 

                        if (mysqli_query($connection, $sql) === TRUE) {

                            echo "<p>New TAG added!</p>";

                            $tagID = mysqli_insert_id($connection);
                            mysqli_free_result($result);

                        } else {    
                            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
                        }

                        //product table
                        $QueryForRow = "SELECT * FROM PRODUCT";

                        $result = mysqli_query($connection,$QueryForRow);

                        $sql = "INSERT INTO PRODUCT (`brandID`, `categoryID`, `name`, `image`, `description`, `price`) VALUES ('" . $brand . "','" . $category . "','" . $productname . "','" . $fileNameNew . "','" . $description . "','" . $price . "')";

                        if (mysqli_query($connection, $sql) === TRUE) {
                            
                            move_uploaded_file($fileTmpName, $fileDestination);
                            //move_uploaded_file($_FILES["img"]["tmp_name"], "../images/" . $_FILES["img"]["name"]);

                            $productID = mysqli_insert_id($connection);

                            mysqli_free_result($result);
                            echo "<p>New product added!</p>";

                        } else {
                            
                            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
                        }

                        //product_tag table
                        $queryProdTag = "SELECT * FROM PRODUCT_TAG";
                        $result = mysqli_query($connection, $queryProdTag);

                        $sql = "INSERT INTO PRODUCT_TAG(tagID, productID) VALUES('" . $tagID . "','" . $productID . "')"; 

                        if (mysqli_query($connection, $sql) === TRUE) {

                            echo "<p>New product tags added!</p>";

                        } else {
                            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
                        }

                        //product_children table
                        $queryChild = "SELECT * FROM PRODUCT_CHILDREN";

                        $result = mysqli_query($connection, $queryChild);

                        $sql = "INSERT INTO PRODUCT_CHILDREN(productID, size, quantity, color) VALUES('" . $productID . "','" . $size . "','" . $quantity . "','" . $color . "')";

                        if (mysqli_query($connection, $sql) === TRUE) {

                            echo "<p>New product children added!</p>";

                        } else {   
                            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
                            // echo "<script>location.replace('index_admin.php?success=inserted')</script>";
                        }

                    } else {
                        //fstb = file size too big
                        echo "<script>location.replace('insert_form.php?error=fstb')</script>";
                    }
                } else {
                    //cuf = cannot upload file
                    echo "<script>location.replace('insert_form.php?error=cuf')</script>";
                }
            } else {
                //fna = file not allowed
                echo "<script>location.replace('insert_form.php?error=fna')</script>";
            }

        include('../includes/footer.php');
        mysqli_close($connection);
?>
