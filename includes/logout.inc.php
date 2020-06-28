<?php
if(isset($_POST['logout-submit'])){
    session_start();
    session_unset();
    session_destroy();
    header('location: ../index.php');
}
else{
    header('location: ../signup.php');
    exit();
}