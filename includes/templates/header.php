<?php 
require "admin/includes/cnxpdo.php";
require "includes/functions/functions.php";
session_start();
$ip = getIP();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>EliteFood - <?php getTitle(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="layouts/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="layouts/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="layouts/css/front.css"/>
        <style>
        </style>
    </head>
    <body>
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span style="margin-right: 17px;">Elite</span>
                  <img src="Images/home/logo.png"/>
                <span >Food</span></a>
            <ul class="list-unstyled header-actions">
                <!-- <li><a href="#"><i class="fa fa-search"></i></a></li> -->
                <li class="li-search">
                    <a class="nav-link">
                     <i class="fa fa-search"></i>
                    </a>
                    <div class="search-collapse">
                        <form action="search.php" method="GET">
                        <div class="input-group">
                            <input type="text" name="term" id="search" class="form-control" placeholder="Searching for ..."/>
                            <span class="input-group-btn">
                                <button type="submit" class="btn"><li class="fa fa-search"></li></button>
                            </span>
                        </div>
                        </form>
                    </div> 
                </li>
                <li>
                    <a href="cart.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span style="position: absolute;text-decoration: none;font-size: 11px;color: red;" class="cart-count"><?php echo getCount("cart","WHERE ip_addr = '$ip'"); ?></span>
                    </a>
                </li>
                <!-- <li><a href="#"><i class="fa fa-user"></i></a></li> -->
                <li>
                    <div class="dropdown">
                        <button style="border:none;background:none;" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-user"></i><span class="head-username"><?php if(isset($_SESSION["user"])&&!empty($_SESSION["user"])){echo $_SESSION["user"];}else{echo "Login";} ?></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                             if(isset($_SESSION['user']))
                             {
                                 ?>
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="orders.php">My Orders</a>
                                    <hr/>
                                    <a class="dropdown-item" href="edit_password.php">Edit Password</a>
                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                 <?php
                             } 
                             else
                             {
                                 ?>
                                     <a class="dropdown-item" href="login.php">Sign in</a>
                                     <a class="dropdown-item" href="login.php?action=signup">Sign up</a>
                                 <?php
                             }
                            ?>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if(isset($active)&&$active == 'home'){echo "active";} ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php if(isset($active)&&$active == 'shop'){echo "active";} ?>" href="shop.php">Shop</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link <?php if(isset($active)&&$active == 'mustpop'){echo "active";} ?>" href="mustpopular.php">Must Popular</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link <?php if(isset($active)&&$active == 'blog'){echo "active";} ?>" href="blogs.php">Blog</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link <?php if(isset($active)&&$active == 'contact'){echo "active";} ?>" href="contact.php">Contact</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link <?php if(isset($active)&&$active == 'about'){echo "active";} ?>" href="about.php">About</a>
                </li>
                </ul>
            </div>
        </div>
</nav>
<div class="dress-height-nav"></div>