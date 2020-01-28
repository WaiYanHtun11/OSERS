<?php
session_start();
$PostTitle = '';
$PostBody = '';
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
            <div id="welcomeuser"><h2 style ="background-color:rgba(192, 204, 219, 0.30);"><?php echo $_SESSION["user"].' ';?>
            <a href = "logout.php" style="color:black;">Log Out!</a>
            </h2> </div>         
            </div>
<div id ="lf_rt">
            <div id = "leftcolumn">
                <div id = "userfree"></div>
		<div id ="catagory">
            <h2 align="center">CATAGORIES</h2><hr/>
                <ul type = "circle">
                <li><a href="Information.php"><div id = "link">See Comming News</div></a></li>
                <li><a href="Result.php"><div id = "link">See Result</div></a></li>
               <li><a href="Workspace.php"><div id = "link">Check Your WorkSpace</div></a></li>
               <li><a href="credit.php"><div id = "link">Learn Credit System</div></a></li>
               <li><a href="SpecialExam.php"><div id = "link">Learn Special Exam</div></a></li>
                </ul>
                <hr/>
		</div>
            </div>
            <div id = "rightcolumn">
           <div id="heading">
           <div id = "heading"> <h2 style = "text-align:center;">The Comming Up News!</h2></div>
           </div><div id = "infobody">
           <?php 
           $result = mysqli_query($con,"SELECT * FROM post");
while($row = mysqli_fetch_array($result)){
    $PostTitle = $row['Title'];
    $PostBody = $row['Body'];
    $date = $row['Date'];
   
           ?>
           <div id = "postheader"><h2 style = "text-align:center;"><?php echo $PostTitle; ?></h2></div>
           <div id = "panebody"><p style = "font-size: 20;"><?php echo "   ".$PostBody; ?></p>
           <strong>Posted@<?php echo $date;?></strong>
           </div>
           <hr/>
<?php } ?>

    </div>
</div>
                  <div id = "footer">
                  <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY(UCSM)</strong></h2>
            </div>
        </div>
         
</body>
</html>
