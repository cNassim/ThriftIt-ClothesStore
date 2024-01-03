<?php
include("php/config.php");
$_SESSION['ch']=false;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $confirmpassword = $_POST['Confirm_password'];
    $password = $_POST['password'];

    if ($password !== $confirmpassword) {
        echo "<script>alert('Password doesn't match try again');</script>";
    } else if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters');</script>";
    } else {
        // Check whether there is a user with this email or not
        $stmt1 = $conn->prepare("SELECT * FROM users WHERE user_email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if ($result->num_rows != 0) {
            echo "<script>alert('This email is used, Try another One Please!');</script>";
        } else {
            // Create a new user
            $hashed_password = md5($password); // Hash the password
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $username, $email, $hashed_password);

            // If account was created successfully
            if ($stmt->execute()) {
                echo "<script>alert('Created successfully');</script>";
                header('location:login.php');
            } else {
                echo "<script>alert('Could not create an account at the moment');</script>";
            }
        }
    }
}

            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/style-register.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

       

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Your Name</label>
                    <input type="text" name="username" id="username" autocomplete="off"placeholder="Your Name" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="adresse@example.com" required>
                </div>

                <div class="field input">
                    <label for="age">Pasword</label>
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="*********" required>
                </div>
                <div class="field input">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="Confirm_password" id="Confirm_password" autocomplete="off" placeholder="*********" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn1" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
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
