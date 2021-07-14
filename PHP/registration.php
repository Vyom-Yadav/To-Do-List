<?php
include("config.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Add a user and username

    $entered_username = mysqli_real_escape_string($db, $_POST['username']);
    $email_entered = mysqli_real_escape_string($db, $_POST['email']);
    $password_entered = mysqli_real_escape_string($db, $_POST['password']);
    $password_re_entered = mysqli_real_escape_string($db, $_POST['password_2']);

    $error = null;

    if ($password_entered != $password_re_entered) {
        $error = "Passwords do not match";
    } else {
        $error = "";
    }

    //check database for already existing users.

    $user_check_query = "SELECT * FROM admin WHERE username = '$entered_username' or email = '$email_entered' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        if ($row['username'] === $entered_username) {
            $error = "Username already exists";
        }
        if ($row['email'] === $email_entered) {
            $error = "Email already exists, try logging In";
        }
    } else if ($error == "") {
        // Create a new user
        $password_to_be_stored = md5($password_entered);
        $query = "INSERT INTO admin(username, password, email) VALUES('$entered_username','$password_to_be_stored','$email_entered')";
        mysqli_query($db, $query);

        $_SESSION['login_user'] = $entered_username;
        header("location: Home.php");
    }
}
?>

<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/registration.css">
</head>
<body>
<!-- Navbar started -->
<nav class="navbar">
    <ul class="nav-list">
        <li class="logo"><a href="#"><img src="#" alt=""></a></li>
        <li class="home"><a href="Home.php">Home</a></li>
        <li class="features"><a href="Dashboard.php">Dashboard</a></li>
        <li class="resources">
            <a class="dropbtn">Resources</a>
            <div class="dropdown-content">
                <a href="Tutorials.php">Tutorials</a>
                <a href="Contribute.php">Contribute</a>
            </div>
        </li>
        <?php
        if (empty($_SESSION['login_user'])) {
            echo '<li class="log-in"><a href="../PHP/login.php">Log in</a></li>
              <li class="sign-up"><a href="registration.php">Sign up</a></li>';
        } else {
            echo '<li class="log-out" onclick="logOut()"><a href="logout.php">Log Out(' . $_SESSION['login_user'] .')</a></li>';
        }
        ?>
    </ul>
</nav>
<!-- Navbar ended -->

<!-- Registration form started -->
<div class="outer-box">
    <form action="" method="post" class="registration-form">
        <span>Register Now for free!!</span><br><br>
        Username:<br>
        <label for="username">
            <input type="text" name="username" required class="box">
        </label><br><br>
        Email:<br>
        <label for="email">
            <input type="text" name="email" required class="box">
        </label><br><br>
        Password:<br>
        <label for="password">
            <input type="password" name="password" required class="box">
        </label><br><br>
        Retype password:<br>
        <label for="password_2">
            <input type="password" name="password_2" required class="box">
        </label><br><br>
        <input type="submit" value=" Register " class="register-btn"/><br/>

        <div><?php echo $error; ?></div>
    </form>
</div>
<!-- Registration form ended -->
</body>
</html>
