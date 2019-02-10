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

if($_SESSION['id']!=null){
  $id2 = $_SESSION['id'];
  $sql = "SELECT * FROM table_test where id='$id2'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_row($result);
}


$passwd = @$_POST['passwd'];

if(isset($_POST['modify']) ){
  if($_SESSION['id']!=null){
    $id3 = $_SESSION['id'];
    $passwd = md5($passwd);
    //update the new datas to database
    $sql2 = "UPDATE table_test SET password= '$passwd', wallet='{$_POST['wallet']}', email='{$_POST['email']}', name='{$_POST['name']}', phone='{$_POST['phone']}' where id='$id3'";
  
    if(mysqli_query($conn, $sql2)){
      echo "<script type='text/javascript'>alert('修改完成'); location.href='account.php'</script>";
    }else{
      echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
  }
  
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
        <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="回首頁" href="index2.php">ETicket</a>
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
              <a class="nav-link ecolor" href="account.php"><strong><?php echo "$row[2]" ?></strong><span class="sr-only">(current)</span></a>
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
    <div class="container mt-3">
    </div>
    <div class="row top">
        <div class="col-12">
        </div>
      </div>
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
        <div class="card text-center">
  <div class="card-header">
  </div>
  
      <div class="card-footer text-muted">
    <p class="card-text" style="font-size:30px">修改資料</p>
    <p class="card-text" style="font-size:20px"><span style="color:red;">※若特定資料不需修改，則保留原表格之內容，並按下確認鍵即可!</span></p>
    <form method="post" action="modifyac.php">
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value=<?php echo "$row[2]";?>>
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">新密碼</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="passwd" value=<?php echo "$row[3]";?>>
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">確認新密碼</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="confirmpasswd" value=<?php echo "$row[3]";?> >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10"> 
      <input type="email" class="form-control" name="email" value=<?php echo "$row[4]";?> >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">電子錢包</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="wallet" value=<?php echo "$row[5]";?>>
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">手機號碼</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="phone" value=<?php echo "$row[6]";?>>
    </div>
  </div>
  <button type="submit" name="modify" class="btn">確認修改</button>
</form>
  </div>
</div>
</div>
</div>
</div>


<div class="container text-white bg-dark p-4">
  <div class="row">
    <div class="col-6 col-md-8 col-lg-7">
      <div class="row text-center">
        <div class="col-sm-6 col-md-4 col-lg-4 col-12">
          <ul class="list-unstyled">
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-12">
          <ul class="list-unstyled">
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-12">
          <ul class="list-unstyled">
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
            <li class="btn-link"> <a>Link anchor</a> </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-lg-5 col-6">
      <address>
        <strong>ETicket票務平台</strong><br>
        Indian Treasure Link<br>
        Quitman, WA, 99110-0219<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>
      <address>
        <strong>Full Name</strong><br>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ETicket@gmail.com">ETicket@gmail.com</a>
      </address>
    </div>
  </div>
</div>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>CopyrightcETicket Corporation. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>
<script src="js/main.js"></script>
</body>
</html>