<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form.

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $mypassword_2 = md5($mypassword);

    $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword_2'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: Home.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/login.css">
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
        }
        else {
            echo '<li class="log-out" onclick="logOut()"><a href="logout.php">Log Out(' . $_SESSION['login_user'] .')</a></li>';
        }
        ?>
    </ul>
</nav>
<!-- Navbar ended -->

<!-- Login Box start -->
<div class="login-box">
    <div class="login-box-inner">
        <span class="upper-span">Save Your Work</span>
        <div class="login-text"><span class="lower-span">Login</span></div>
        <br>
        <div class="login-form">
            <form action="" method="post">
                <label>UserName :
                    <input type="text" name="username" class="box"/><br/><br/>
                </label>
                <label>Password :
                    <input type="password" name="password" class="box"/>
                </label>
                <br/><br/>
                <input type="submit" value=" Log In " class="log-in-button"/><br/>
            </form>
            <div class="login-error"><?php echo $error; ?></div>
        </div>
    </div>
</div>
<!-- Login Box start -->

</body>
<script>
    function logOut() {
        alert("Successfully Logged out");
    }
</script>
</html>
