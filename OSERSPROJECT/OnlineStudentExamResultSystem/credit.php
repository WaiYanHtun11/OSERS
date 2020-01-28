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
            <div id="welcomeuser"><h2 style ="background-color:rgba(192, 204, 219, 0.30);"><?php echo $_SESSION["user"].': ';?>
            <a href = "logout.php" style="color:black;">Log Out!</a>
            </h2> </div> 
            </div>
<div id ="lf_rt">
            <div id = "leftcolumn">
                <div id = "userfree"></div>
		<div id ="catagory">
            <h2 align="center">CATAGORIES</h2><hr/>
                <ul type = "circle">
                <li><a href="seenew.php"><div id = "link">See Comming News</div></a></li>
                <li><a href="Result.php"><div id = "link">See Result</div></a></li>
               <li><a href="Workspace.php"><div id = "link">Check Your WorkSpace</div></a></li>
               <li><a href="credit.php"><div id = "link">Learn Credit System</div></a></li>
               <li><a href="SpecialExam.php"><div id = "link">Learn Special Exam</div></a></li>
                </ul>
                <hr/>
		</div>
            </div>
            <div id = "rightcolumn">
            <div id = "topic"><h1 style = "text-align:center;"> The Credit System</h1></div>
            <div id = "BodyInfo">
            <p>
            -Credit system is the system that calculates the students' results with the "letter grade" and "GPA".<br>
		-Credit system is definitely based on each semester.<br>
		-GPA should have 2.0 at least or greater than 2.0.<br>
		-Each subject has each credit point.<br>
		-The failed grade is allowed one "F" and one "D" only for one Semester.<br>
		-Student can take at least 4 subs, at most 8 subs for each semester according to the subjects of that current academic year.<br>
		-The student has to make the course registering before joining the course.<br>
		-<h4>Comulative GPA(CGBA)=summation of all GPA / summation of all credit point.</h4></br>
            <hr/>
           <h2 style = "background-color:white"> What is credit system?</h2>
“CREDIT SYSTEM” is the system now using at many high-tech universities. In a university or college that using “CREDIT SYSTEM”, students generally receive ‘GPA’ (Grade Point Average) based on 3 main facts : students’ results of semester end test and practical test , semester credit hour that is the number of each student’s class attendance per semester in class, and the grade of assignment each student took. According to this system, Students can take at least 4 subjects for each semester and they can also take more than 4 but at most 8 subjects per academic year. Students have to make register which subjects they will take in each semester. Each subject has its own credit point to calculate each student’s GPA. Credit System, worldwide accepted academic system, has greater flexibility compared with the conventional way of teaching and learning process. In an ideal of credit system, the student has the opportunity to choose number of courses offered in a semester. To bring  in  the  desired  uniformity, in grading  system  and method  for computing  the cumulative grade point average (CGPA) based on the performance of students in the examinations.
<h2 style = "background-color:white">What is GPA (Grade Point Average)?</h2>
A student’s grade point average (GPA) is a simple numerical index which summaries academic performance in a semester. It includes all of credit unit attempts within a semester; each semester will have its own GPA and the student can get two GPAs per academic year for two semesters.
GPA is calculated by using these values with the formula as follows:
 <h2>GPA="letter grade*credit point"</h2>
In credit system, a student will take two semesters for one academic year and the CGPA (Cumulative Grade Points Average) can be calculated of two GPAs. A student must have the value of CGPA at least 2.0 to attend next academic year. If not, the student will have to take Special Semester for each subject to get higher GPA of they failed subject.
<h2 style = "background-color:white">What is credit point (unit point)?</h2>
Each subject has its own credit point and the GPA can be calculated according to this points. . If the student receive “F” in letter grade of GPA, his credit point of this subject will become 0(zero).Credit points are used to measure your course study load. A standard full-time study load normally consists of 48 credit points in one academic year.

            </div>

           </div>
</div>
                  <div id = "footer">
                  <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,MANDALAY(UCSM)</strong></h2>
            </div>
        </div>
         
</body>
</html>
