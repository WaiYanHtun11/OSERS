<?php
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
mysqli_select_db($con,"osers");
$fdnoti = '';
$resultnoti= '';
$realdate = '';
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
            <div id = "resultchoice">
            <form action = "Result.php" method ="post">
            <select name="semester" size = "1">
            <?php if($_POST['semester']=="Semester_I"){?>
            <option selected = "selected">Semester_I</option>
            <option>Semester_II</option>
            <option>Special_Semester</option>
            <?php } elseif($_POST['semester']=="Semester_II")
            {
                ?>
                <option>Semester_I</option>
            <option selected = "selected">Semester_II</option>
            <option>Special_Semester</option>
          <?php  }elseif($_POST['semester']=="Special_Semester"){?>
            <option>Semester_I</option>
            <option >Semester_II</option>
            <option selected = "selected">Special_Semester</option>
          <?php }else{?>
            <option>Semester_I</option>
            <option >Semester_II</option>
            <option>Special_Semester</option>
          <?php } ?>
            </select>
            <select name="year_result" id="year_choice" size = "1">
            <?php if($_POST['year_result'] == "First_Year"){?>
            <option selected = "selected">First_Year</option>
            <option>Second_Year</option>
            <option>Third_Year</option>
            <?php }elseif($_POST['year_result']=="Second_Year"){?>
            <option >First_Year</option>
            <option selected = "selected">Second_Year</option>
            <option>Third_Year</option>
            <?php }elseif($_POST['year_result']=="Third_Year")
            { ?>
             <option >First_Year</option>
            <option >Second_Year</option>
            <option selected = "selected">Third_Year</option>
            <?php }else{ ?>
                <option >First_Year</option>
            <option >Second_Year</option>
            <option >Third_Year</option>
            <?php }?>
            </select>


            <input type = "submit" name = "View" value = "View">
            <input type = "submit" name = "SeeCourses" value = "See Courses">
            <input type = "submit" name = "seeGradeDefinition" value = "See Grade Defines">
            <input type = "submit" name = "SeeOldResult" value = "See Old Result!">
            <input type = "submit" name = "cgbarecord" value = "See YOUR YEARLY CGPA">
            </form>
            </div>
            <div id = "resultpane">
         <?php 
          date_default_timezone_set("Asia/Yangon");
        /* echo "Today is ".date('Y:m:d');
            echo '<br>';
        $resultdate = "2018:8:9";
        if(date('Y:m:d')>= $resultdate){
            echo "in the present";
        }
        else echo "in the paset";
        
         $time = date('H:i:s',strtotime("8:30 PM"));
         echo $time;
         if($time < date('H:i:s')){
             echo 'cannot show';
         }
         else echo 'show';*/
        if(isset($_POST['View'])){

            if($_POST['semester'] == 'Semester_I'){
                $result = mysqli_query($con,"SELECT * FROM resulttime Where id = '1'");
                while($row = mysqli_fetch_array($result)){
                    $date = $row['Date'];
                    $time = date('H-i-sa',strtotime($row['Time']));
                    $real = $date.''.$time;
                }
            
                if( $real <= date('Y-m-d h-i-sa')){

                    if($_POST['year_result'] == 'First_Year'){

                        $result = mysqli_query($con,"SELECT * FROM first_year_rt");
                        echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                        echo '<caption><h2>First Year Semester_I Result!</h2></caption>';
                        echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>Myanmar</h2></th><th><h2>English</h2></th><th><h2>Physics</h2></th><th><h2>1011</h2></th><th><h2>1021</h2></th><th><h2>1031</h2></th><th><h2>GPA</h2></th></tr>';
                        while($row = mysqli_fetch_array($result)){
                            $name = $row['St_Name'];
                            $id = $row['St_ID'];
                     echo '<tr style= "font-size:20">';
                     echo '<td style = "background-color:white;">'.$id.'</td>';
                     echo '<td style = "background-color:white;">'.$name.'</td>';
                     switch($row['M-100']){
                    
                     case 'D': echo '<td style = "background-color:yellow">'.$row['M-100'].'</td>';break;
                     case 'F':echo '<td style = "background-color:red">'.$row['M-100'].'</td>';break;
                    default :echo '<td style = "background-color:white;">'.$row['M-100'].'</td>';break;
                     }
                     switch($row['E-100']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['E-100'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['E-100'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['E-100'].'</td>';break;
                         
                     }
                    switch($row['P-100']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['P-100'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['P-100'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['P-100'].'</td>';break;

                    }
                    switch($row['CST-101']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-101'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-101'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-101'].'</td>';break;
                    }
                     switch($row['CST-102']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-102'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-102'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-102'].'</td>';break;
                     }
                     switch($row['CST-103']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-103'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-103'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-103'].'</td>';break;
                     }
                     echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                        }
                        
                     echo '</table>';
                     echo '<hr/>';
                    }
                    elseif($_POST['year_result']== 'Second_Year'){

                        $result = mysqli_query($con,"SELECT * FROM `second_year_rt` WHERE Major = 'CS'");
                        echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                        echo '<caption><h2>Second Year Semester_I Result!(Computer Science)</h2></caption>';
                        echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>2011</h2></th><th><h2>2021</h2></th><th><h2>2031</h2></th><th><h2>2041</h2></th><th><h2>2051</h2></th><th><h2>GPA</h2></th></tr>';
                        while($row = mysqli_fetch_array($result)){
                             $name = $row['St_Name'];
                            $id = $row['St_ID'];
                     echo '<tr style= "font-size:20">';
                     echo '<td style = "background-color:white;">'.$id.'</td>';
                     echo '<td style = "background-color:white;">'.$name.'</td>';
                     switch($row['E-200']){
                        
                         case 'D': echo '<td style = "background-color:yellow">'.$row['E-200'].'</td>';break;
                         case 'F':echo '<td style = "background-color:red">'.$row['E-200'].'</td>';break;
                        default :echo '<td style = "background-color:white;">'.$row['E-200'].'</td>';break;
                         }
                         switch($row['CST-201']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-201'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-201'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-201'].'</td>';break;
                             
                         }
                        switch($row['CST-202']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-202'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-202'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-202'].'</td>';break;
    
                        }
                        switch($row['CST-203']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-203'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-203'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-203'].'</td>';break;
                        }
                         switch($row['CST-204']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-204'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-204'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-204'].'</td>';break;
                         }
                         switch($row['CST-205']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-205'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-205'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-205'].'</td>';break;
                         }
                     echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                        }
                        
                     echo '</table>';
                     echo '<hr/>';
                     
                     $result = mysqli_query($con,"SELECT * FROM second_year_rt WHERE Major = 'CT'");
                     echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                     echo '<caption><h2>Second Year Semester_I Result!(Computer Techonology)</h2></caption>';
                     echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>2011</h2></th><th><h2>2021</h2></th><th><h2>2031</h2></th><th><h2>2041</h2></th><th><h2>2051</h2></th><th><h2>GPA</h2></th></tr>';
                     while($row = mysqli_fetch_array($result)){
                          $name = $row['St_Name'];
                            $id = $row['St_ID'];
                     echo '<tr style= "font-size:20">';
                     echo '<td style = "background-color:white;">'.$id.'</td>';
                     echo '<td style = "background-color:white;">'.$name.'</td>';
                     switch($row['E-200']){
                         case 'D': echo '<td style = "background-color:yellow">'.$row['E-200'].'</td>';break;
                         case 'F':echo '<td style = "background-color:red">'.$row['E-200'].'</td>';break;
                        default :echo '<td style = "background-color:white;">'.$row['E-200'].'</td>';break;
                         }
                         switch($row['CST-201']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-201'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-201'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-201'].'</td>';break;
                             
                         }
                        switch($row['CST-202']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-202'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-202'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-202'].'</td>';break;
    
                        }
                        switch($row['CST-203']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-203'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-203'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-203'].'</td>';break;
                        }
                         switch($row['CST-204']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-204'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-204'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-204'].'</td>';break;
                         }
                         switch($row['CST-205']){
                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-205'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-205'].'</td>';break;
                           default :echo '<td style = "background-color:white;">'.$row['CST-205'].'</td>';break;
                         }
                    
                     echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                     }
                     
                  echo '</table>';
                  echo '<hr/>';
                 }
                 elseif($_POST['year_result']== 'Third_Year'){
                    $result = mysqli_query($con,"SELECT * FROM third_year_rt WHERE Major = 'CS'");
                    echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                    echo '<caption><h2>Third Year Semester_I Result!(Computer Science)</h2></caption>';
                    echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>3011</h2></th><th><h2>3021</h2></th><th><h2>3031</h2></th><th><h2>3041</h2></th><th><h2>3051</h2></th><th><h2>GPA</h2></th></tr>';
                    while($row = mysqli_fetch_array($result)){
                          $name = $row['St_Name'];
                            $id = $row['St_ID'];
                 echo '<tr style= "font-size:20">';
                 echo '<td style = "background-color:white;">'.$id.'</td>';
                 echo '<td style = "background-color:white;">'.$name.'</td>';
                 switch($row['E-300']){
                     case 'D': echo '<td style = "background-color:yellow">'.$row['E-300'].'</td>';break;
                     case 'F':echo '<td style = "background-color:red">'.$row['E-300'].'</td>';break;
                    default :echo '<td style = "background-color:white;">'.$row['E-300'].'</td>';break;
                     }
                     switch($row['CST-301']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-301'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-301'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-301'].'</td>';break;
                         
                     }
                    switch($row['CST-302']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-302'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-302'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-302'].'</td>';break;

                    }
                    switch($row['CST-303']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-303'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-303'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-303'].'</td>';break;
                    }
                     switch($row['CST-304']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-304'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-304'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-304'].'</td>';break;
                     }
                     switch($row['CST-305']){
                        case 'D': echo '<td style = "background-color:yellow">'.$row['CST-305'].'</td>';break;
                        case 'F':echo '<td style = "background-color:red">'.$row['CST-305'].'</td>';break;
                       default :echo '<td style = "background-color:white;">'.$row['CST-305'].'</td>';break;
                     }
                 echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                    }
                    
                 echo '</table>';
                 echo '<hr/>';
                    $result = mysqli_query($con,"SELECT * FROM third_year_rt WHERE Major = 'CT'");
                    echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                    echo '<caption><h2>Third Year Semester_I Result!(Computer Techonology)</h2></caption>';
                    echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>3011</h2></th><th><h2>3021</h2></th><th><h2>3031</h2></th><th><h2>3041</h2></th><th><h2>3051</h2></th><th><h2>GPA</h2></th></tr>';
                    while($row = mysqli_fetch_array($result)){
                          $name = $row['St_Name'];
                            $id = $row['St_ID'];
                echo '<tr style= "font-size:20">';
                echo '<td style = "background-color:white;">'.$id.'</td>';
                echo '<td style = "background-color:white;">'.$name.'</td>';
                switch($row['E-300']){
                    
                     case 'D': echo '<td style = "background-color:yellow">'.$row['E-300'].'</td>';break;
                     case 'F':echo '<td style = "background-color:red">'.$row['E-300'].'</td>';break;
                    default :echo '<td style = "background-color:white;">'.$row['E-300'].'</td>';break;
                     }
                switch($row['CST-301']){
                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-301'].'</td>';break;
                    case 'F':echo '<td style = "background-color:red">'.$row['CST-301'].'</td>';break;
                   default :echo '<td style = "background-color:white;">'.$row['CST-301'].'</td>';break;
                     
                 }
                switch($row['CST-302']){
                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-302'].'</td>';break;
                    case 'F':echo '<td style = "background-color:red">'.$row['CST-302'].'</td>';break;
                   default :echo '<td style = "background-color:white;">'.$row['CST-302'].'</td>';break;

                }
                switch($row['CST-303']){
                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-303'].'</td>';break;
                    case 'F':echo '<td style = "background-color:red">'.$row['CST-303'].'</td>';break;
                   default :echo '<td style = "background-color:white;">'.$row['CST-303'].'</td>';break;
                }
                 switch($row['CST-304']){
                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-304'].'</td>';break;
                    case 'F':echo '<td style = "background-color:red">'.$row['CST-304'].'</td>';break;
                   default :echo '<td style = "background-color:white;">'.$row['CST-304'].'</td>';break;
                 }
                 switch($row['CST-305']){
                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-305'].'</td>';break;
                    case 'F':echo '<td style = "background-color:red">'.$row['CST-305'].'</td>';break;
                   default :echo '<td style = "background-color:white;">'.$row['CST-305'].'</td>';break;
                 }
                echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                    }
                    
                    echo '</table>';
                    echo '<hr/>';


                 }
                }
                else{
                    echo '<h2 style = "text-align:center"><strong>Currently It is not the time you can view the result:please wait and refresh the page!<br>
                    Please Wait Until!'.$date.' '.$time.'</h2>';
                }

            }
            elseif($_POST['semester'] == 'Semester_II'){
                $result = mysqli_query($con,"SELECT * FROM resulttime Where id = '2'");
                while($row = mysqli_fetch_array($result)){
                    $date = $row['Date'];
                  
                    $time = date('H-i-sa',strtotime($row['Time']));
                    $real = $date.''.$time;
                }
            
             
                /*if($date < date('Y:m:d'))echo 'result date smaller';
                else echo 'result date greater';*/
                if($real <= date('Y-m-d h-i-sa')){

                    if($_POST['year_result'] == 'First_Year'){
                    
                                            $result = mysqli_query($con,"SELECT * FROM `first_year_ii`");
                                            echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                                            echo '<caption><h2>First Year Semester_II Result!</h2></caption>';
                                            echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>Myanmar</h2></th><th><h2>English</h2></th><th><h2>Physics</h2></th><th><h2>1012</h2></th><th><h2>1022</h2></th><th><h2>1032</h2></th><th><h2>GPA</h2></th></tr>';
                                            while($row = mysqli_fetch_array($result)){
                                         echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';


                                         switch($row['M-1002']){
                                            
                                             case 'D': echo '<td style = "background-color:yellow">'.$row['M-1002'].'</td>';break;
                                             case 'F':echo '<td style = "background-color:red">'.$row['M-1002'].'</td>';break;
                                            default :echo '<td style = "background-color:white;">'.$row['M-1002'].'</td>';break;
                                             }
                                             switch($row['E-1002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-1002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-1002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-1002'].'</td>';break;
                                                 
                                             }
                                            switch($row['P-1002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['P-1002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['P-1002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['P-1002'].'</td>';break;
                        
                                            }
                                            switch($row['CST-1012']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-1012'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-1012'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-1012'].'</td>';break;
                                            }
                                             switch($row['CST-1022']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-1022'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-1022'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-1022'].'</td>';break;
                                             }
                                             switch($row['CST-1032']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-1032'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-1032'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-1032'].'</td>';break;
                                             }
                                         
                                         echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                            }
                                            
                                         echo '</table>';
                                         echo '<hr/>';
                                        }
                                        elseif($_POST['year_result']== 'Second_Year'){
                    
                                            $result = mysqli_query($con,"SELECT * FROM second_year_ii WHERE  Major = 'CS'");
                                            echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                                            echo '<caption><h2>Second Year Semester_II Result!(Computer Science)</h2></caption>';
                                            echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>2012</h2></th><th><h2>2022</h2></th><th><h2>2032</h2></th><th><h2>2042</h2></th><th><h2>2052</h2></th><th><h2>GPA</h2></th></tr>';
                                            while($row = mysqli_fetch_array($result)){
                                         echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';
                                         switch($row['E-2002']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['E-2002'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['E-2002'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['E-2002'].'</td>';break;
                                            }
                                         switch($row['CST-2012']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2012'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['CST-2012'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['CST-2012'].'</td>';break;
                                             
                                         }
                                        switch($row['CST-2022']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2022'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['CST-2022'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['CST-2022'].'</td>';break;
                    
                                        }
                                        switch($row['CST-2032']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2032'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['CST-2032'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['CST-2032'].'</td>';break;
                                        }
                                         switch($row['CST-2042']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2042'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['CST-2042'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['CST-2042'].'</td>';break;
                                         }
                                         switch($row['CST-2052']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2052'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['CST-2052'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['CST-2052'].'</td>';break;
                                         }
                                         echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                            }
                                            
                                         echo '</table>';
                                         echo '<hr/>';
                                         $result = mysqli_query($con,"SELECT * FROM second_year_ii WHERE  Major = 'CT'");
                                         echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                                         echo '<caption><h2>Second Year Semester_II Result!(Computer Techonology)</h2></caption>';
                                         echo '<tr align="center"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>2012</h2></th><th><h2>2022</h2></th><th><h2>2032</h2></th><th><h2>2042</h2></th><th><h2>2052</h2></th><th><h2>GPA</h2></th></tr>';
                                         while($row = mysqli_fetch_array($result)){
                                            echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';
                                            switch($row['E-2002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-2002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-2002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-2002'].'</td>';break;
                                                }
                                             switch($row['CST-2012']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2012'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2012'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2012'].'</td>';break;
                                                 
                                             }
                                            switch($row['CST-2022']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2022'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2022'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2022'].'</td>';break;
                        
                                            }
                                            switch($row['CST-2032']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2032'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2032'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2032'].'</td>';break;
                                            }
                                             switch($row['CST-2042']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2042'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2042'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2042'].'</td>';break;
                                             }
                                             switch($row['CST-2052']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2052'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2052'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2052'].'</td>';break;
                                             }
                                            echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                         }
                                         
                                      echo '</table>';
                                      echo '<hr/>';
                                     }
                                     elseif($_POST['year_result']== 'Third_Year'){
                                        $result = mysqli_query($con,"SELECT * FROM third_year_ii WHERE Major = 'CS'");
                                        echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                                        echo '<caption><h2>Third Year Semester_II Result!(Computer Science)</h2></caption>';
                                        echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>3012</h2></th><th><h2>3022</h2></th><th><h2>3032</h2></th><th><h2>3042</h2></th><th><h2>3052</h2></th><th><h2>GPA</h2></th></tr>';
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';
                                            switch($row['E-3002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-3002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-3002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-3002'].'</td>';break;
                                                }
                                                switch($row['CST-3012']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3012'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3012'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3012'].'</td>';break;
                                                    
                                                }
                                               switch($row['CST-3022']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3022'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3022'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3022'].'</td>';break;
                           
                                               }
                                               switch($row['CST-3032']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3032'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3032'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3032'].'</td>';break;
                                               }
                                                switch($row['CST-3042']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3042'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3042'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3042'].'</td>';break;
                                                }
                                                switch($row['CST-3052']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3052'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3052'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3052'].'</td>';break;
                                                }
                                            echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                        }
                                        
                                     echo '</table>';
                                     echo '<hr/>';
                            
                                        $result = mysqli_query($con,"SELECT * FROM third_year_ii WHERE Major = 'CT'");
                                        echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "10" align = "center">';
                                        echo '<caption><h2>Third Year Semester_II Result!(Computer Techonology)</h2></caption>';
                                        echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>English</h2></th><th><h2>3012</h2></th><th><h2>3022</h2></th><th><h2>3032</h2></th><th><h2>3042</h2></th><th><h2>3052</h2></th><th><h2>GPA</h2></th></tr>';
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';
                                            switch($row['E-3002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-3002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-3002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-3002'].'</td>';break;
                                                }
                                                switch($row['CST-3012']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3012'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3012'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3012'].'</td>';break;
                                                    
                                                }
                                               switch($row['CST-3022']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3022'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3022'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3022'].'</td>';break;
                           
                                               }
                                               switch($row['CST-3032']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3032'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3032'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3032'].'</td>';break;
                                               }
                                                switch($row['CST-3042']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3042'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3042'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3042'].'</td>';break;
                                                }
                                                switch($row['CST-3052']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3052'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3052'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3052'].'</td>';break;
                                                }
                                            echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                        }
                                        
                                        echo '</table>';
                                        echo '<hr/>';
                    
                                     }
                    

                            }
                            else{
                                echo '<h2 style = "text-align:center"><strong>Currently It is not the time you can view the result:please wait and refresh the page!<br>
                                Please Wait Until!'.$date.' '.$time.'</h2>';
                            }






            }
            else{
                /* Special Semester Here*/

                $result = mysqli_query($con,"SELECT * FROM resulttime Where id = '3'");
                while($row = mysqli_fetch_array($result)){
                    $date = $row['Date'];
                  
                    $time = date('H-i-sa',strtotime($row['Time']));
                    $real = $date.''.$time;
                }
            
             
                /*if($date < date('Y:m:d'))echo 'result date smaller';
                else echo 'result date greater';*/
                if($real <= date('Y-m-d h-i-sa')){

                    if($_POST['year_result'] == 'First_Year'){
                    
                                            $result = mysqli_query($con,"SELECT * FROM `first_sm`");
                                            echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "5" align = "center">';
                                            echo '<caption><h2>First Year Special_Semester Result!</h2></caption>';
                                            echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>M-1001</h2></th><th><h2>E-1001</h2></th><th><h2>P-1001</h2></th><th><h2>1011</h2></th><th><h2>1021</h2></th><th><h2>1031</h2></th><th><h2>M-1002</h2></th><th><h2>E-1002</h2></th><th><h2>P-1002</h2></th><th><h2>1012</h2></th><th><h2>1022</h2></th><th><h2>1032</h2></th><th><h2>GPA</h2></th></tr>';
                                            while($row = mysqli_fetch_array($result)){
                                         echo '<tr style= "font-size:15">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';
                                         switch($row['M-100']){
                                            
                                             case 'D': echo '<td style = "background-color:yellow">'.$row['M-100'].'</td>';break;
                                             case 'F':echo '<td style = "background-color:red">'.$row['M-100'].'</td>';break;
                                            default :echo '<td style = "background-color:white;">'.$row['M-100'].'</td>';break;
                                             }
                                             switch($row['E-100']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-100'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-100'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-100'].'</td>';break;
                                                 
                                             }
                                            switch($row['P-100']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['P-100'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['P-100'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['P-100'].'</td>';break;
                        
                                            }
                                            switch($row['CST-101']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-101'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-101'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-101'].'</td>';break;
                                            }
                                             switch($row['CST-102']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-102'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-102'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-102'].'</td>';break;
                                             }
                                             switch($row['CST-103']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-103'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-103'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-103'].'</td>';break;
                                             }


                                             switch($row['M-1002']){
                                                
                                                 case 'D': echo '<td style = "background-color:yellow">'.$row['M-1002'].'</td>';break;
                                                 case 'F':echo '<td style = "background-color:red">'.$row['M-1002'].'</td>';break;
                                                default :echo '<td style = "background-color:white;">'.$row['M-1002'].'</td>';break;
                                                 }
                                                 switch($row['E-1002']){
                                                    case 'D': echo '<td style = "background-color:yellow">'.$row['E-1002'].'</td>';break;
                                                    case 'F':echo '<td style = "background-color:red">'.$row['E-1002'].'</td>';break;
                                                   default :echo '<td style = "background-color:white;">'.$row['E-1002'].'</td>';break;
                                                     
                                                 }
                                                switch($row['P-1002']){
                                                    case 'D': echo '<td style = "background-color:yellow">'.$row['P-1002'].'</td>';break;
                                                    case 'F':echo '<td style = "background-color:red">'.$row['P-1002'].'</td>';break;
                                                   default :echo '<td style = "background-color:white;">'.$row['P-1002'].'</td>';break;
                            
                                                }
                                                switch($row['CST-1012']){
                                                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-1012'].'</td>';break;
                                                    case 'F':echo '<td style = "background-color:red">'.$row['CST-1012'].'</td>';break;
                                                   default :echo '<td style = "background-color:white;">'.$row['CST-1012'].'</td>';break;
                                                }
                                                 switch($row['CST-1022']){
                                                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-1022'].'</td>';break;
                                                    case 'F':echo '<td style = "background-color:red">'.$row['CST-1022'].'</td>';break;
                                                   default :echo '<td style = "background-color:white;">'.$row['CST-1022'].'</td>';break;
                                                 }
                                                 switch($row['CST-1032']){
                                                    case 'D': echo '<td style = "background-color:yellow">'.$row['CST-1032'].'</td>';break;
                                                    case 'F':echo '<td style = "background-color:red">'.$row['CST-1032'].'</td>';break;
                                                   default :echo '<td style = "background-color:white;">'.$row['CST-1032'].'</td>';break;
                                                 }

                                         echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                            }
                                            
                                         echo '</table>';
                                         echo '<hr/>';
                                        }
                                        elseif($_POST['year_result']== 'Second_Year'){
                    
                                            $result = mysqli_query($con,"SELECT * FROM `second_sm`");
                                            echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "5" align = "center">';
                                            echo '<caption><h2>Second Year Special_Semester Result!</h2></caption>';
                                            echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>E_2001</h2></th><th><h2>2011</h2></th><th><h2>2021</h2></th><th><h2>2031</h2></th><th><h2>2041</h2></th><th><h2>2051</h2></th><th><h2>E_2002</h2></th><th><h2>2012</h2></th><th><h2>2022</h2></th><th><h2>2032</h2></th><th><h2>2042</h2></th><th><h2>2052</h2></th><th><h2>GPA</h2></th></tr>';
                                            while($row = mysqli_fetch_array($result)){
                                         echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td  style = "background-color:white;">'.$row['St_Name'].'</td>';
                                         switch($row['E-2001']){
                                            case 'D': echo '<td style = "background-color:yellow">'.$row['E-2001'].'</td>';break;
                                            case 'F':echo '<td style = "background-color:red">'.$row['E-2001'].'</td>';break;
                                           default :echo '<td style = "background-color:white;">'.$row['E-2001'].'</td>';break;
                                            }
                                            switch($row['CST-2011']){
                                               case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2011'].'</td>';break;
                                               case 'F':echo '<td style = "background-color:red">'.$row['CST-2011'].'</td>';break;
                                              default :echo '<td style = "background-color:white;">'.$row['CST-2011'].'</td>';break;
                                                
                                            }
                                           switch($row['CST-2021']){
                                               case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2021'].'</td>';break;
                                               case 'F':echo '<td style = "background-color:red">'.$row['CST-2021'].'</td>';break;
                                              default :echo '<td style = "background-color:white;">'.$row['CST-2021'].'</td>';break;
                       
                                           }
                                           switch($row['CST-2031']){
                                               case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2031'].'</td>';break;
                                               case 'F':echo '<td style = "background-color:red">'.$row['CST-2031'].'</td>';break;
                                              default :echo '<td style = "background-color:white;">'.$row['CST-2031'].'</td>';break;
                                           }
                                            switch($row['CST-2041']){
                                               case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2041'].'</td>';break;
                                               case 'F':echo '<td style = "background-color:red">'.$row['CST-2041'].'</td>';break;
                                              default :echo '<td style = "background-color:white;">'.$row['CST-2041'].'</td>';break;
                                            }
                                            switch($row['CST-2051']){
                                               case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2051'].'</td>';break;
                                               case 'F':echo '<td style = "background-color:red">'.$row['CST-2051'].'</td>';break;
                                              default :echo '<td style = "background-color:white;">'.$row['CST-2051'].'</td>';break;
                                            }
                                            switch($row['E-2002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-2002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-2002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-2002'].'</td>';break;
                                                }
                                             switch($row['CST-2012']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2012'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2012'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2012'].'</td>';break;
                                                 
                                             }
                                            switch($row['CST-2022']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2022'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2022'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2022'].'</td>';break;
                        
                                            }
                                            switch($row['CST-2032']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2032'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2032'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2032'].'</td>';break;
                                            }
                                             switch($row['CST-2042']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2042'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2042'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2042'].'</td>';break;
                                             }
                                             switch($row['CST-2052']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-2052'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-2052'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-2052'].'</td>';break;
                                             }

                                         echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                            }
                                            
                                         echo '</table>';
                                         echo '<hr/>';
                                     }
                                     elseif($_POST['year_result']== 'Third_Year'){
                                        $result = mysqli_query($con,"SELECT * FROM `third_sm` ");
                                        echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "5" align = "center">';
                                        echo '<caption><h2>Third Year Special_Semester Result!</h2></caption>';
                                        echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>E_3001</h2></th><th><h2>3011</h2></th><th><h2>3021</h2></th><th><h2>3031</h2></th><th><h2>3041</h2></th><th><h2>3051</h2></th><th><h2>E_3002</h2></th><th><h2>3012</h2></th><th><h2>3022</h2></th><th><h2>3032</h2></th><th><h2>3042</h2></th><th><h2>3052</h2></th><th><h2>GPA</h2></th></tr>';
                                        while($row = mysqli_fetch_array($result)){
                                            echo '<tr style= "font-size:20">'.'<td style = "background-color:white;">'.$row['St_ID'].'</td>'.'<td style = "background-color:white;">'.$row['St_Name'].'</td>';
                                           
                                            switch($row['E-3001']){
                                                
                                                 case 'D': echo '<td style = "background-color:yellow">'.$row['E-3001'].'</td>';break;
                                                 case 'F':echo '<td style = "background-color:red">'.$row['E-3001'].'</td>';break;
                                                default :echo '<td style = "background-color:white;">'.$row['E-3001'].'</td>';break;
                                                 }
                                            switch($row['CST-3011']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3011'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-3011'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-3011'].'</td>';break;
                                                 
                                             }
                                            switch($row['CST-3021']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3021'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-3021'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-3021'].'</td>';break;
                            
                                            }
                                            switch($row['CST-3031']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3031'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-3031'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-3031'].'</td>';break;
                                            }
                                             switch($row['CST-3041']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3041'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-3041'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-3041'].'</td>';break;
                                             }
                                             switch($row['CST-3051']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3051'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['CST-3051'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['CST-3051'].'</td>';break;
                                             }
                                             switch($row['E-3002']){
                                                case 'D': echo '<td style = "background-color:yellow">'.$row['E-3002'].'</td>';break;
                                                case 'F':echo '<td style = "background-color:red">'.$row['E-3002'].'</td>';break;
                                               default :echo '<td style = "background-color:white;">'.$row['E-3002'].'</td>';break;
                                                }
                                                switch($row['CST-3012']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3012'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3012'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3012'].'</td>';break;
                                                    
                                                }
                                               switch($row['CST-3022']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3022'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3022'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3022'].'</td>';break;
                           
                                               }
                                               switch($row['CST-3032']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3032'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3032'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3032'].'</td>';break;
                                               }
                                                switch($row['CST-3042']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3042'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3042'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3042'].'</td>';break;
                                                }
                                                switch($row['CST-3052']){
                                                   case 'D': echo '<td style = "background-color:yellow">'.$row['CST-3052'].'</td>';break;
                                                   case 'F':echo '<td style = "background-color:red">'.$row['CST-3052'].'</td>';break;
                                                  default :echo '<td style = "background-color:white;">'.$row['CST-3052'].'</td>';break;
                                                }
                                            echo '<td style = "background-color:white;">'.$row['GPA'].'</td>'.'</tr>';
                                        }
                                        
                                     echo '</table>';
                                     echo '<hr/>';
                        
                    
                                     }
                    

                            }
                            else{
                                echo '<h2 style = "text-align:center"><strong>Currently It is not the time you can view the result:please wait and refresh the page!<br>
                                Please Wait Until!'.$date.' '.$time.'</h2>';
                            }



            }
            

        }elseif(isset($_POST['SeeCourses'])){
             
           echo  '<table width=60%" border="2" align = "center" cellspacing = "0" style = "font-size:20;background-color:white;"  style = "background-color:white" cellpadding = "2">';
           echo '<caption><h2>First Year Courses</h2></caption>';
            echo '<tr align="center"><th>Subject Code </th><th>Subject Title</th><th>Credit</th></tr>';
           
            echo '<tr align="center">
            <td>M-1001</td>
            <td>Myanmar</td>
            <td>2</td>
            </tr>';
            
           echo ' <tr align="center">
            <td>E-1001</td>
            <td>English</td>
            <td>2</td>
            </tr>';
            
            
           echo  '<tr align="center">
            <td>P-1001</td>
            <td>Physics</td>
            <td>4</td>
            </tr>' ; 
           echo '<tr align="center">
            <td>CST-1011</td>
            <td>Web Development</td>
            <td>4</td>

            </tr>';
            echo '<tr align="center">
            <td>CST-1021</td>
            <td>Computational Mathematics-1</td>
            <td>4</td>
            </tr>';
            
           echo  '<tr align="center">
            <td>CST-1031</td>
            <td>Software Development Fundamental-1</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>M-1002</td>
            <td>Myanmar</td>
            <td>2</td>
            </tr>';
            
            echo '<tr align="center">
            <td>E-1002</td>
            <td>English</td>
            <td>2</td>
            </tr>';
            
            echo '<tr align="center">
            <td>P-1002</td>
            <td>Physics</td>
            <td>2</td>
            </tr>';
            
           echo ' <tr align="center">
            <td>CST-1012</td>
            <td>Digital Logic-1</td>
            <td>3 </td>
            
            </tr>';
           
            echo '<tr align="center">
            <td>CST-1022</td>
            <td>Computational Mathematics-2</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-1032</td>
            <td>Software Development Fundamental-2</td>
            <td>4</td>
            </tr>';
            
           echo  '</table>';
            echo '<br>';
            
           
           echo  '<table width=60%" border="2" align = "center" cellspacing = "0" style = "font-size:20;background-color:white;"  cellpadding = "2">';
        
            echo '<caption><h2>Second Year Courses</h2></caption>';
        
            echo '<tr align="center"><th>Subject Code </th><th>Subject Title</th><th>Credit</th></tr>';

            echo '<tr align="center">
            <td>E-2001</td>
            <td>English</td>
            <td>2</td>
            </tr>';
            echo '<tr align="center">
            <td>CST-2011</td>
            <td>Software Development Fundameltal-2</td>
            <td>4</td>
            </tr>';
            echo '<tr align="center">
            <td>CST-2021</td>
            <td>Computational Mathematics-2</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-2031</td>
            <td>Digital Logic-2</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-2041</td>
            <td>Information Manangement-1</td>
            <td>3</td>
            </tr>';
            
           echo  '<tr align="center">
            <td>CST-2051</td>
            <td>System Analysis and Design & UML</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CT-2051</td>
            <td>Analysis of Functoins</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>E-2002</td>
            <td>English</td>
            <td>2</td>
            </tr>';
            
           echo '<tr align="center">
            <td>CST-2012</td>
            <td>Software Development Fundameltal-5</td>
            <td>4</td>
            </tr>';
            
           echo ' <tr align="center">
            <td>CST-2022</td>
            <td>Computational Mathematics-5</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-2032</td>
            <td>Project</td>
            <td>2</td>
            </tr>';
            
            
           echo '<tr align="center">
            <td>CST-2042</td>
            <td>Software Engineering-1</td>
            <td>3</td>
            </tr>';
            
          echo   '<tr align="center">
            <td>CST-2052</td>
            <td>Human Computer Interaction</td>
            <td>3</td>
            </tr>';
            
           echo  '<tr align="center">
            <td>CT-2042</td>
            <td>Computer System Engineering</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CT-2052</td>
            <td>Circuits and Electronics-1</td>
            <td>4</td>
            </tr>';
            
            echo '</table>';
            echo '<br>';
            
            
        
           echo  '<table width=60%" border="2" align = "center" cellspacing = "0" style = "font-size:20;background-color:white;" cellpadding = "2">';
          
            echo '<caption><h2>Third Year Courses</h2></caption>';
            echo '<tr align="center"><th>Subject Code </th><th>Subject Title</th><th>Credit Point</th></tr>';

           echo '<tr align="center">
            <td>E-3001</td>
            <td>English</td>
            <td>2</td>
            </tr>';
            echo '<tr align="center">
            <td>CST-3011</td>
            <td>Operating System</td>
            <td>3</td>
            </tr>';
            echo '<tr align="center">
            <td>CST-3021</td>
            <td>Introduction to Modeling and Simulation</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-3031</td>
            <td>Computer Network-1</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-3041</td>
            <td>Computer Architacture and Organization-1</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CS-3051</td>
            <td>Imformation Management-2</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CT-3051</td>
            <td>Circuits and  Electronics -2</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>E-3002</td>
            <td>English</td>
            <td>2</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-3012</td>
            <td>Algorithms and Complexity-1</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-3022</td>
            <td>Modelind and Simulation</td>
            <td>4</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-3032</td>
            <td>Distributed System</td>
            <td>3</td>
            </tr>';
            
            
            echo '<tr align="center">
            <td>CST-3042</td>
            <td>Software Engineering-2</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CST-3052</td>
            <td>Project</td>
            <td>2</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CT-3022</td>
            <td>Software Engineering-1</td>
            <td>3</td>
            </tr>';
            
            echo '<tr align="center">
            <td>CT-3032</td>
            <td>Computer Network-1</td>
            <td>4</td>
            </tr>';
            echo '<tr align="center">
            <td>CT-3042</td>
            <td>Computer Architacture and Organization-2</td>
            <td>3</td>
            </tr>';
            echo '<tr align="center">
            <td>CT-3052</td>
            <td>Project</td>
            <td>4</td>
            </tr>';
            echo '</table>';
            echo '<br>';

         }
         elseif(isset($_POST['seeGradeDefinition'])){
         echo '<table border = "1" width = "60%" style = "background-color:white;" style cellspacing = "0" cellpadding = "20" align = "center">';
         echo '<caption><h2>Letter Grade Definition</h2></caption>';
         echo '<tr align="center"><th><h2>Letter Grade</h2></th><th><h2>Mark Definition</h2></th><th><h2> Letter Grade Point</h2></th></tr>';
         echo '<tr align="center"><td>A<sup>+</sup></td><td> Marks >= 90</td><td>4.3</td></tr>';
         echo '<tr align="center"><td>A</td><td>80 <= Marks <= 89</td><td>4.0</td></tr>';
         echo '<tr align="center"><td>A<sup>-</sup></td><td> 75 <= M <= 79</td><td>3.67</td></tr>';
         echo '<tr align="center"><td>B<sup>+</sup></td><td> 70 <= M <= 74</td><td>3.3</td></tr>';
         echo '<tr align="center"><td>B</td><td> 65 <= M <= 69</td><td>3.0</td></tr>';
         echo '<tr align="center"><td>B<sup>-</sup></td><td> 60 <= M <=64</td><td>2.67</td></tr>';
         echo '<tr align="center"><td>C<sup>+</sup></td><td>55 <= M <= 59</td><td>2.33</td></tr>';
         echo '<tr align="center"><td>C</td><td>50 <= M <= 54</td><td>2.0</td></tr>';
         echo '<tr align="center"><td>D</td><td>40 <= M <= 49</td><td>1.0</td></tr>';
        echo '<tr align="center"><td>F</td><td> M < 40</td><td>0.0</td></tr>';
         echo '</table>';
      
         } 
         elseif(isset($_POST['SeeOldResult'])){
         ?>
              <div id = "Sfd">
                  <h2>Download The Old Result You Want</h2>
                <?php
                $currentyear = date('Y');
                 $sql = "SELECT * FROM `oldresult` WHERE `YEAR` != '$currentyear'";
                 $result = mysqli_query($con,$sql);
                 echo '<ul type = "square">';
                 while($row = mysqli_fetch_array($result)){
                     $filename = $row['filename'];
                     $name = $row['file'];
                     $YEAR1 = $row['YEAR'];
                     $YEAR2 =  $YEAR1-1;
                     $YEAR = $YEAR2.'-'.$YEAR1.'';

                     ?>
                    <li><a href = "uploads/oldresult/<?php echo $name;?>"><?php echo $YEAR.' Acadamic Year/ '.$filename;?></a></li>
           <?php      }
            echo '</ul>';
         }elseif(isset($_POST['cgbarecord'])){
             $id = $_SESSION['pass'];
             echo '<div id="Sfd">';
             echo '<table align = "center" border = "1" cellspacing = "0" width = "60%">';
             echo '<caption><h2>Your CGBA RECORD</h2></caption>';
             echo '<tr align="center"><th>Acadamic Year</th><th>Year</th><th>CGBA</th></tr>';
             $QL = "SELECT * FROM `cumulative` WHERE St_ID = '$id'";
             $res = mysqli_query($con,$QL);
             while($row = mysqli_fetch_array($res)){
                 echo '<tr align = "center"><td>'.$row['AcdYear'].'</td><td>'.$row['Year'].'</td><td>'.$row['CGBAGRADE'].'</td></tr>';
             }
             echo '</table>';
             echo '</div>';
         }    
         
         ?>
            
            </div>
           
           
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
