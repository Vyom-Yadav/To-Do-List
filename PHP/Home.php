<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TO ⱭO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">
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

<!-- Mid body started -->
<div class="background">
    <img src="../Images/background-image2.png" alt="" class="to-do-icon">
    <p class="tag-line">
        Organize
        <br>
        everything with<br>
        <span class="brand-name">TO ⱭO</span>
        <br><br>
        <a href="Tutorials.php"><button class="get-started">Get Started</button></a>
    </p>
</div>
<!-- Mid body ended -->

<div class="laptop-body">
    <div class="image-laptop">
        <img src="../Images/laptop.png" alt="">
    </div>
    <div class="to-do-tag-line">
        Get Things from To Do to Done.
    </div>
</div>

<div class="creator">
    <div class="img">
        <a href="https://github.com/Vyom-Yadav"><img src="../Images/creator.png" alt="" class="creator-img"></a>
    </div>
    <div class="meet-the-creator"><span class="inverted-quotes">"</span>I literally couldn’t do my job or even manage
        all the business of being a fully experienced with task management without TO ⱭO.<span
                class="inverted-quotes">"</span></div>
</div>
</body>
<script>
    function logOut() {
        alert("Successfully Logged out");
    }
</script>
</html>