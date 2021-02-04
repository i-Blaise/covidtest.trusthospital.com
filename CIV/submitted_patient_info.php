<?php
include('../class_libraries/class_lib');
$database_con = new DB_con();
$getData = new dbData();


if(isset($_POST['submit']))
{
	$uploadOk = 1;

	$name = htmlspecialchars($_POST["name"]);
	$discount_price = htmlspecialchars($_POST["discount_price"]);
	$price = htmlspecialchars($_POST["price"]);

if(isset($name, $discount_price, $price, $info, $stock, $category, $a_cat, $product_image1, $product_image2)){


    $myQuery = "INSERT INTO temp_products (cat_id, name, price, discount_price, info, description, image1, image2, image3, image4, code, stock, shop, accessory, upload_user) VALUES ('$category', '$name', '$price', '$discount_price', '$info', '$desc', '$product_image1', '$product_image2', '$product_image3', '$product_image4', '$code', '$stock', '$shop', '$a_cat', '$upload_user')";
    $result=mysqli_query($database_con->dbh, $myQuery);
    if($result){
    }
}
}
?>