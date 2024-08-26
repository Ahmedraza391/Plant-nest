<?php
include("../connection.php");
$id = $_POST['edit_category_id'];
$category = $_POST['edit_category'];
$query = "UPDATE tbl_categories SET category_name = '$category' WHERE category_id = '$id'";
$execute_query = mysqli_query($connection,$query);
if($execute_query){
    echo "Category Updated Successfully";
}else{
    echo "Failed to Update Category";
}
?>