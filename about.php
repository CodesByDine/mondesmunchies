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
            <h1>About Us</h1>
            <p>Welcome to Monde's Munchies! Where we build gift boxes that unwrap smiles on our customer's faces😊</p>
            <a href="index.php">Home<span> about us</span></a>
        </div>
    </div>
    <div class="line"></div>
    <!-- About Us -->
    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                    <span>ABOUT OUR ONLINE STORE</span>
                    <h1>Hello, With years of experience</h1>
                </div>
                <p>We are dedicated to help our customers find gifting options for any type of occassion, which is why we have all types of gifting options all the way from birthdays to valentine's day. You are free to customize the gift boxes to suit your preferred options.</p>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <!-- Features -->
    <div class="features">
        <div class="title">
            <h1>Complete Customer Ideas</h1>
            <span>best features</span>
        </div>
        <div class="row">
            <div class="box">
                <!-- <img src="img/icon2.png"> -->
                <h4>Quality Gifts</h4>
                <p>100% Secure Payment</P>
            </div>
            <div class="box">
                <!-- <img src="img/icon2.png"> -->
                <h4>Custom Gift Cards</h4>
                <p>Give The Perfect Gift</P>
            </div>
            <div class="box">
                <!-- <img src="img/icon2.png"> -->
                <h4>Nation Wide Delivery</h4>
                <p>Order Now</P>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <!-- team section -->
    <div class="line2"></div>
    <div class="team">
        <div class="title">
            <h1>Our workable team</h1>
            <span>best team</span>
        </div>
        <div class="row">
            <div class="box">
                <div class="img-box">
                    <img src="image/2.png" width="300">
                </div>
                <div class="detail">
                    <span>Software Engineer</span>
                    <h4>Geraldine Gerald</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/2.png" width="300">
                </div>
                <div class="detail">
                    <span>CEO Of Monde's Munchies</span>
                    <h4>Miss Monde</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/2.png" width="300">
                </div>
                <div class="detail">
                    <span>Project Manager</span>
                    <h4>Geraldine Gerald</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <div class="project">
        <div class="title">
            <h1>Our Best Project</h1>
            <span>how it works</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="image/11.png">
            </div>
            <div class="box">
                <img src="image/111.png">
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="ideas">
        <div class="title">
            <h1>We And Our Clients Are Happy To Cooperate With Our Company</h1>
            <span>our features</span>
        </div>
        <div class="row">
            <div class="box">
                <i class="bi bi-stack"></i>
                <div class="detail">
                    <h2>What We Really Do</h2>
                    <p>We offer gift packages for different kinds of gifting occassions, leave all the gifting stressing for us. We offer customized presents that mean your needs at an afforable price.</p>
                </div>
            </div>
             <div class="box">
                <i class="bi bi-grid-1x2-fill"></i>
                <div class="detail">
                    <h2>Our History</h2>
                    <p>Our founder Monde had a close loved one who she wanted to surprise for his birthday. She made him a personalised birthday box and was inspired to share her gifts with everyone else.</p>
                </div>
            </div>
             <div class="box">
                <i class="bi bi-tropical-storm"></i>
                <div class="detail">
                    <h2>Our Vision</h2>
                    <p>We want to expand Monde's Munchies and reach out to more people, by bringing Monde's Munchies onto an ecommerce platform we are expanding the reach of our audience to get more people enaged with us.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>