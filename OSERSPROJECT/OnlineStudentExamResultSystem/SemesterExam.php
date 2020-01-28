<?php
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
mysqli_select_db($con,"osers");
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
            <div id = "specialadminheading"><h1 >The List of Students Sumitted to Special Semester Exam</h1></div>
            <div id = "paneforstable">
            <table border="1" cellspacing="0" align = "center" width="95%" cellpadding = "10" style = "background-color:white">
            <tr><th style = "font-size:25;">ID</th><th style = "font-size:25">NAME</th><th style = "font-size:25">YEAR</th><th style = "font-size:25">MAJOR</th><th style = "font-size:25">SUBJECTS</th></tr>
            <?php 
            $result = mysqli_query($con,"SELECT * FROM semesterexam");
            while($row = mysqli_fetch_array($result)){
                echo '<tr style= "font-size:20">'.'<td>'.$row['ID'].'</td>'.'<td>'.$row['NAME'].'</td>'.'<td>'.$row['YEAR'].'</td>'.'<td>'.$row['Department'].'</td>'.'<td>'.$row['Subjects'].'</td>'.'</tr>';
            }
            ?>
            </table>

            </div>
            </div>
</div>
                  <div id = "footer">
                  <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY(UCSM)</strong></h2>
            </div>
        </div>
         
</body>
</html>
