<?php
session_start();
?>
<?php 
$ID = $_SESSION["pass"];
$Name = $_SESSION["user"];
$departmentId ='';
$Subs = '';
$noti = 'Hello Read The Article Below!Hope This is helpful to you in Making Decision Whether to Register for Special Examination!';
$year = $_SESSION["year"];
$confirm = true;
$submitted = false;
$s01= '';
$s02= '';
$s03= '';
$s04= '';
$s05= '';
$s06= '';
$s11= '';
$s12= '';
$s13= '';
$s14= '';
$s15= '';
$s16= '';
    $con = mysqli_connect("localhost","root","","osers");
    if(!$con){
        die('Could not connect:'.mysqli_error());
    }
    mysqli_select_db($con,"osers");
    if($year == 'First_Year'){
        $sql = "SELECT `deptID` FROM `student1` WHERE `St_ID` = '$ID'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      if($row){
       
            $departmentId =$row['deptID'];
    }
    }
    elseif($year == 'Second_Year'){
        $sql = "SELECT `deptID` FROM `student2` WHERE St_ID = $ID";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      if($row){
       
            $departmentId = $row["deptID"];
        
    }
    }
    else{
      $sql = "SELECT `deptID` FROM `student3` WHERE St_ID = $ID";
      $result = mysqli_query($con,$sql);
        while( $row = mysqli_fetch_array($result))
              $departmentId = $row["deptID"];
        
    }
   
    /*
    Checking the Special Semester Submition list 
    */
    
    
    if(isset($_POST['submit'])){
        $result = mysqli_query($con,"SELECT * FROM resulttime Where id = '2'");
        while($row = mysqli_fetch_array($result)){
            $date = $row['Date'];
          
            $time = date('H-i-sa',strtotime($row['Time']));
            $realtime = $date.''.$time;
        }

        if($date < date('Y-m-d h-i-sa')){
      
                  if(empty($_POST['sublist']))
                  {
                      $noti = "You haven't make any choice!Please Make Sure Your Choice because You can only submit one time";
                  }
                  else{

                   
                             $sql = "SELECT * FROM `semesterexam`";
                            $res = mysqli_query($con,$sql);
                             while($ec = mysqli_fetch_array($res)){
                              if($ID == $ec['ID']){
                                    $confirm = false;
                                    $noti = 'You Have Submitted Before';
                                    break;
                                
                                }
                            }
                            if($confirm){
                                   
                                     $count = count($_POST['sublist']);
                                     
                                        if($year == 'First_Year' && $departmentId == 'CST'){
                                            $insertok = true;
                                           
                                        $sql1 = "SELECT * FROM `first_year_rt` WHERE `St_ID` = '$ID'";
                                        $res1 = mysqli_query($con,$sql1);
                                        while($row= mysqli_fetch_array($res1)){
                                            $s01 = $row['M-100'];
                                            $s02 = $row['E-100'];
                                            $s03 = $row['P-100'];
                                            $s04 = $row['CST-101'];
                                            $s05 = $row['CST-102'];
                                            $s06 = $row['CST-103'];
                                        }
                                        $sql1 = "SELECT * FROM `first_year_ii` WHERE `St_ID` = '$ID'";
                                        $res1 = mysqli_query($con,$sql1);
                                        while($row= mysqli_fetch_array($res1)){
                                            $s11 = $row['M-1002'];
                                            $s12 = $row['E-1002'];
                                            $s13 = $row['P-1002'];
                                            $s14 = $row['CST-1012'];
                                            $s15 = $row['CST-1022'];
                                            $s16 = $row['CST-1032'];
                                        }
                                        foreach($_POST['sublist'] as $selected){
                                            $submitted = false;
                                            switch($selected){
                                                case 'M-1001':if($s01 == 'D' || $s01 == 'F'){
                                                    $submitted = true;
                                                    
                                                   
                                                }break;
                                                case 'E-1001':if($s02 == 'D' || $s02 == 'F'){
                                                    $submitted = true; 
                                                }break;
                                                case 'P-1001':if($s03 == 'D' || $s03 == 'F'){
                                                    $submitted = true;
                                                }
                                                case '1011':if($s04 == 'D' || $s04 == 'F'){
                                                    $submitted = true;break;
                                                }break;
                                                case '1021':if($s05 == 'D' || $s05 == 'F'){
                                                    $submitted = true;
                                                }break;
                                                case '1031':if($s06 == 'D' || $s06 == 'F'){
                                                    $submitted = true;
                                                }break;
                                                case 'M-1002':if($s11 == 'D' || $s11 == 'F'){
                                                    $submitted = true;
                                                   
                                                }break;
                                                case 'E-1002':if($s12 == 'D' || $s12 == 'F'){
                                                    $submitted = true;
                                                } break;
                                                case 'P-1002':if($s13 == 'D' || $s13 == 'F'){
                                                    $submitted = true;
                                                }break;
                                                case '1012':if($s14 == 'D' || $s14 == 'F'){
                                                    $submitted = true;
                                                }break;
                                                case '1022':if($s15 == 'D' || $s15 == 'F'){
                                                    $submitted = true;
                                                }break;
                                                case '1032':if($s16 == 'D' || $s16 == 'F'){
                                                    $submitted = true;
                                                }break;
                                                default:break;

                                            }
                                            if($submitted){
                                                $Subs = $Subs.$selected.'/';
                                                $submitted = false;
                                                }
                                                
                                               else{
                                                   $insertok = false;
                                               }


                                            }


                                        }elseif($year == 'Second_Year'){
                                            $submitted = false;
                                            $insertok = true;
                                            $sql1 = "SELECT * FROM `second_year_rt` WHERE `St_ID` = '$ID'";
                                            $res1 = mysqli_query($con,$sql1);
                                            while($row= mysqli_fetch_array($res1)){
                                                $s01 = $row['E-200'];
                                                $s02 = $row['CST-201'];
                                                $s03 = $row['CST-202'];
                                                $s04 = $row['CST-203'];
                                                $s05 = $row['CST-204'];
                                                $s06 = $row['CST-205'];
                                            }
                                            $sql1 = "SELECT * FROM `second_year_ii` WHERE `St_ID` = '$ID'";
                                            $res1 = mysqli_query($con,$sql1);
                                            while($row= mysqli_fetch_array($res1)){
                                                $s11 = $row['E-2002'];
                                                $s12 = $row['CST-2012'];
                                                $s13 = $row['CST-2022'];
                                                $s14 = $row['CST-2032'];
                                                $s15 = $row['CST-2042'];
                                                $s16 = $row['CST-2052'];
                                            }
                                            foreach($_POST['sublist'] as $selected){
                                               
                                                switch($selected){
                                                    case 'E-2001':if($s01 == 'D' || $s01 == 'F'){
                                                        $submitted = true;
                                                       
                                                    }break;
                                                    case '2011':if($s02 == 'D' || $s02 == 'F'){
                                                        $submitted = true; 
                                                    }break;
                                                    case '2021':if($s03 == 'D' || $s03 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2031':if($s04 == 'D' || $s04 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2041':if($s05 == 'D' || $s05 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2051':if($s06 == 'D' || $s06 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case 'E-2002':if($s11 == 'D' || $s11 == 'F'){
                                                        $submitted = true;
                                                       
                                                    }break;
                                                    case '2012':if($s13 == 'D' || $s13 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2022':if($s14 == 'D' || $s14 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2032':if($s15 == 'D' || $s15 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2042':if($s16 == 'D' || $s16 == 'F'){
                                                        $submitted = true;
                                                    }break;
                                                    case '2052':if($s12 == 'D' || $s12 == 'F'){
                                                        $submitted = true; 
                                                    }break;
                                                    default:break;
    
                                                }
                                                if($submitted){
                                                    $Subs = $Subs.$selected.'/';
                                            
                                                    $submitted = false;
                                                    }
                                                    
                                                   else{
                                                       $insertok = false;
                                                   }
    
    
    
    
                                            }
                                        }else{
                                                $insertok = true;
                                                $submitted = false;
                                                $sql1 = "SELECT * FROM `third_year_rt` WHERE `St_ID` = '$ID'";
                                                $res1 = mysqli_query($con,$sql1);
                                                while($row= mysqli_fetch_array($res1)){
                                                    $s01 = $row['E-300'];
                                                    $s02 = $row['CST-301'];
                                                    $s03 = $row['CST-302'];
                                                    $s04 = $row['CST-303'];
                                                    $s05 = $row['CST-304'];
                                                    $s06 = $row['CST-305'];
                                                }
                                                $sql1 = "SELECT * FROM `third_year_ii` WHERE `St_ID` = '$ID'";
                                                $res1 = mysqli_query($con,$sql1);
                                                while($row= mysqli_fetch_array($res1)){
                                                    $s11 = $row['E-3002'];
                                                    $s12 = $row['CST-3012'];
                                                    $s13 = $row['CST-3022'];
                                                    $s14 = $row['CST-3032'];
                                                    $s15 = $row['CST-3042'];
                                                    $s16 = $row['CST-3052'];
                                                }
                                                foreach($_POST['sublist'] as $selected){
                                                   
                                                    switch($selected){
                                                        case 'E-3001':if($s01 == 'D' || $s01 == 'F'){
                                                            $submitted = true;
                                                           
                                                        }break;
                                                        case '3011':if($s02 == 'D' || $s02 == 'F'){
                                                            $submitted = true; 
                                                        }break;
                                                        case '3021':if($s03 == 'D' || $s03 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3031':if($s04 == 'D' || $s04 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3041':if($s05 == 'D' || $s05 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3051':if($s06 == 'D' || $s06 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case 'E-3002':if($s11 == 'D' || $s11 == 'F'){
                                                            $submitted = true;
                                                           
                                                        }break;
                                                        case '3012':if($s12 == 'D' || $s12 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3022':if($s13 == 'D' || $s13 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3032':if($s14 == 'D' || $s14 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3042':if($s15 == 'D' || $s15 == 'F'){
                                                            $submitted = true;
                                                        }break;
                                                        case '3052':if($s16 == 'D' || $s16 == 'F'){
                                                            $submitted = true; 
                                                        }break;
                                                        default:break;
        
                                                    }
                                                    if($submitted){
                                                        $Subs = $Subs.$selected.'/';
                                                
                                                        $submitted = false;
                                                        }
                                                        
                                                       else{
                                                           $insertok = false;
                                                       }
                                                       }
        
        



                                            }
                                            
                                        

                                        if($insertok){
                                        $query = " INSERT INTO `semesterexam`(`ID`, `NAME`, `YEAR`, `Department`, `Subjects`) VALUES ('$ID','$Name','$year','$departmentId','$Subs') ";
                                        $ec = mysqli_query($con,$query);
                                        if(!$ec){
                                         echo 'connection error';
                                         }
                                         else
                                         $noti =  'Your  Have Submitted '.$count.' subjects('.$Subs.')for Special Exam !Check further information soon at see comming upnew!';
        
                                        }else{
                                            $noti = "You Have Choosed The Subjects That is not D or F & You Cannot Submit!plz Try Again";
                                        }
                                     }

                              
                                }
                    
      
      
                  }else{
                      $noti = 'Currently You Can\'t Submit For the Special Exam!<br>Please Wait until Semester_II Result is shown';
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
            <div id = "topic"><h1 style = "text-align:center;"> The Special Semester Exam</h1>
            
        </div>
       
            <div id = "BodyInfo">
            <?php echo  '<p id = "serror">'.$noti.'</p>';?>
           
          
		<p>.The examination that is taken to save the failed subject with letter grade "D" or "F" & also to make a better GPA.<br>
		.If the grade is "F" , the credit point on this subject is zero.<br>
	      .GPA="letter grade*credit point" of each subject.<br>
		.The maximum chance for taking special semester is three times for one failed subject.<br>
            .There is no lecture for the special semester & Studying yourself.<br></p>
            <hr/>
            <h2 style = "background-color:white">What is Special Semester?</h2>
It’s an exam for the students whose CGPA doesn’t have 2.0 for academic year. Those students must take the special semester exam .Then , whose letter grade in GPA will got “D” or “F” can also take special exam. But the student’s GPA doesn’t have over 2 , he totally must take this special semester. If a student will fail again in special semester, he has no chance to attend next academic and he must fail that academic year. The maximum chance for taking special semester is three times for one fail .But unfortunately, there is no lecture for special semester and a student must try himself to take it. As there is 12 subjects in each academic year, special semester will take about twelve days to take and the students who take the special exam only have to take the exam date that is defined for the subjects he register  to answer.
           <hr/>
            <h2 style = "text-align:center">Would You Like To Take The Special Semester Exam?</h2><hr/>
            <h4 style = "text-align:center">Submit Special Semester Exam</h4>
            <div id = "SExambox">
                  <form action = "SpecialExam.php" method = "post">
                    <h5 style = "text-align:center;">Subjects Of Acadamic Years</h5>
                   <?php if($_SESSION["year"] == 'First_Year'){?>
                   <table border = "0" cellspacing = "0" cellpadding = "10" align = "center">
                    <tr><td><input type ="checkbox" name = "sublist[]" value="M-1001">M-1001</td><td> <input type ="checkbox" name = "sublist[]" value="M-1002">M-1002</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="E-1001">E-1001</td><td> <input type ="checkbox" name = "sublist[]" value="E-1002">E-1002</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="P-1001">P-1001</td><td> <input type ="checkbox" name = "sublist[]" value="P-1002">P-1002</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="1011">1011</td><td> <input type ="checkbox" name = "sublist[]" value="1012">1012</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="1021">1021</td><td> <input type ="checkbox" name = "sublist[]" value="1022">1022</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="1031">1031</td><td> <input type ="checkbox" name = "sublist[]" value="1032">1032</td></tr>
                    </table>
                  <?php  }elseif($_SESSION["year"] == 'Second_Year'){ ?>
                    <table border = "0" cellspacing = "0" align = "center" cellpadding = "10">
                    <tr><td><input type ="checkbox" name = "sublist[]" value="E-2001">E-2001</td><td> <input type ="checkbox" name = "E-2002" value="E-2002">E-2002</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="2011">2011</td><td> <input type ="checkbox" name = "sublist[]" value="2012">2012</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="2021">2021</td><td> <input type ="checkbox" name = "sublist[]" value="2022">2022</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="2031">2031</td><td> <input type ="checkbox" name = "sublist[]" value="2032">2032</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="2041">2041</td><td> <input type ="checkbox" name = "sublist[]" value="2042">2042</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="2051">2051</td><td> <input type ="checkbox" name = "sublist[]" value="2052">2052</td></tr>
                    </table>
                 <?php }else{?>
                    <table border = "0" cellspacing = "0" align = "center" cellpadding = "10">
                    <tr><td><input type ="checkbox" name = "sublist[]" value="E-3001">E-3001</td><td> <input type ="checkbox" name = "E-3002" value="E-3002">E-3002</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="3011">3011</td><td> <input type ="checkbox" name = "sublist[]" value="3012">3012</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="3021">3021</td><td> <input type ="checkbox" name = "sublist[]" value="3022">3022</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="3031">3031</td><td> <input type ="checkbox" name = "sublist[]" value="3032">3032</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="3041">3041</td><td> <input type ="checkbox" name = "sublist[]" value="3042">3042</td></tr>
                    <tr><td><input type ="checkbox" name = "sublist[]" value="3051">3051</td><td> <input type ="checkbox" name = "sublist[]" value="3052">3052</td></tr>
                    </table>
               <?php  } ?>
                  <hr/>
                  <div id ="hello"><?php echo ' '.' '.' '.'';?><?php echo ' '.' '.' '.'';?>
                  <input type = "submit" name ="submit" value = "Submit Subjects" onclick = "return confirm('Are you sure you want to submit (<?php  echo $Subs; ?>) ?');">
                  <input type = "reset"  name = "clear" value = "Clear">
                  
                  </div>
                 
</form>

            </div>


            <hr/>
            </div>

           </div>
</div>
                  <div id = "footer">
            <h2 id = "fh"><strong>UNIVERSITY OF COMPUTER STUDIES,M&ALAY</strong></h2>
            </div>
        </div>
         
</body>
</html>
