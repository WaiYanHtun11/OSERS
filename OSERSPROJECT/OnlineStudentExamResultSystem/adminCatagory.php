<?php
session_start();
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
            <div id = "welcome"></div>
            
                <div id = "bgcolorhp">
                <div id ="help">Recommand for You!<br><a href ="adminhelp.php">Read About The System!</a></div>
                <img src="adminbg.jpg" border="0" width="600" height="205" alt="hpbg.jpg (28,836 bytes)">
                </div>
            </div>
</div>
                  <div id = "footer">
                  <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY(UCSM)</strong></h2>
            </div>
        </div>
         
</body>
</html>
