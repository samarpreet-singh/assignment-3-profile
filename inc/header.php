<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2 - Create and read</title>
    <meta name="description" content="This is a create and read assignment!">
    <meta name="robots" content="noindex, nofollow">
    <!-- adding my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <!-- adding Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script> <!--Custom Js Bundle-->
    <!-- adding custom CSS and fontawesome -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  </head>
  <body>
    <?php
      if(isset($_GET['msg1']) == "created"){ // using get, we check url and if url matches insert at the end, then we say record has been created
        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>X</button>
            Your profile was added! Scroll down to see it!
          </div>";
      }
      if(isset($_GET['msg2']) == "update"){
        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>X</button>
            Your information has been updated!
          </div>";
      }
      if(isset($_GET['msg3']) == "delete"){ // no need to put the create message here because that is only done on the index page.
        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>X</button>
            Your profile has been deleted!
          </div>";
      } 
      // update and delete are on view.php
    ?>
    <!-- setting up the navbar-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">Profile Create and Read Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!--navbar ends-->

    <!--Header begins-->
    <header class="bg-light text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Add <span class="text-warning">Your Profile Information</span> Below!</h1>
                    <p class="lead" my-4>To create a profile on this page, we need some information about you. Please enter your name, your organization's contact email, a few introductory lines about yourself (you can go above and beyond and write as much as you wish to!) and then your information will be displayed in a section below the form!</p>
                    <button class="btn btn-primary btn-lg"><a href="#form" id="link">Take me there!</a></button>
                </div>
                <img class="img-fluid w-25 d-none d-sm-block" src="./img/header-image.svg" alt="Header Image">
            </div>
        </div>
    </header>