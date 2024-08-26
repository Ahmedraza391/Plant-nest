<?php
include("../connection.php");
$id = $_POST['id'];
$query = mysqli_query($connection,"SELECT * FROM tbl_categories WHERE category_status='available'");
if(mysqli_num_rows($query)>0){
    foreach($query as $data){
        if($data['category_id']==$id){
            echo "<option value='$data[category_id]' selected >$data[category_name]</option>";
        }else{
            echo "<option value='$data[category_id]' >$data[category_name]</option>";
        }
    }
}else{
    echo "<option hidden selected >Category Not Found.</option>";
}
?>