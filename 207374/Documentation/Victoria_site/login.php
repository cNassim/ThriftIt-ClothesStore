<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    

  require_once "./server/cox.php";
    
    $db = cnx_pdo();

    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE user_email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['user_password'])) {
                // Mot de passe correct
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user['user_id']; // Assurez-vous que 'user_id' est une colonne dans votre table
                header("Location: loged_home.php");
                exit();
            } else {
                // Mot de passe incorrect
                echo "<div>Mot de passe incorrect</div>";
            }
        } 
        else {
            // Aucun utilisateur avec cet email
            echo "<div>Email introuvable</div>";
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign In</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn1" name="login" value="Sign In" required>
                </div>
                <div class="links">
                    Not a member? <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Ajoutez vos styles de page de connexion ici */
    </style>
</body>
</html>
