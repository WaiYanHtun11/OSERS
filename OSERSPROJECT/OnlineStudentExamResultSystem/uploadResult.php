<?php
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
mysqli_select_db($con,"osers");
$noti = '';
$datenoti = '';
date_default_timezone_set("Asia/Yangon");
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
            <div id = "welcome"><br><h2 style = "text-align:center">Upload Word/Excels/Pdf/Zip file types</h2></div>
            <?php 
            $filename = '';
            $uploadok = 1;
            if(isset($_POST['upload'])){
                $filename = $_POST['filename'];
                if(empty($filename)){
                    $noti = 'You Havn\'t Set Any Suitable Name for the file';
                }
                else{
                    
                $name = $_FILES['resultfile']['name'];
                $fileuptype = $_FILES['resultfile']['type'];
                $target = "./uploads/".$name;
                $FileType = pathinfo($name,PATHINFO_EXTENSION);
                $allowed = array('zip','pdf','docx','xlsx');
                if(!in_array($FileType,$allowed)){
                    $noti =   "zip/pdf/docx/xlsh file types only allowed ";
                $uploadok = 0;
                }
                elseif(file_exists($target)){
                   $noti =  "sorry file already exist!";
                   $uploadok = 0;
                }
                else{
                    if($uploadok == 1){
                $sql = "INSERT INTO `resultblob`(`ID`,`fname`,`name`) VALUES ('','$filename','$name')";
                $result = mysqli_query($con,$sql);
                move_uploaded_file($_FILES['resultfile']['tmp_name'],$target);
                if($result){
                    $noti = 'Your Result File Have Uploaded!';
                }
            }
            }
            }
                   
            }
            
            ?>
            <div id = "fileuploadpane">
            <form method = "post" action = "uploadResult.php" enctype = "multipart/form-data">
            <p style = "text-align:center"><strong>Text Your Suitable File Name</strong></p><hr/>
            <div id = "alignmentforuploadtext"><?php echo ' '.' '.' ';?><input type = "text" name = "filename"  cols = "20" placeholder = "Suitable File Name"/></div><hr/>
            <div id = "padforbrowse"><?php echo ' '.' '.' ';?><input type = "file" name = "resultfile"/></div>
            <hr/>
            <div id="btuploadpane"><?php echo ' ';?><button name = "upload" align = "center">Upload </button></div>
        
            <hr/>
           
            <?php  echo '<h3>'.$noti.'</h3>';?>
           
            </div>

            <?php 
            if(isset($_POST["change"])){
                if(empty($_POST['date']) || empty($_POST['time']) ){
                        $datenoti = 'You forget something to fill or Date_time type!like (2018-1-1  6-30 AM)';
                }
                else{
                    if($_POST['sem']== "Semester_I" ){
                        $exactdate = $_POST['date'];
                        $exactTime = $_POST['dtime'].' '.$_POST['time'];
                        $update = "UPDATE `resulttime` SET `Date`='$exactdate',`Time`= '$exactTime' WHERE id = '1'";
                        $result = mysqli_query($con,$update);
                        if(!$result)
                        $datenoti = "error";
                        else
                     $datenoti = 'Result Date for '.$_POST['sem'].' has set to '.$exactdate.' '.$exactTime;

                    }
                    elseif($_POST['sem']== "Semester_II" ){
                        $exactdate = $_POST['date'];
                        $exactTime = $_POST['dtime'].' '.$_POST['time'];
                        $update = "UPDATE `resulttime` SET `Date`='$exactdate',`Time`= '$exactTime' WHERE id = '2'";
                        $result = mysqli_query($con,$update);
                        if(!$result){
                        $datenoti = "error";}
                        else{
                     $datenoti = 'Result Date for '.$_POST['sem'].' has set to '.$exactdate.' '.$exactTime;}
    

                    }
                    else{
                        $exactdate = $_POST['date'];
                        $exactTime = $_POST['dtime'].' '.$_POST['time'];
                        $update = "UPDATE `resulttime` SET `Date`='$exactdate',`Time`= '$exactTime' WHERE id = '3'";
                        $result = mysqli_query($con,$update);
                        if(!$result){
                        $datenoti = "error";}
                        else{
                     $datenoti = 'Result Date for '.$_POST['sem'].' has set to '.$exactdate.' '.$exactTime;}
    


                    }

                }
            }
            
            
            ?>
            <div id = "setresultdate">
            <strong>Set Result Show Date:</strong>
            <select name = "sem">
            <option selected = "selected">Semester_I</option>
            <option>Semester_II</option>
            <option>Special_Semester</option>
            </select>
            Date:<input type = "date" name = "date" id = "mydate" placeholder = "YYYY-MM-DD" maxlength="10" date = "YYYY-MM-DD"/>
            Time:<input type = "time" name = "dtime" maxlength="5" placeholder = "hh-mm"/>
            <select name = "time">
            <option selected = "selected">AM</option>
            <option>PM</option>
            </select>
            <input type = "submit" value = "Set Date!" name = "change"/><br>
            <p style = "text-align:center"><strong><?php echo $datenoti;?></strong></p>
            </form>
            </div>
            

        </div>
            
            </div>
</div>
                  <div id = "footer">
                  <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY(UCSM)</strong></h2>
            </div>
        </div>
         
</body>
</html>
