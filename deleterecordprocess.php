<?php
// check user logged in
session_start();

$user = $_SESSION['userLogged'];

if (!isset($_SESSION['userLogged'])) {
    header('Location:login.php');
}


include('includes/error-chk.php');
// get record ID
$recordID  = $_POST['recordID'];

// connect to db
include('includes/dbconx.php');


// delete record and return to edit records page
if(isset($recordID) || !empty($recordID)){
    $sql =  "DELETE FROM products WHERE id='$recordID'";
   
   if ($conn->query($sql) === TRUE) {
       header("Location: editrecords.php");
     } else {
       echo "Error deleting record: " . $conn->error;
     }
    }
       $conn->close();
?>
