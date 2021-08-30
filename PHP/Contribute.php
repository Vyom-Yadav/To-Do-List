<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contribute</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/contribute.css">
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

<!-- main content started -->
<div class="wrapper">
    <h1 class="heading">Introduction</h1>
    <div class="content">
        <p>
            Hey, good to see you on this page. It means that you are considering a contribution of your own work to the
            To Do project. We welcome anything: bugfixes, new check modules, unit tests, documentation improvements,
            build process simplification, etc.<br><br>

            This document assumes you are working with the GIT version of checkstyle and that you are familiar with some
            standard development tools like chrome debugger or any browser debugger.<br>

            Luckily we don't have to and we don't support older versions of IE, I know maintaining those could be very
            painful.<br><br>

            ATTENTION: if you have idea how to improve To Do please create issue on our tracking system. As soon as one
            of admins of our project approved your idea you are good to start implementation and you will be welcome
            with final code contribution. Please do not expect that we will accept any code that you send to us.
        </p>
    </div>
    <h1 class="heading">Report an Issue</h1>
    <div class="content">
        <p>
            Did you just find any bug or improvements in the project? Please report them on github, who knows you find
            something interesting and get rewarded for it.
        </p>
    </div>
    <h1 class="heading">Quality Matters</h1>
    <div class="content">
        <p>
            Currently I am only working on this project, but I would feel obliged if I could see some other developers
            also
            helping out. If you have any idea or want to submit a pull request please include some code on how you plan
            to
            go on with the idea or issue. I will surely help you but I won't do it for you. Include some code and ask
            for
            anything if you need.
        </p>
    </div>
    <h3 class="project">In case you were wondering where is this project situated, just head on to <a href="https://github.com/Vyom-Yadav/To-Do-List" class="outlink">here</a>
    </h3>
</div>
</body>
</html>
