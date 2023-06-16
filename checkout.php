<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
        header('location:login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
    if (isset($_POST['order_btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, 'complex no. '.$_POST['flat'].','.$_POST['street'].','.$_POST['city'].','.$_POST['province'].','.$_POST['country'].','.$_POST['zipcode']);
        $placed_on = date('d-M-Y');
        $cart_total=0;
        $cart_product[]='';
        $cart_query=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die ('query failed');

        if (mysqli_num_rows($cart_query)>0){
            while($cart_item=mysqli_fetch_assoc($cart_query)){
                $cart_product[]=$cart_item['name'].' ('.$cart_item['quantity'].')';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total+=$sub_total;
            }
        }
        $total_product = implode(', ', $cart_product);
        mysqli_query($conn, "INSERT INTO `orders`(`user_id`, `name`, `number`, `email`, `method`, `address`, `total_product`, `total_price`, `placed_on`) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_product', '$cart_total', '$placed_on')");

        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[]='order placed successfully';
        header('location:checkout.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>Monde's Munchies</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Checkout</h1>
            <p>Welcome to Monde's Munchies! Where we build gift boxes that unwrap smiles on our customer's faces😊</p>
            <a href="index.php">Home<span> Checkout</span></a>
        </div>
    </div>
    <div class="line"></div>
    <!-- Checkout -->
   <div class="checkout-form">
    <h1 class="title">Payment Process</h1>
    <?php
            if(isset($message)){
                foreach ($message as $message){
                    echo '
                        <div class="message">
                            <span>'.$message.'</span>
                            <i class="bi bi-x-circle" onclick="this.parentElement.remove()"</i>
                        </div>
                    ';
                }
            }
    ?>
    <div class="display-order">
        <div class="box-container">
            <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
                $total=0;
                $grand_total=0;
                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                        $total_price=($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total=$total+=$total_price;
            ?>
            
                <div class="box">
                    <img src="image/<?php echo $fetch_cart['image']; ?>">
                    <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                </div>
        
            <?php
                    }
                }
            ?>
        </div>
        <span class="grand-total">Total Amount Payable : R <?= $grand_total; ?></span>
    </div>
    <form method="post">
        <div class="input-field">
            <label>your name</label>
            <input type="text" name="name" placeholder="enter your name">
        </div>
        <div class="input-field">
            <label>your number</label>
            <input type="number" name="number" placeholder="enter your number">
        </div>
        <div class="input-field">
            <label>your email</label>
            <input type="text" name="email" placeholder="enter your email">
        </div>

        <div class="input-field">
            <label>select payment method</label>
            <select name="method">
                <option selected disabled>select payment method</option>
                <option value="cash on delivery">cash on delivery</option>
                <option value="credit card">credit card</option>
                <option value="paypal">paypal</option>
            </select>
        </div>
        <div class="input-field">
            <label>address line 1</label>
            <input type="text" name="flat" placeholder="e.g complex name">
        </div>
        <div class="input-field">
            <label>address line 2</label>
            <input type="text" name="flat" placeholder="e.g street name">
        </div>
        <div class="input-field">
            <label>city</label>
            <input type="text" name="city" placeholder="e.g Johannesburg">
        </div>
        <div class="input-field">
            <label>province</label>
            <input type="text" name="province" placeholder="e.g Gauteng">
        </div>
        <div class="input-field">
            <label>country</label>
            <input type="text" name="country" placeholder="e.g South Africa">
        </div>
        <div class="input-field">
            <label>ZIP code</label>
            <input type="text" name="zipcode" placeholder="e.g 1685">
        </div>
        <input type="submit" name="order-btn" class="btn" value="order now">
    </form>
   </div>
   <div class="line"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>