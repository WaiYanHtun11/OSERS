<?php
session_start();
?>
<?php 
$noti = '';
    $con = mysqli_connect("localhost","root","","osers");
    if(!$con){
        die('Could not connect:'.mysqli_error());
    }
    mysqli_select_db($con,"osers");
    if(isset($_POST['upload'])){
        $title = $_POST['Title'];
        $body = $_POST['Body'];
        $date = date('Y:m:d');  
        if(empty($title) || empty($body)){

            $noti = 'You Cannot Upload An Empty Title or Body of Your Information';
        }
        else{
            
           
            $query = "INSERT INTO `post`(`ID`, `Title`, `Body`,`Date`) VALUES ('','$title','$body','$date')";
             $ec = mysqli_query($con,$query);
        if(!$ec){
                echo 'connection error';
            }
            else
             $noti = 'Your Information Have Posted';
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
            <div id="welcomeuser"><h2 style ="background-color:rgba(192, 204, 219, 0.30);"><?php echo $_SESSION["an"].': ';?>
            <a href = "logout.php" style="color:black;">Log Out!</a>
            </h2> </div>           
            </div>
<div id ="lf_rt">
            <div id = "leftcolumn">
                <div id = "free"></div>
		<div id ="catagory">
            <h2 align="center">CATAGORIES</h2><hr/>
                <ul type = "circle">
                <li><a href="uploadInfo.php"><div id = "link">Post Information</div></a></li>
                <li><a href="uploadResult.php"><div id = "link">Upload Result</div></a></li>
               <li><a href="SemesterExam.php"><div id = "link">See Semester_Exam List</div></a></li>
                </ul>
                <hr/>
		</div>
            </div>
            <div id = "rightcolumn">
            <div id = "free"></div>
            <div id = "uploadinfopane">
                 <form action = "uploadinfo.php" method = "post">
                 <h2>Enter Your Title</h2>
                    <textarea name="Title"  cols="50" rows="1"></textarea>
                    <h2>Enter Your Body Setence</h2>
                    <textarea name="Body"  cols="50" rows="3"></textarea>
                    <hr/>
					<input type="submit" name="upload" class="login loginmodal-submit" value="upload your information">
					<input type="reset"name ="Clear" value="Clear">
                    <hr />
                    <h3><?php echo $noti ; ?></h3>
 </form></div>
            </div>
</div>
                  <div id = "footer">
                  <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY(UCSM)</strong></h2>
            </div>
        </div>
         
</body>
</html>
