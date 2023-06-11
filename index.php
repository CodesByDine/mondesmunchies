<?php
    include 'connection.php';
    session_start();

    $admin_id = $_SESSION['user_name'];

    if (!isset($admin_id)){
        header('location:login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
    if(isset($_POST['add_to_wishlist'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id='$user_id'") or die('query failed');
        $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($wishlist_number)>0){
            $message[] = 'product already exists in wishlist';
        }else if(mysqli_num_rows($cart_num)>0){
            $message[] = 'product already exists in cart';
        }else{
            mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`, `pid`,`name`, `price`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
            $message[]= 'product successfully added into wishlist';
        }
    }
?>
<style type="text/css">
    <?php 
        include 'main.css';
    ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <!-- Home Slider -->
    <div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="image/slider.png"/>
                <div class="slider-caption">
                    <span>Test the quality</span>
                    <h1>Quality Gifts <br>For Special Occassions</h1>
                    <p>Don't know what to buy your loved ones as a gift? <br> Leave the stressing to us!</p>
                    <a href="shop.php" class="btn">Shop Now</a>
                </div>
            </div>
            <div class="slider-item">
                <img src="image/slider.png"/>
                <div class="slider-caption">
                    <span>Test the quality</span>
                    <h1>Quality Gifts <br>For Special Occassions</h1>
                    <p>Don't know what to buy your loved ones as a gift? <br> Leave the stressing to us!</p>
                    <a href="shop.php" class="btn">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="controls">
            <i class="bi bi-chevron-left prev"></i>
            <i class="bi bi-chevron-right next"></i>
        </div>
        
    </div>
    <div class="line"></div>
    <div class="services">
        <div class="row">
            <div class="box">
                <!-- <img src="image/2.png" width="100"> -->
                <div>
                    <h1>Free Shipping Fast</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                </div>
            </div>
            <div class="box">
                <!-- <img src="image/1.png" width="100"> -->
                <div>
                    <h1>Money Back & Guarantee</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                </div>
            </div>
            <div class="box">
                <!-- <img src="image/0.png" width="100"> -->
                <div>
                    <h1>Online Support</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="story">
        <div class="row">
            <div class="box">
                <span>our story</span>
                <h1>Production of our gifting store</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, delectus voluptatum? Fugit tenetur dolore et illo commodi? Ad laborum vero aperiam, saepe repellat, explicabo eius sint voluptatibus dolorem maxime officiis!</p>
                <a href="shop.php" class="btn">Shop Now</a>
            </div>
            <div class="box">
                <!-- <img src="image/slider.png"> -->
            </div>
        </div>
    </div>
    <!-- <div class="line3"></div> -->
    <!-- testimonial -->
    <div class="line4"></div>
    <div class="testimonial-fluid">
        <h1 class="title">What Our Customers Are Saying</h1>
        <div class="testimonial-slider">
            <div class="testimonial-item">
                <img src="image/2.png">
                <div class="testimonial-caption">
                    <span>Test the quality</span>
                    <h1>Quality Giftings</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum rem eum delectus expedita iste consequuntur error sequi veritatis exercitationem, similique sapiente temporibus natus magni tempore repellat reprehenderit. Error, mollitia deserunt.</p>
                </div>
            </div>
        </div>
        
        <div class="control">
            <i class="bi bi-chevron-left prev1"></i>
            <i class="bi bi-chevron-right next1"></i>
        </div>
    </div>
    <div class="line"></div>
    <!-- Discover section -->
    <div class="line2"></div>
    <div class="discover">
        <div class="detail">
            <h1 class="title">Quality Present Ideas</h1>
            <span>Buy now and customize your gift box</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quod doloremque sunt sed ut veniam quae cum minus velit. Repellendus officia inventore ipsa provident eius illum voluptates dignissimos dolores molestias!</p>
            <a href="shop.php" class="btn">discover now</a>
        </div>
        <div class="img-box">
            <img src="image/3.png">
        </div>
    </div>
    <!-- <div class="line3"></div> -->
    <?php include 'homeshop.php'; ?>
    </div>
    <div class="client"></div>
    <div class="newsletter">
        <h1>Join our newsletter</h1>
        <p>Get updated on the latest gift boxing options that have been recently added as well as sending in the gift boxing options that you would love us to bring into reality for you.</p>
        <input type=text" name="" placeholder="your email address...">
        <button>Subscribe now</button>
    </div>
    <div class="line3"></div>
    <?php include 'footer.php'; ?>

    <!-- Slick slider link -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="script2.js"></script>
</body>
</html>