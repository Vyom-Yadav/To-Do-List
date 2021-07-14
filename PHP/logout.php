<?php
session_start();
$todo =  "<script type='text/javascript'>
let todo = document.getElementById('task-list').innerHTML;
</script>";
if (session_destroy()) {
    header("Location: Home.php");
}
