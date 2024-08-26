<?php
include("../connection.php");
$category = $_POST['category'];
$query = mysqli_query($connection,"INSERT INTO tbl_categories(category_name)VALUES('$category')");
if($query){
    echo "Category Inserted Successfully";
}else{
    echo "Failed To Add Category";
}
?>