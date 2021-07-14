<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutorials</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/tutorials.css">
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
        session_start();
        if (empty($_SESSION['login_user'])) {
            echo '<li class="log-in"><a href="login.php">Log in</a></li>
        <li class="sign-up"><a href="registration.php">Sign up</a></li>';
        } else {
            echo '<li class="log-out" onclick="logOut()"><a href="logout.php">Log Out(' . $_SESSION['login_user'] . ')</a></li>';
        }
        ?>
    </ul>
</nav>
<!-- Navbar ended -->

<!-- Tutorials start -->
<div class="tutorial-wrapper">
    <div class="info">
        Simply Add things to do with just a click of a button
    </div>
    <div><img src="../Images/todo.gif" alt="" class="gif"></div>
    <div><img src="../Images/inProgress.gif" alt="" class="gif"></div>
    <div class="info progress">
        Add things in progress and set how much you are done with.
    </div>
    <div class="info">
        Add things which are done for future evaluation and for satisfaction.
    </div>
    <div><img src="../Images/done.gif" alt="" class="gif"></div>
</div>
<!-- Tutorials end -->
</body>
</html>