<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
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
        }
        else {
            echo '<li class="log-out" onclick="logOut()"><a href="logout.php">Log Out(' . $_SESSION['login_user'] .')</a></li>';
        }
        ?>
    </ul>
</nav>

<!-- Navbar ended -->

<!-- Sidebar started -->


<ul class="sidebar-list">
    <li class="user-image"><img src="../Images/profile-pic-2.png" alt="" class="user-image-pic"></li>
    <li class="user-name">
        <?php
        session_start();
        if (empty($_SESSION['login_user'])) {
            echo 'Anonymous';
        }
        else {
            echo $_SESSION['login_user'];
        }
        ?>
    </li>
    <li class="due-date"><a href="#">Due Today(Soon)</a></li>
    <li class="projects">Projects(Soon)
        <button class="dropdown-btn"><i class="fas fa-angle-double-down"></i></button>
        <?php
        session_start();
        if (empty($_SESSION['login_user'])) {
            echo '<button class="dropdown-add-btn" onclick="askToLogIn()"><i class="fas fa-plus"></i></button>';
        }
        else {
            echo '<button class="dropdown-add-btn" onclick="addProject()"><i class="fas fa-plus"></i></button>';
        }
        ?>
        <br>
        <label class="addition">
            <input type="text" class="project-name" placeholder="Add Project...">
            <input type="submit" value="Add" class="list-add-btn" onclick="addProjectTitle()">
        </label>
        <ul id="project-list">
        </ul>
    </li>
</ul>


<!-- Sidebar ended -->

<!-- Main Dashboard started -->
<div class="main-dashboard">
    <p class="to-do-heading">To Do</p>
    <p class="in-progress-heading">In Progress</p>
    <p class="done-heading">Done</p>
    <div class="to-do">
        <iframe src="toDo.php"></iframe>
    </div>
    <div class="in-progress">
        <iframe src="inProgress.php"></iframe>
    </div>
    <div class="done">
        <iframe src="done.php"></iframe>
    </div>
</div>
<!-- Main Dashboard ended -->

<script src="../Javascript/listPopper.js"></script>
</body>
</html>