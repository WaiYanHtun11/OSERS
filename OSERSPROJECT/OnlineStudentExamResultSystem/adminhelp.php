<?php  
session_start();
function direct($file){
    header("location:".$file);
}
if(isset($_POST['aback']))
    direct('adminCatagory.php');
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
            As you are the admin of our System,We offer you three functionality!<br>
            <ul style = "circle">
    
                <li>Upload Information</li>
                <li>Upload Result</li>
                <li>See Special Exam List</li>

            </ul>    
            ------------------------------------------------------------------------
            <br>

            <dl>
                <dt><h2>Upload Information</h2></dt>
                    <dd> This is the place where Where can give the information about the Exam Result Date annoumount<br>
                        also announcing the date for Special Semster Examination!
                        </dd></dt>
                <dt><h2>Upload Result</h2></dt>
                    <dd>This is the place where you can upload the result files with "microsoft word document or microsoft excel ".<br>
                        The result file include all of the files corresponding with each year of the students.Further more!<br>
                        after the Special Examination,You also have to upload the result file about the Special Semester Examination.
                        <h2>Setting The Result Time to  Be shown </h2>
                        <p>This is the place where you can set the time for the result!All the result will be shown according to your time that you have set.</p>
                        <h2>Three Format Setting Result Time</h3>
                        <ul style = "circle">
                        <li>Setting For Semester_I</li>
                        <li>Setting For Semester_II</li>
                        <li>Setting For Specail_Semester</li>
                        </ul>
                </dd>
                <dt><h2>See Special Exam List</h2></dt>
                    <dd>This is the place where you check up the lists of the Students who sumitted to take the Special Semester Examination.
                    </dd>
                
                    <hr/>
                    <h2>Thank You For Reading!<?php echo ' '.$_SESSION["an"].' ';?></h2>
                    <form action = "adminhelp.php" method = "post">
                        <input type = "submit" name = "aback" value ="Back To Previous Page">
                    </form>

        </div>
</div>
    
        </div>  
</body>
</html>