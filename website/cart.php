<?php include("./components/top.php"); ?>
<?php
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['user_login'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
}
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Cart</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<?php 
    // Fetch the cart items for the logged-in user
    $user_id = $_SESSION['user_login']['user_id'];
    $query = "SELECT tbl_cart.*, tbl_plants.* 
              FROM tbl_cart 
              INNER JOIN tbl_plants ON tbl_cart.plant_id = tbl_plants.id 
              WHERE tbl_cart.user_id = $user_id";
    $execute_query = mysqli_query($connection, $query);

    // Initialize variables for subtotal and total
    $subtotal = 0;
?>

<!--shopping cart area start -->
<div class="shopping_cart_area mt-100">
    <div class="container">
        <form action="update_cart.php" method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <?php if (mysqli_num_rows($execute_query) > 0) { ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($execute_query)) { 
                                            $total_price = $row['plant_price'] * $row['plant_quantity'];
                                            $subtotal += $total_price;
                                        ?>
                                        <tr>
                                            <td class="product_remove">
                                                <a href="remove_from_cart.php?cart_id=<?php echo $row['cart_id']; ?>" onclick="return confirmation()"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb">
                                                <a href="#"><img src="../admin-panel/<?php echo $row['plant_image']; ?>" alt="<?php echo $row['plant_name']; ?>" width="150px" height="150px"></a>
                                            </td>
                                            <td class="product_name"><a href="#"><?php echo $row['plant_name']; ?></a></td>
                                            <td class="product-price"><?php echo number_format($row['plant_price'], 2); ?></td>
                                            <td class="product_quantity">
                                                <input type="number" name="quantities[<?php echo $row['cart_id']; ?>]" min="1" max="100" value="<?php echo $row['plant_quantity']; ?>" class="form-control">
                                            </td>
                                            <td class="product_total"><?php echo number_format($total_price, 2); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="cart_submit">
                                    <button type="submit">Update Cart</button>
                                </div>
                            <?php } else { ?>
                                <p class="text-center">You don't have any plants in your cart.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Coupon code and Cart Totals omitted as requested -->
        </form>
    </div>
</div>
<!--shopping cart area end -->


<script>
    function confirmation(){
        return confirm("Are You Sure You Want To Delete This Plant");
    }
</script>
<?php include("./components/bottom.php"); ?>