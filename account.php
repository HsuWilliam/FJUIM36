<!DOCTYPE html>

<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "db_test";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    header("location: index.php");
}


?>




<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="售票平台">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETicket</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <!-- self -->
    <link href="test.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background-color: #5F9EA0">
      <div class="container ">
        <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="回首頁" href="#">ETicket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="請輸入活動關鍵字.." aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit"><img src="images/search.png" width="30" height="30" class="d-inline-block align-top" alt=""></button>
          </form>
          <ul class="nav justify-content-center navbar-nav m-auto ">
            <li class="nav-item active">
              <a class="nav-link ecolor bcl bcr" href="#">　所有活動　<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link ecolor bcr" href="#">　最新消息　</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link ecolor bcr" href="#">　二手票券　</a>
            </li>
            <li class="nav-item active white">
              <a class="nav-link ecolor bcr" href="#">　常見問題　</a>
            </li>
          </ul>
          <ul class="nav justify-content-end navbar-nav ml-auto">
          <li class="nav-item active">
          <?php  if (isset($_SESSION['id'])) : ?>
              <a class="nav-link ecolor" href="#"><strong><?php echo $_SESSION['id']; ?></strong><span class="sr-only">(current)</span></a>
            <?php endif ?>
            </li>
            <li class="nav-item active">
              <a class="nav-link ecolor" href="introduce.php"><img src="images/new-user.png" width="25" height="25" class="d-inline-block align-top" alt="">註冊 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link ecolor" href="index.php?logout='1'"><img src="images/sign-in.png" width="25" height="25" class="d-inline-block align-top" alt="">登出 </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ecolor" href="#"><img src="images/shopping-cart.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   <hr>
    <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  
  <div class="card-footer text-muted">
    <p class="card-text" style="font-size:30px">帳號資訊</p>
    <p class="card-text"><?php  if (isset($_SESSION['id'])) : ?>
    身分證字號:<strong><?php echo $_SESSION['id']; ?></strong><?php endif ?></p>

    <p class="card-text">姓名:</p>
    <p class="card-text">身分證字號</p>
    <p class="card-text">身分證字號</p>
    <a href="#" class="btn btn-primary">更改資訊</a>
  </div>
</div>
    
    </body>
    </html>