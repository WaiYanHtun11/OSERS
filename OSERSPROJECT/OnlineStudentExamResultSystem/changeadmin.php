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
$newname = '';
$newpassword = '';
$error = '';
    function direct($file){
        header("location:".$file);
    }
    if(isset($_POST['Savechanges'])){

        if($_POST['oldname']!= $row['name'] or $_POST['oldpass'] != $row['password'] )
        {
               $error = 'incorrect old name or password!Please Retype it!';
        }
        elseif($_POST['newpassword'] != $_POST['retypepassword'])
        {
           $error = 'Your New Password and retype password Do not match!';
    
        }
        else{

            $newname = $_POST['newname'];
            $newpassword = $_POST['newpassword'];
            $update = "UPDATE `admin` SET `name`='$newname',`password`='$newpassword' WHERE id = 1";
            $result = mysqli_query($con,$update);
            if(!$result)
            $error = 'error';
            else
            $error = 'Your new name and password have change!'.'<a href = "adminlogin.php">Try With new Name & Password</a>';
           
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
                <div id = "changepassword">
                    <h1>Log In To The Site</h1>
                    <hr />
                    <form method = "post" action = "changeadmin.php">
				    <input type="text" name="oldname" placeholder="Your Current Name" maxlength="30" max="30"><label><?php echo " "."Your Current Name";?></label><br><hr />
				    <input type="password" name="oldpass" placeholder="Your Current Password" maxlength="20" max="30"  id="password"><label><?php echo " "."You Current Password";?></label><br><hr />
                    <input type="text" name="newname" placeholder="Your Name" maxlength="30" max="30"><label><?php echo " "."Your New Name";?></label><br><hr />
                    <input type="password" name="newpassword" placeholder="Your New Password" maxlength="30" max="30" required><label><?php echo " "."Your New Password";?></label><br><hr />
                    <input type="password" name="retypepassword" placeholder="Retype Password" maxlength="30" max="30" required><label><?php echo " "."Retype Password";?></label><br><hr />
                    <input type="submit" name="Savechanges" class="login loginmodal-submit" value="Save Changes">
                    <input type="reset"name ="Clear" value="Clear">
                    <a href="adminlogin.php"><abbr title="If you don't want to make changes,Back to Home">Back To Home</abbr></a>
                 
					    <hr />
                     <div id= "error"><h3><?php echo $error; ?></h3> 
				  </form>
                </div>
        </div>     
</body>
</html>