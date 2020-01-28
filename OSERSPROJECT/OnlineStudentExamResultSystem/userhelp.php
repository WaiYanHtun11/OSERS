<?php  
session_start();
function direct($file){
    header("location:".$file);
}
if(isset($_POST['back']))
    direct('userCatagory.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>                                        
<title>Online Student Exam Result System</title> 
<link rel = "stylesheet" href="mypage.css">   
</head>
<body>
        <div id = "wrapper">
        <div id = "helpbody">
        <h1 style = "text-align:center">Welcom From Our System</h2>
        <hr/>
        <div id = "helpb">
        <p>
            From Our System,We offer you five functionality!<br>
            <ul style = "circle">
                <li>See Comming Up News Or Events</li>
                <li>See Result</li>
                <li>Check Your WorkSpace</li>
                <li>Learn Credit System</li>
                <li>Learn Special Semester</li>
            </ul>    
            -------------------------------------------------------
            <br>
            <dl>
                <dt><h2>See Comming Up News Or Events</h2></dt>
                    <dd> This is the place where you can check up the information about your Result Date!<br>(Including the date time when will the result be shown or when will the Special Semester Exam have to be taken)</dd></dt>
                <dt><h2>See Result</h2></dt>
                    <dd>This is the place where you can check up the Exam Result throughout the third year!<br>
                    You can also check the subjects codes and Letter Grade Definition  about the result!<br>
                    And also you can download some old result file if you wanna check up you old result!<br>
                    In this field,You have to make some action so that you can see the information fully!
                </dd>
                <dt><h2>Check Your WorkSpace</h2></dt>
                    <dd>This is the place where you can check up your result private only!<br>
                        You Will find you Exam Result correspoinding yourself!You can see your <br>
                        total result of Two Semester of Acadamester Year and you can also check up <br>
                        your CGPA;
                    </dd>
                <dt><h2>Learn Credit System</h2></dt>
                    <dd>This is the place where you can read some information about Credit System!Like-<br>
                        Whis is the credit system?<br>
                        How is it work?<br>
                        Why Credit System?<br>
                    </dd>  
                <dt><h2>Learn Special Semester</h2></dt>
                    <dd>This is the last functionality we apply for you!In this section,<br>
                    You can read someinformation about Special Semester Examination!Like<br>
                    What is Special Semester?<br>
                    Who shold take Special Semster?<br>
                    In which condition should Special Semester  exam be taken?<br>
                <dd>
                    <hr/>
                    <h2>Thank You For Reading!<?php echo ' '.$_SESSION["user"].' ';?></h2>
                    <form action = "userhelp.php" method = "post">
                        <input type = "submit" name = "back" value ="Back To Previous Page">
                    </form>

        </div>
</div>
    
        </div>  
</body>
</html>