
<?php
session_start();
function direct($file){
    header("location:".$file);
}
$error = '';
$YEAR ='';
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
mysqli_select_db($con,"osers");
if(isset($_POST['login'])){
    $USERNAME = $_POST['user'];
    $USERID = $_POST['pass']; 
 $YEAR = $_POST['year'];
        if(empty($USERNAME)|| empty($USERID) || empty($_POST['year'])){
                $error = 'You Forget Some Field to fill!Recheck it!';
        }
        else{

             if($_POST['year'] == 'First_Year'){
                $sql = "SELECT * FROM `student1` WHERE `St_ID` = '$USERID' AND `St_name` = '$USERNAME'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                if(!($row)){
                    $error = 'You are not in our record! or Invalid User';
                }
                else{
                        
                            $_SESSION["user"] = $USERNAME;
                            $_SESSION["pass"] = $USERID;
                            $_SESSION["year"] = $YEAR;
                            direct('userCatagory.php');
                    
                }
            }
                elseif($_POST['year'] == 'Second_Year'){
                $sql = "SELECT * FROM `student2` WHERE `St_ID` = '$USERID' AND `St_name` = '$USERNAME'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                if(!($row)){
                    $error = 'You are not in our record! or Invalid User';
                }
                else{
                    $_SESSION["user"] = $USERNAME;
                    $_SESSION["pass"] = $USERID;
                           
                            $_SESSION["year"] = $_POST['year'];
                            direct('userCatagory.php');
            }
            }
            else{
                $sql = "SELECT * FROM `student3` WHERE `St_ID` = '$USERID' AND `St_name` = '$USERNAME'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                if(!($row)){
                    $error = 'You are not in our record! or Invalid User';
                }
                else{

                            $_SESSION["user"] = $USERNAME;
                            $_SESSION["pass"] = $USERID;
                            
                            $_SESSION["year"] = $YEAR;

                            direct('userCatagory.php');
                }
            }
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
                 <form method = "post" action = "userlogin.php">
				<input type="text" name="user" placeholder="Username" maxlength="30" max="30">:Your Name<br><hr />
				<input type="password" name="pass" placeholder="ID like 0000" maxlength="4" max="30" name="password" id="password">:Your ID<br><hr />
					<input type="Radio" name="year" value="First_Year" checked>first year: 
					<input type="Radio" name="year" value = "Second_Year" >second year: 
					<input type="Radio" name="year" value="Third_Year" >third year: <hr />
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
					<input type="reset"name ="Clear" value="Clear">
					<hr />
                    <div id= "error"><h3 style="background-color:rgba(192, 204, 219, 0.30);"><?php echo $error; ?></h3> 
                </div>
 </form></div>
            </div>
</div>
                  <div id = "footer">
            <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY</strong></h2>
            </div>
        </div>   
</body>
</html>