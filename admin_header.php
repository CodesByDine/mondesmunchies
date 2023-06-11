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
                <a href="admin_pannel.php">Home</a>
                <a href="admin_product.php">Products</a>
                <a href="admin_order.php">Orders</a>
                <a href="admin_user.php">Users</a>
                <a href="admin_message.php">Messages</a>
            </nav>

            <div class='icons'>
                <i class="bi bi-person" id="user-btn"></i>
                <i class="bi bi-list" id="menu-btn"></i>
            </div>
            <div class="user-box">
                <p>username: <span><?php echo $_SESSION['admin_name'] ?></span></p>
                <p>Email: <span><?php echo $_SESSION['admin_email'] ?></span></p>

                <form method="post">
                    <button type="submit" name="logout"class="logout-btn">Logout</button>
                </form>
            </div>

        </div>
    </header>

    <div class="banner">
        <div class="detail">
            <h1>Admin Dashboard</h1>
            <p>Welcome to Monde's Munchies! Where we build gift boxes that unwrap smiles on our customer's faces😊</p>
        </div>
    </div>

    <div class="line"></div>
</body>
</html>