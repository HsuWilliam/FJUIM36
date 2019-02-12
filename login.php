<!DOCTYPE html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_test";
    $errors = array();


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    session_start();

    if(isset($_POST['login_user'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $passwd = mysqli_real_escape_string($conn,$_POST['password']);

        if(empty($id)){
            array_push($errors,"身分證字號為必填");
        }
        if(empty($passwd)){
            array_push($errors,"密碼為必填");
        }

      $sql = "SELECT * FROM table_test WHERE id='$id'";
      $res = mysqli_query($conn,$sql);
      $row = mysqli_fetch_row($res);
      if($row[1]==null){
        array_push($errors,"帳號不存在");
      }

      
        if(count($errors) == 0){
            $passwd = md5($passwd);
            $query = "SELECT * FROM table_test WHERE id='$id' AND password='$passwd'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)//log user in
            {
                $_SESSION['id'] = $id;
                $_SESSION['success'] = "You are now logged in ";
                header('location: index2.php'); //go to home page
            }else{
                array_push($errors,"Wrong password");
            }
            }
        }
?>

<html>
<head>
    <meta charset="utf-8">
  <title>ETicket</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>ETicket登入</h2> 
  </div>
	 
  <form method="post" action="login.php">
  <?php include('reerror.php');?>
  	<div class="input-group">
  		<label>身分證字號</label>
  		<input type="text" name="id"  value="<?php echo @$id; ?>">
  	</div>
  	<div class="input-group">
  		<label>密碼</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
    <p>
  		<a href="#">忘記密碼</a>
  	</p>
  </form>
</body>
</html>