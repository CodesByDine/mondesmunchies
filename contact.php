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
    if(isset($_POST['submit-btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$message'") or die ('query failed');
        if(mysqli_num_rows($select_message)>0){
            echo 'message already sent!';
        }else{
            mysqli_query($conn, "INSERT INTO `message`(`user_id`, `name`, `email`, `number`, `message`) VALUES ('$user_id', '$name', '$email', '$number', '$message')") or die('query failed');
        }
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
            <h1>Contact Us</h1>
            <p>Welcome to Monde's Munchies! Where we build gift boxes that unwrap smiles on our customer's faces😊</p>
            <a href="index.php">Home<span> Contact</span></a>
        </div>
    </div>
    <div class="line"></div>
    <!-- Contact Us -->
    <div class="services">
        <div class="row">
            <div class="box">
                <!-- <img src="image/1.png" width="95"> -->
                <div>
                    <h1>Affordable And Fast Shipping</h1>
                    <p>When you place an order with us, we ensure that your delivery rate is afforable and your product is delivered in record time</p>
                </div>
            </div>
            <div class="box">
                <!-- <img src="image/11.png" width="95"> -->
                <div>
                    <h1>Money Back & Guarantee</h1>
                    <p>We understand that certain things may go wrong during the delivery of your product, we provide a money back and product Guarantee.</p>
                </div>
            </div>
            <div class="box">
                <!-- <img src="image/111.png" width="95" > -->
                <div>
                    <h1>Online Support</h1>
                    <p>We provide online support to our customers, whenever you are feeling stuck do send us a message on the contact us page.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-container">
        <h1>Leave a message</h1>
        <form method="post">
            <div class="input-field">
                <label>your name</label><br>
                <input type="text" name="name">
            </div>
            <div class="input-field">
                <label>your email</label><br>
                <input type="text" name="email">
            </div>
            <div class="input-field">
                <label>number</label><br>
                <input type="number" name="number">
            </div>
            <div class="input-field">
                <label>your message</label><br>
                <textarea name="message"></textarea>
            </div>
            <button type="submit" name="submit-btn">send message</button>
        </form>
    </div>
    <div class="line"></div>
    <div class="address">
        <h1 class="title">Our Contact</h1>
        <div class="row">
            <div class="box">
                <i class="bi bi-map-fill"></i>
                <div>
                    <h4>Address</h4>
                    <p>45 Oak Ave, Equarand<br>
                    Newcastle, 2940<br>
                    South Africa</p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-telephone-fill"></i>
                <div>
                    <h4>Phone Number</h4>
                    <p>078 974 2447</p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h4>Email</h4>
                    <p>mondesmunchies@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>