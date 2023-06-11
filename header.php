<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"  >
    <link rel="stylesheet" text="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="flex">
            <img href="admin_pannel.php" class="logo" src="image/logo1.png" width="10%"/>
            <nav class='navbar'>
                <a href="home.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="shop.php">Shop</a>
                <a href="order.php">Order</a>
                <a href="contact.php">Contact Us</a>
            </nav>

            <div class='icons'>
                <i class="bi bi-person" id="user-btn"></i>
                <?php
                    $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');

                    $wishlist_num_rows = mysqli_num_rows($select_wishlist);
                ?>
                <a href="wishlist.php"><i class="bi bi-heart"></i><sup><?php echo $wishlist_num_rows; ?></sup></a>
                <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

                    $cart_num_rows = mysqli_num_rows($select_cart);
                ?>
                <a href="cart.php"><i class="bi bi-cart"></i><?php echo $cart_num_rows; ?></a>
                <i class="bi bi-list" id="menu-btn"></i>
            </div>
            <div class="user-box">
                <p>username: <span><?php echo $_SESSION['user_name'] ?></span></p>
                <p>Email: <span><?php echo $_SESSION['user_email'] ?></span></p>

                <form method="post">
                    <button type="submit" name="logout"class="logout-btn">Logout</button>
                </form>
            </div>

        </div>
    </header>

    <div class="line"></div>
</body>
</html>