<?php
//session start

session_start();

//delete session data and relocate user to index page
session_unset();
session_destroy();
header( 'Location: index.php' ) ;
die();
?>