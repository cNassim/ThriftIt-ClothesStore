<?php
session_start();
$_SESSION['ch']=false;
include("php/config.php");
if(isset($_POST['login_btn'])){
$email = $_POST['email'];
$password = md5($_POST['password']);

$stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email = ? AND user_password =? LIMIT 1");
$stmt->bind_param('ss',$email,$password);
if ($stmt->execute()){
    $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
    $stmt->store_result();

    if($stmt->num_rows()==1){
        $row = $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name']=$user_name;
        $_SESSION['user_email']=$user_email;
        $_SESSION['logged_in'] = true;
        header('location:index.php');
    }else{
        echo"<script>alert('Could not verify your account');</script>";
    }
}else{
    echo"<script>alert('Something is wrong try again later');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-register.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="login.php" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="adresse@example.com" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="*********" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn1" name="login_btn" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
      </div>
      <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('img/banner/about.png'); 
            height: 50px;
            height: 50px;
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
      </style>
</body>
</html>