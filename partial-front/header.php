<?php include('config/constant.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CleanConnect - Cleaning Service Management</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/admin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="container">
        <nav class="navbar">
          <a href="index.php" class="logo">
            <i class="fas fa-broom"></i> Cleaning Service
          </a>
          <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="category.php">Category</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>

          <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>  
            <div class="nav-buttons">
            <!-- <a href="#" class="btn btn-outline">Login</a> -->
            <a href="services.php" class="btn btn-primary">Book Now</a>
          </div>  
        </nav>
      </div>
    </header>