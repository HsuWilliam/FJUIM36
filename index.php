<!DOCTYPE html>

<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "db_test";
   $dbname2 = "eticket";
// Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   $conn2 = mysqli_connect($servername,$username,$password,$dbname2);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    header("location: index.php");
}
$res = mysqli_query($conn2,"SELECT * FROM program where prog_id=1" );
$row = mysqli_fetch_array($res);
$res2 = mysqli_query($conn2,"SELECT * FROM program where prog_id=2" );
$row2 = mysqli_fetch_array($res2);
$res3 = mysqli_query($conn2,"SELECT * FROM program where prog_id=3" );
$row3 = mysqli_fetch_array($res3);
$res4 = mysqli_query($conn2,"SELECT * FROM program where prog_id=4");
$row4 = mysqli_fetch_array($res4);


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
              <a class="nav-link ecolor" href="#"><span class="sr-only">(current)</span></a>
            <?php endif ?>
            </li>
            <li class="nav-item active">
              <a class="nav-link ecolor" href="introduce.php"><img src="images/new-user.png" width="25" height="25" class="d-inline-block align-top" alt="">註冊 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link ecolor" href="login.php"><img src="images/sign-in.png" width="25" height="25" class="d-inline-block align-top" alt="">登入 </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ecolor" href="#"><img src="images/shopping-cart.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <div class="row top">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleControls" data-slide-to="1"></li>
              <li data-target="#carouselExampleControls" data-slide-to="2"></li>
              <li data-target="#carouselExampleControls" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $row["img"]; ?>" height="400" width="1500" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $row2["img"]; ?>" height="400" width="1500" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $row3["img"]; ?>" height="400" width="1500" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $row4["img"]; ?>" height="400" width="1500" alt="fourth slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <hr>
    </div>

    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <button  href="#" style="padding:30px; border-width:3px; margin:5px; margin-left:235px;" class="btn btn-dark col-2"><img src="images/heart.png" width="50" height="50" class="d-inline-block align-top" alt=""><br><br><h4>演唱會</h4></button>
          <button  href="#" style="padding:30px; border-width:3px; margin:5px;" class="btn btn-dark col-2"><img src="images/heart.png" width="50" height="50" class="d-inline-block align-top" alt=""><br><br><h4>體育</h4></button>
          <button  href="#" style="padding:30px; border-width:3px; margin:5px;" class="btn btn-dark col-2"><img src="images/heart.png" width="50" height="50" class="d-inline-block align-top" alt=""><br><br><h4>展覽</h4></button>
          <button  href="#" class="btn btn-light col-2"><h4>　全部 》</h4></button>
        </div>
      </div>
    </div>




    <div class="container">
    <hr><br>
    <h4>最新公告最新公告最新公告最新公告最新公告最新公告最新公告</h4>
    <h4>展覽最新公告最新公告最新公告最新公告最新公告最新公告最新公告最新公告</h4>
    <br><hr>
</div>




    <div class="container">
  <!-- Nav tabs -->
  <div class="row">
        <div class="col-12">
          <ul class="nav nav-tabs nav-justified" style="margin-top:20px;">
            <li class="active col-4"><a class="nav-link active" data-toggle="tab" href="#home">最新活動</a></li>
            <li class="col-4"><a class="nav-link" data-toggle="tab" href="#menu1">熱門活動</a></li>
            <li class="col-4"><a class="nav-link" data-toggle="tab" href="#menu2">特色活動</a></li>
          </ul>
      </div>
    </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="<?php echo $row["img"]; ?>" height="180" alt="Card image cap">
            <div class="card-body">
     
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph1').src='images/success-cart.png'" ><img id="ph1" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="<?php echo $row2["img"]; ?>" height="180" alt="Card image cap">
            <div class="card-body">
           
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph2').src='images/success-cart.png'" ><img id="ph2" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="<?php echo $row3["img"]; ?>" height="180" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph3').src='images/success-cart.png'" ><img id="ph3" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="<?php echo $row4["img"]; ?>" height="180" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph4').src='images/success-cart.png'" ><img id="ph4" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph5').src='images/success-cart.png'" ><img id="ph5" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph6').src='images/success-cart.png'" ><img id="ph6" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph7').src='images/success-cart.png'" ><img id="ph7" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph8').src='images/success-cart.png'" ><img id="ph8" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph9').src='images/success-cart.png'" ><img id="ph9" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph10').src='images/success-cart.png'" ><img id="ph10" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph11').src='images/success-cart.png'" ><img id="ph11" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph12').src='images/success-cart.png'" ><img id="ph12" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph13').src='images/success-cart.png'" ><img id="ph13" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph14').src='images/success-cart.png'" ><img id="ph14" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph15').src='images/success-cart.png'" ><img id="ph15" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph16').src='images/success-cart.png'" ><img id="ph16" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
           
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph17').src='images/success-cart.png'" ><img id="ph17" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <br>
              <img src="images/.png" width="35" height="35" class="d-inline-block align-top" alt="">
              <button style="float:center" href="#" class="btn btn-secondary">立即購票 <img src="images/ticket.png" width="25" height="25" class="d-inline-block align-top" alt=""></button>
              <button class="btn btn-primary" style="border:0; background-color: transparent; float:right;" onclick="document.getElementById('ph18').src='images/success-cart.png'" ><img id="ph18" onclick="change()" src="images/star.png" width="35" height="35" class="d-inline-block align-top" alt="">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>


    <hr>

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
            <strong>客服信箱</strong><br>
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