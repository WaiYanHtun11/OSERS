<?php 
session_start();
$_SESSION["an"] = '';
$_SESSION["user"] = '';
$_SESSION["pass"] = '';
$_SESSION["acdyear"] = '';
session_destroy();
function direct($file){
    header("location:".$file);
}
direct('homepage.php');
?>
