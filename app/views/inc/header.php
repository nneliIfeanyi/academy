<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />
  <link rel="icon" href="images/favicon.png" />
  <title><?php echo SITENAME; ?></title>

  <style>
    /*flash Message*/
    #msg-flash {
      margin: 0;
      position: fixed;
      bottom: 0;
      right: 0;
      width: 100%;
      text-align: center;
      z-index: 500;
      animation-name: fade;
      animation-duration: 3s;
      animation-delay: 6s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
      transition: 2s;
    }

    .msg-flash {
      margin: 0;
      position: fixed;
      bottom: 0;
      right: 0;
      width: auto;
      z-index: 500;
      animation-name: fade;
      animation-duration: 3s;
      animation-delay: 6s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
      transition: 2s;
    }

    @keyframes fade {
      from {
        z-index: 100;
      }

      to {
        visibility: hidden;
        z-index: -1;

      }
    }

    /*Parsley validate*/
    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
      border-color: #D43F3A;
      box-shadow: none;
    }

    input.parsley-error:focus,
    select.parsley-error:focus,
    textarea.parsley-error:focus {
      border-color: #D43F3A;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #FF8F8A;
    }

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
      border-color: #398439;
      box-shadow: none;
    }

    input.parsley-success:focus,
    select.parsley-success:focus,
    textarea.parsley-success:focus {
      border-color: #398439;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #89D489
    }

    .parsley-errors-list {
      list-style-type: none;
      padding-left: 0;
      margin-top: 5px;
      margin-bottom: 0;
    }

    .parsley-errors-list.filled {
      color: #D43F3A;
      opacity: 1;
    }
  </style>
</head>

<body id="home">
  <?php echo flash('msg'); ?>
  <div id="success-msg"></div>