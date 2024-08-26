<?php include("./components/top.php") ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area" style="margin-top: 70px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <div class="row my-3 m-0">
        <div class="col-md-2"></div>
        <div class="col-md-6 m-auto">
            <form method="POST" >
                <div class="w-100">
                    <div class=" d-flex align-items-center justify-content-center ">
                        <input type="text" class="form-control me-2" id="search_plant" placeholder="Search Plants">
                        <button type="submit" class="btn btn_sm btn-danger">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-100 mb-100">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3 col-md-12">
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h3>Categories</h3>
                                <ul>
                                   
                                </ul>
                            </div>
                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount" />
                                </form>
                            </div>
                        </div>
                    </aside>
                </div> -->
                <div class="col-lg-12 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class="niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">
                                    <option selected value="1">Select Category</option>
                                    <?php 
                                        $query = "SELECT * FROM tbl_categories WHERE category_status='available'";
                                        $executer_query = mysqli_query($connection,$query);
                                        if(mysqli_num_rows($executer_query)>0){
                                            foreach($executer_query as $cate){
                                                echo "<option value='$cate[category_id]'>$cate[category_name]</option>";
                                            }
                                        }else{
                                            echo "<option selected hidden>Plant Not Found</option>";
                                        }
                                    ?>
                                    <!-- <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option> -->
                                </select>
                            </form>
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">
                                    <option selected value="1">Sort Plants</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper">
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product1.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-7%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">commodo augue
                                                    nisi</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">commodo augue nisi</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product2.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-8%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">adipiscing
                                                    cursus</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">adipiscing cursus</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product3.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-9%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">adipiscing elit</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">adipiscing elit</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product4.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-6%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">Donec eu cook</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">Donec eu cook</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product5.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-9%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">Duis pulvinar
                                                    cook</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">Duis pulvinar cook</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product6.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-5%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">eget sagittis</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">eget sagittis</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product7.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-8%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">fringilla augue</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">commodo augue nisi</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product8.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-6%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">gravida semper</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">gravida semper</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product9.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-8%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">hendrerit est</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">hendrerit est</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product10.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-4%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">massa massa</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">massa massa</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product11.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-6%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">Morbi ornare</a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">Morbi ornare</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="assets/img/product/product12.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-9%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">placerat
                                                    vestibulum</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">placerat vestibulum</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">£69.00</span>
                                            <span class="old_price">£74.00</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco…</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
<?php include("./components/bottom.php") ?>