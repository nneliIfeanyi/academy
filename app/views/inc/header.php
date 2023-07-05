<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo SITENAME; ?></title>

  <!-- Local style -->
  <link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/style2.css">
    <link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/animate.css">
    <link rel="stylesheet"  type="text/css" href="<?= URLROOT ?>/css/w3.css">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/custom.css">

  <!-- bootstrap core css -->

  <link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/bootstrap.css" />
  <!-- fonts awesome style -->
  <link href="<?= URLROOT ?>/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?= URLROOT ?>/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= URLROOT ?>/css/responsive.css" rel="stylesheet" />
</head>

<body>

<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <div class="custom_menu-btn">
          <button onclick="openNav()">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>
        </div>
        <div id="myNav" class="overlay">
          <div class="menu_btn-style ">
            <button onclick="closeNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
          </div>
          <?php if(!isset($_SESSION['user_id'])) : ?>
          <div class="overlay-content">
            <a class="" href="<?=URLROOT?>/pages">
              Home
            </a>
            <a class="" href="<?=URLROOT?>/users/register">
              Register
            </a>
            <a class="" href="<?=URLROOT?>/users/login">
              Login
            </a>
          </div>
        </div>
        <a class="navbar-brand" href="<?=URLROOT?>/pages">
          <span>
           <?= SITENAME ?>
          </span>
        </a>
        <div class="user_option">
          <a href="<?=URLROOT?>/users/login">
            <i class="fa fa-user" aria-hidden="true"></i>
          </a>
        </div>


        <?php else : ?>
           <div class="overlay-content">

           <a class="" href="<?=URLROOT?>/pages">
              Home
            </a>

            <a class="" href="<?=URLROOT?>/users/logout"><i class="fa fa-sign-out"></i> Logout</a>
         </div>
        </div>
        <a class="navbar-brand" href="<?=URLROOT?>/pages">
          <span>
           <?= SITENAME ?>
          </span>
        </a>
        <div class="user_option">
          <a href="<?=URLROOT?>/posts">
            <i class="fa fa-user " aria-hidden="true"></i>
          </a>
        </div>

        <?php endif; ?>
      </nav>
    </header>
  
    <!-- end header section -->
  
