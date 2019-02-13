<!DOCTYPE html>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eticket";
$errors = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = @$_POST['id'];
$passwd = @$_POST['password'];
$confirmpassword = @$_POST['confirmpassword'];
$wallet = @$_POST['wallet'];
$email = @$_POST['email'];
$name = @$_POST['name'];
$phone = @$_POST['phone'];
$address = @$_POST['address'];
$bday =  @$_POST['bday'];

//if the register button is clicked
if(isset($_POST['register'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $wallet = mysqli_real_escape_string($conn,$_POST['wallet']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $bday = mysqli_real_escape_string($conn,$_POST['bday']);

    if(empty($id)){
        array_push($errors,"身分證字號為必填");
    }
    if(empty($passwd)){
        array_push($errors,"密碼為必填");
    }
    if(empty($wallet)){
        array_push($errors,"電子錢包地址為必填");
    }
    if(empty($name)){
        array_push($errors,"中文姓名為必填");
    }
    if(empty($email)){
        array_push($errors,"email為必填");
    }
    if(empty($phone)){
        array_push($errors,"手機號碼為必填");
    }
    if($passwd != $confirmpassword){
        array_push($errors,"密碼不相同");
    }
    if(empty($address)){
        array_push($errors,"地址為必填");
    }
    if(empty($bday)){
        array_push($errors,"生日為必填");
    }

    
}
    $user_check_query = "SELECT * FROM user WHERE id='$id' OR email='$email' ";
    $result = mysqli_query($conn, $user_check_query);
    $check = mysqli_fetch_assoc($result);

    if ($check) { // if user exists
    if ($check['id'] === $id) {
    array_push($errors, "身分證字號已存在");
     }

     if ($check['email'] === $email) {
    array_push($errors, "email已被使用");
    }
    }
    

if(isset($_POST['register'])){
if(count($errors)==0){
$passwd = md5($passwd);  //encrypt the password before saving in the database
$sql = "INSERT INTO user (name, id, password ,wallet, email, phone , address ,birthday) VALUES ('$name', '$id', '$passwd' , '$wallet', '$email','$phone', '$address','$bday')";
//if ($passwd == $confirmpassword) {
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('完成註冊'); location.href='login.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
//};
}}

mysqli_close($conn);
?>


<html>
<head>
    <meta charset="utf-8">
    <title>ETicket會員註冊</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  
</head>
<body>
    <div class = "header">
    <h2>ETicket會員註冊</h2>
    </div>
    <form method="post" action="register.php">
        <?php include('reerror.php');?>
        <div class="input-group">
            <label>身分證字號</label>
            <input type="text" name="id" value="<?php echo $id; ?>" >
        </div>
        <div class="input-group">
            <label>密碼</label>
            <input type="password" name="password" value="<?php echo $passwd; ?>">
        </div>
        <div class="input-group">
            <label>確認密碼</label>
            <input type="password" name="confirmpassword" value="<?php echo $confirmpassword; ?>" >
        </div>
        <div class="input-group">
            <label>電子錢包地址</label>
            <input type="text" name="wallet" value="<?php echo $wallet; ?>">
        </div>
        <div class="input-group">
            <label>中文姓名</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>手機號碼</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="input-group">
            <label>生日</label>
        <input type="date" name="bday">
        </div>
        <div class="input-group">
            <label>住址</label>
        <input type="text" name="address" >
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
        </div>        
        <p>
  		Already a member? <a href="login.php">Sign in</a>
    	</p>
    </form>
</body>
</html>