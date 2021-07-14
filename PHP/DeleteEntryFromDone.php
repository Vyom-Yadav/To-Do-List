<?php
include("config.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = mysqli_real_escape_string($db, $_GET['id']);
    $sql = "DELETE FROM done WHERE id = '$id'";
    mysqli_query($db, $sql);
    header("Location: done.php");
}

