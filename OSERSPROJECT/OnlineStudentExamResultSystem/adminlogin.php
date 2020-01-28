
<?php
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
mysqli_select_db($con,"osers");
$sql = "SELECT * FROM `admin` WHERE `id` = '1' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$realname= $row['name'];
$realpassword = $row['password'];
$error = '';
    function direct($file){
        header("location:".$file);
    }
    if(isset($_POST['login'])){

        if($_POST['an']!= $realname || $_POST['pass'] != $realpassword)
        {
               $error = 'invalid name or incorrect password!Please Retype it!';
        }
        else{
            $adminName = $_POST["an"];
            $_SESSION["an"] = $adminName;
            $adminpassword = $_POST["pass"];
            $_SESSION["apass"] = $adminpassword;
            direct('adminCatagory.php');
           
    
        }
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
            <div id = "header">          
            </div>
<div id ="lf_rt">
            <div id = "leftcolumn">
                <div id = "free"></div>
		<div id ="catagory">
            <h2 align="center">CATAGORIES</h2><hr/>
                <ul type = "circle">
                <li><a href="adminlogin.php"><div id = "link">Log In As Admin</div></a></li>
                <li><a href="userlogin.php"><div id = "link">Log In As Student</div></a></li>
                </ul>
                <hr/>
		</div>
            </div>
            <div id = "rightcolumn">
            <div id = "free"></div>
            <div id = "userlogin">
                <h1>Log In To The Site</h1>
                <hr />
                 <form method = "post" action = "adminlogin.php">
				<input type="text" name="an" placeholder="Your Name" maxlength="30" max="30"><label>:Your Name</label><br><hr />
				<input type="password" name="pass" placeholder="Your Password" maxlength="20" max="30" name="password" id="password" required><label>:You Password</label><br><hr />
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
					<input type="reset"name ="Clear" value="Clear"><a href = "changeadmin.php"><?php echo " " ." Change username or password?";?></a>
					<hr />
                    <div id= "error"><h3><?php echo $error; ?></h3> 
                </div>
				  </form></div>
            </div>
</div>
                  <div id = "footer">
            <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES<a href = "panelock.php">,</a>(UCSM)<strong></h2>
            </div>
        </div>
         
</body>
</html>
