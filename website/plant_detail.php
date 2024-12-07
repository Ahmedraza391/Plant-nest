<?php include("./components/top.php"); ?>
<div class="breadcrumbs_area " style="margin-top: 110px;" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $query = "SELECT * FROM tbl_plants WHERE id = '$_GET[id]'";
    $execute = mysqli_query($connection,$query);
    if(mysqli_num_rows($execute)>0){
        $fetch = mysqli_fetch_assoc($execute);
    }
    if(isset($_POST['btn_cart'])){
        $plant_id = $_POST['plant_id'];
        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['user_login']['user_id'];
        $cart_query = "INSERT INTO tbl_cart (user_id,plant_id,plant_quantity)VALUES('$user_id','$plant_id','$quantity')";
        $cart_execute = mysqli_query($connection,$cart_query);
        if($cart_execute){
            echo "<script>window.location.href='cart.php'</script>";
        }
    }
?>
<section class="product-detail py-5">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image">
                    <img src="../admin-panel/<?php echo $fetch['plant_image']; ?>" alt="Product Image" class="img-fluid w-100 rounded" style="height: 350px;" >
                </div>
            </div>
            <!-- Product Details -->
            <div class="col-md-6">
                <div class="product-info">
                    <h1 class="product-title"><?php echo $fetch['plant_name'] ?></h1>
                    <p class="product-price mt-3">Price : <?php echo $fetch['plant_price'] ?></p>
                    <p class="product-description">Description : <br><?php echo $fetch['plant_description'] ?></p>
                    <form method="post">
                        <input type="hidden" name="plant_id" value="<?php echo $fetch['id']; ?>">
                        <div class="product-quantity d-flex align-items-center mb-3">
                            <label for="quantity" class="mr-3">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control w-25" min="1" value="1">
                        </div>
                        <button class="btn btn-success" name="btn_cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("./components/bottom.php"); ?>