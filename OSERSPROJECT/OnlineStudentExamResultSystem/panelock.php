<?php  
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
function direct($file){
    header("location:".$file);
}
mysqli_select_db($con,"osers");
$insertnoti ='';
$tablename = '';
$filename = '';
$name = '';
if(isset($_POST['clear'])){
    direct('cleardata.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>                                        
<title>Online Student Exam Result System</title> 
<link rel = "stylesheet" href="mypage.css">   
</head>
<body>
        <div id = "wrapper">
            <div id = "osers">
                <div id = "panel">
                <h2>Enter The Key To Access The Panel</h2>
                <hr/>
                <form action = "panelock.php" method="post">
                <input type = "password" name = "lock">
                <input type = "submit" name = "lockey"  value = "Unlock">
                <hr/>
                <?php
                if(isset($_POST['lockey'])){
                    if($_POST['lock'] != 'osersucsm2002'){
                        echo '<h3>Incorrect Key</h3>';
                    }
                    else{
                        direct('OSERSBACKEND.php');
                    }

                }
                
                
                ?>
                </div>
            
        </div>  
        
            </div>
</body>
</html>