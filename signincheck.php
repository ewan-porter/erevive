<?php

// code to relocate to admin page if user logged in
session_start();

$user = $_SESSION['userLogged'];

if (!isset($_SESSION['userLogged'])) {
    header('Location:signin.html');
} else {
    header('Location:admin.php');
}

?>