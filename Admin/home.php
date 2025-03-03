<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: index.php");
    exit();
}
$usertyple =$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    body {
      background-color: #FFFFFF;
      color: #fff;
    }
    .icon-box {
      background-color: #555;
      border-radius: 15px;
      padding: 20px;
      text-align: center;
      margin-bottom: 20px;
    }
    .icon-box a {
      color: #fff;
      text-decoration: none;
    }
    .top-bar {
      background-color: #FFFFFF;
      color: #fff;
      padding: 10px;
      text-align: right;
    }
  </style>
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col">
        Welcome User Name
      </div>
      <div class="col text-right">
        <a href="#" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <!-- Icon 1: Create Event -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-calendar-plus fa-5x"></i>
          <p>Create Movie</p>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <!-- Icon 2: List Event -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-list-alt fa-5x"></i>
          <p>List Movie</p>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <!-- Icon 3: Edit and Delete Event -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-edit fa-5x"></i>
          <p>Delete Movie</p>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <!-- Icon 4: Select Winner -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-trophy fa-5x"></i>
          <p>Edit Movie</p>
        </a>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-3">
      <!-- Icon 5: Winner List -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-users fa-5x"></i>
          <p>Bookmyshow</p>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <!-- Icon 6: Upload Winner List -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-cloud-upload-alt fa-5x"></i>
          <p>Bookmyshow</p>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <!-- Icon 7: Winner History -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-history fa-5x"></i>
          <p>Bookmyshow</p>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <!-- Icon 8: Reports -->
      <div class="icon-box">
        <a href="#">
          <i class="fas fa-chart-bar fa-5x"></i>
          <p>Bookmyshow</p>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>
