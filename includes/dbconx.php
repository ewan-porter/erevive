<?php

$servername="localhost";
$username="ewanport_erevive";
$password ="erevive!!";
$db = "ewanport_erevive";


//create connection
$conn = new mysqli($servername, $username, $password, $db);

//check connection

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    //header(Location:""); error friendly page
} 



?>