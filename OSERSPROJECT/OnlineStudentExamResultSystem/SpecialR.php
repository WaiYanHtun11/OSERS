<?php  
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
function direct($file){
    header("location:".$file);
}
mysqli_select_db($con,"osers");
$insertnoti ='Make You Choice On Tables';
$insertinfo='';
$tablename= '';
date_default_timezone_set("Asia/Yangon");
$resut1 = mysqli_query($con,"SELECT * FROM resulttime Where id = '2'");
while($row = mysqli_fetch_array($resut1)){
    $date1 = $row['Date'];
  
    $time1 = date('H-i-sa',strtotime($row['Time']));
    $realtime1 = $date1.''.$time1;
}
$resut2 = mysqli_query($con,"SELECT * FROM resulttime Where id = '3'");
while($row = mysqli_fetch_array($resut2)){
    $date2 = $row['Date'];
    $time2 = date('H-i-sa',strtotime($row['Time']));
    $realtime2 = $date2.''.$time2;
}


/*if($date < date('Y:m:d'))echo 'result date smaller';
else echo 'result date greater';*/

if(isset($_POST['back'])){
    direct('OSERSBACKEND.php');
}

if(isset($_POST['S_I'])){
    direct('semesterIR.php');
}
if(isset($_POST['S_II'])){
    direct('semesterIIR.php');
}
if(isset($_POST['Special'])){
    direct('SpecialR.php');
}
function GPA1($s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8,$s9,$s10,$s11,$s12,$con){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $c6 = 0;
    $c7 = 0;
    $c8 = 0;
    $c9 = 0;
    $c10 = 0;
    $c11 = 0;
    $GPA1 = 0;
    $sql = "SELECT * FROM `firstcredit`";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['M-1001'];
        $c1 = $row['E-1001'];
        $c2 = $row['P-1001'];
        $c3 = $row['CST-1011'];
        $c4 = $row['CST-1021'];
        $c5 = $row['CST-1031'];
        $c6 = $row['M-1002'];
        $c7 = $row['E-1002'];
        $c8 = $row['P-1001'];
        $c9 = $row['CST-1012'];
        $c10 = $row['CST-1022'];
        $c11 = $row['CST-1032'];
    }
    switch($s1){
        case 'A+':$GPA1 += 4.3 * $c0;break;
        case 'A':$GPA1 += 4.0 * $c0;break;
        case 'A-':$GPA1 += 3.67 * $c0;break;
        case 'B+':$GPA1 += 3.3 * $c0;break;
        case 'B':$GPA1 +=  3.0 * $c0;break;
        case 'B-':$GPA1 += 2.67 * $c0;break;
        case 'C+':$GPA1 += 2.33 * $c0;break;
        case 'C':$GPA1 += 2.0 * $c0;break;
        case 'D' :$GPA1 += 1.0 * $c0 ;break;
        case 'F' :$GPA1 += 0.0 * $c0 ;break;
        default:break;
    }
    switch($s2){
        case 'A+':$GPA1 += 4.3 * $c1;break;
        case 'A':$GPA1 += 4.0 * $c1;break;
        case 'A-':$GPA1 += 3.67 * $c1;break;
        case 'B+':$GPA1 += 3.3 * $c1;break;
        case 'B':$GPA1 +=  3.0 * $c1;break;
        case 'B-':$GPA1 += 2.67 * $c1;break;
        case 'C+':$GPA1 += 2.33 * $c1;break;
        case 'C':$GPA1 += 2.0 * $c1;break;
        case 'D' :$GPA1 += 1.0 * $c1 ;break;
        case 'F' :$GPA1 += 0.0 * $c1 ;break;
        default:break;
    }
    switch($s3){
        case 'A+':$GPA1 += 4.3 * $c2;break;
        case 'A':$GPA1 += 4.0 * $c2;break;
        case 'A-':$GPA1 += 3.67 * $c2;break;
        case 'B+':$GPA1 += 3.3 * $c2;break;
        case 'B':$GPA1 +=  3.0 * $c2;break;
        case 'B-':$GPA1 += 2.67 * $c2;break;
        case 'C+':$GPA1 += 2.33 * $c2;break;
        case 'C':$GPA1 += 2.0 * $c2;break;
        case 'D' :$GPA1 += 1.0 * $c2 ;break;
        case 'F' :$GPA1 += 0.0 * $c2 ;break;
        default:break;
    }
    switch($s4){
        case 'A+':$GPA1 += 4.3 * $c3;break;
        case 'A':$GPA1 += 4.0 * $c3;break;
        case 'A-':$GPA1 += 3.67 * $c3;break;
        case 'B+':$GPA1 += 3.3 * $c3;break;
        case 'B':$GPA1 +=  3.0 * $c3;break;
        case 'B-':$GPA1 += 2.67 * $c3;break;
        case 'C+':$GPA1 += 2.33 * $c3;break;
        case 'C':$GPA1 += 2.0 * $c3;break;
        case 'D' :$GPA1 += 1.0 * $c3 ;break;
        case 'F' :$GPA1 += 0.0 * $c3 ;break;
        default:break;
    }
    switch($s5){
        case 'A+':$GPA1 += 4.3 * $c4;break;
        case 'A':$GPA1 += 4.0 * $c4;break;
        case 'A-':$GPA1 += 3.67 * $c4;break;
        case 'B+':$GPA1 += 3.3 * $c4;break;
        case 'B':$GPA1 +=  3.0 * $c4;break;
        case 'B-':$GPA1 += 2.67 * $c4;break;
        case 'C+':$GPA1 += 2.33 * $c4;break;
        case 'C':$GPA1 += 2.0 * $c4;break;
        case 'D' :$GPA1 += 1.0 * $c4 ;break;
        case 'F' :$GPA1 += 0.0 * $c4 ;break;
        default:break;
    }
    switch($s6){
        case 'A+':$GPA1 += 4.3 * $c5;break;
        case 'A':$GPA1 += 4.0 * $c5;break;
        case 'A-':$GPA1 += 3.67 * $c5;break;
        case 'B+':$GPA1 += 3.3 * $c5;break;
        case 'B':$GPA1 +=  3.0 * $c5;break;
        case 'B-':$GPA1 += 2.67 * $c5;break;
        case 'C+':$GPA1 += 2.33 * $c5;break;
        case 'C':$GPA1 += 2.0 * $c5;break;
        case 'D' :$GPA1 += 1.0 * $c5 ;break;
        case 'F' :$GPA1 += 0.0 * $c5 ;break;
        default:break;
    }
    switch($s7){
        case 'A+':$GPA1 += 4.3 * $c6;break;
        case 'A':$GPA1 += 4.0 * $c6;break;
        case 'A-':$GPA1 += 3.67 * $c6;break;
        case 'B+':$GPA1 += 3.3 * $c6;break;
        case 'B':$GPA1 +=  3.0 * $c6;break;
        case 'B-':$GPA1 += 2.67 * $c6;break;
        case 'C+':$GPA1 += 2.33 * $c6;break;
        case 'C':$GPA1 += 2.0 * $c6;break;
        case 'D' :$GPA1 += 1.0 * $c6 ;break;
        case 'F' :$GPA1 += 0.0 * $c6 ;break;
        default:break;
        
    }
    switch($s8){
        case 'A+':$GPA1 += 4.3 * $c7;break;
        case 'A':$GPA1 += 4.0 * $c7;break;
        case 'A-':$GPA1 += 3.67 * $c7;break;
        case 'B+':$GPA1 += 3.3 * $c7;break;
        case 'B':$GPA1 +=  3.0 * $c7;break;
        case 'B-':$GPA1 += 2.67 * $c7;break;
        case 'C+':$GPA1 += 2.33 * $c7;break;
        case 'C':$GPA1 += 2.0 * $c7;break;
        case 'D' :$GPA1 += 1.0 * $c7 ;break;
        case 'F' :$GPA1 += 0.0 * $c7 ;break;
        default:break;
        
    }
    switch($s9){
        case 'A+':$GPA1 += 4.3 * $c8;break;
        case 'A':$GPA1 += 4.0 * $c8;break;
        case 'A-':$GPA1 += 3.67 * $c8;break;
        case 'B+':$GPA1 += 3.3 * $c8;break;
        case 'B':$GPA1 +=  3.0 * $c8;break;
        case 'B-':$GPA1 += 2.67 * $c8;break;
        case 'C+':$GPA1 += 2.33 * $c8;break;
        case 'C':$GPA1 += 2.0 * $c8;break;
        case 'D' :$GPA1 += 1.0 * $c8 ;break;
        case 'F' :$GPA1 += 0.0 * $c8 ;break;
        default:break;
        
    }
    switch($s10){
        case 'A+':$GPA1 += 4.3 * $c9;break;
        case 'A':$GPA1 += 4.0 * $c9;break;
        case 'A-':$GPA1 += 3.67 * $c9;break;
        case 'B+':$GPA1 += 3.3 * $c9;break;
        case 'B':$GPA1 +=  3.0 * $c9;break;
        case 'B-':$GPA1 += 2.67 * $c9;break;
        case 'C+':$GPA1 += 2.33 * $c9;break;
        case 'C':$GPA1 += 2.0 * $c9;break;
        case 'D' :$GPA1 += 1.0 * $c9 ;break;
        case 'F' :$GPA1 += 0.0 * $c9 ;break;
        default:break;
        
    }
    switch($s11){
        case 'A+':$GPA1 += 4.3 * $c10;break;
        case 'A':$GPA1 += 4.0 * $c10;break;
        case 'A-':$GPA1 += 3.67 * $c10;break;
        case 'B+':$GPA1 += 3.3 * $c10;break;
        case 'B':$GPA1 +=  3.0 * $c10;break;
        case 'B-':$GPA1 += 2.67 * $c10;break;
        case 'C+':$GPA1 += 2.33 * $c10;break;
        case 'C':$GPA1 += 2.0 * $c10;break;
        case 'D' :$GPA1 += 1.0 * $c10 ;break;
        case 'F' :$GPA1 += 0.0 * $c10 ;break;
        default:break;
        
    }
    switch($s12){
        case 'A+':$GPA1 += 4.3 * $c11;break;
        case 'A':$GPA1 += 4.0 * $c11;break;
        case 'A-':$GPA1 += 3.67 * $c11;break;
        case 'B+':$GPA1 += 3.3 * $c11;break;
        case 'B':$GPA1 +=  3.0 * $c11;break;
        case 'B-':$GPA1 += 2.67 * $c11;break;
        case 'C+':$GPA1 += 2.33 * $c11;break;
        case 'C':$GPA1 += 2.0 * $c11;break;
        case 'D' :$GPA1 += 1.0 * $c11 ;break;
        case 'F' :$GPA1 += 0.0 * $c11 ;break;
        default:break;
        
    }
    $sum = $c0 + $c1 + $c2 + $c4 + $c5 +$c6 + $c7 + $c8 + $c9 + $c10 + $c11;
    return number_format($GPA1/$sum,2);
}
function GPA2($s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8,$s9,$s10,$s11,$s12,$m,$con){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $c6 = 0;
    $c7 = 0;
    $c8 = 0;
    $c9 = 0;
    $c10 = 0;
    $c11 = 0;
    $GPA2 = 0;
    if( $m == 'CS'){
        $sql = "SELECT * FROM `secondcredit` WHERE  `Major` = 'CS' ";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-2001'];
            $c1 = $row['CST-2011'];
            $c2 = $row['CST-2021'];
            $c3 = $row['CST-2031'];
            $c4 = $row['CST-2041'];
            $c5 = $row['CST-2051'];
            $c6 = $row['E-2002'];
            $c7 = $row['CST-2012'];
            $c8 = $row['CST-2022'];
            $c9 = $row['CST-2032'];
            $c10 = $row['CST-2042'];
            $c11 = $row['CST-2052'];
    }
}else{
    $sql = "SELECT * FROM `secondcredit` WHERE  `Major` = 'CT' ";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['E-2001'];
        $c1 = $row['CST-2011'];
        $c2 = $row['CST-2021'];
        $c3 = $row['CST-2031'];
        $c4 = $row['CST-2041'];
        $c5 = $row['CST-2051'];
        $c6 = $row['E-2002'];
        $c7 = $row['CST-2012'];
        $c8 = $row['CST-2022'];
        $c9 = $row['CST-2032'];
        $c10 = $row['CST-2042'];
        $c11 = $row['CST-2052'];
    }
}
switch($s1){
    case 'A+':$GPA2 += 4.3 * $c0;break;
    case 'A':$GPA2 += 4.0 * $c0;break;
    case 'A-':$GPA2 += 3.67 * $c0;break;
    case 'B+':$GPA2 += 3.3 * $c0;break;
    case 'B':$GPA2 +=  3.0 * $c0;break;
    case 'B-':$GPA2 += 2.67 * $c0;break;
    case 'C+':$GPA2 += 2.33 * $c0;break;
    case 'C':$GPA2 += 2.0 * $c0;break;
    case 'D' :$GPA2 += 1.0 * $c0 ;break;
    case 'F' :$GPA2 += 0.0 * $c0 ;break;
    default:break;
}
switch($s2){
    case 'A+':$GPA2 += 4.3 * $c1;break;
    case 'A':$GPA2 += 4.0 * $c1;break;
    case 'A-':$GPA2 += 3.67 * $c1;break;
    case 'B+':$GPA2 += 3.3 * $c1;break;
    case 'B':$GPA2 +=  3.0 * $c1;break;
    case 'B-':$GPA2 += 2.67 * $c1;break;
    case 'C+':$GPA2 += 2.33 * $c1;break;
    case 'C':$GPA2 += 2.0 * $c1;break;
    case 'D' :$GPA2 += 1.0 * $c1 ;break;
    case 'F' :$GPA2 += 0.0 * $c1 ;break;
    default:break;
}
switch($s3){
    case 'A+':$GPA2+= 4.3 * $c2;break;
    case 'A':$GPA2 += 4.0 * $c2;break;
    case 'A-':$GPA2 += 3.67 * $c2;break;
    case 'B+':$GPA2 += 3.3 * $c2;break;
    case 'B':$GPA2 +=  3.0 * $c2;break;
    case 'B-':$GPA2 += 2.67 * $c2;break;
    case 'C+':$GPA2 += 2.33 * $c2;break;
    case 'C':$GPA2 += 2.0 * $c2;break;
    case 'D' :$GPA2 += 1.0 * $c2 ;break;
    case 'F' :$GPA2 += 0.0 * $c2 ;break;
    default:break;
}
switch($s4){
    case 'A+':$GPA2 += 4.3 * $c3;break;
    case 'A':$GPA2 += 4.0 * $c3;break;
    case 'A-':$GPA2 += 3.67 * $c3;break;
    case 'B+':$GPA2 += 3.3 * $c3;break;
    case 'B':$GPA2 +=  3.0 * $c3;break;
    case 'B-':$GPA2 += 2.67 * $c3;break;
    case 'C+':$GPA2 += 2.33 * $c3;break;
    case 'C':$GPA2 += 2.0 * $c3;break;
    case 'D' :$GPA2 += 1.0 * $c3 ;break;
    case 'F' :$GPA2 += 0.0 * $c3 ;break;
    default:break;
}
switch($s5){
    case 'A+':$GPA2 += 4.3 * $c4;break;
    case 'A':$GPA2 += 4.0 * $c4;break;
    case 'A-':$GPA2 += 3.67 * $c4;break;
    case 'B+':$GPA2 += 3.3 * $c4;break;
    case 'B':$GPA2 +=  3.0 * $c4;break;
    case 'B-':$GPA2 += 2.67 * $c4;break;
    case 'C+':$GPA2 += 2.33 * $c4;break;
    case 'C':$GPA2 += 2.0 * $c4;break;
    case 'D' :$GPA2 += 1.0 * $c4 ;break;
    case 'F' :$GPA2 += 0.0 * $c4 ;break;
    default:break;
}
switch($s6){
    case 'A+':$GPA2 += 4.3 * $c5;break;
    case 'A':$GPA2 += 4.0 * $c5;break;
    case 'A-':$GPA2 += 3.67 * $c5;break;
    case 'B+':$GPA2 += 3.3 * $c5;break;
    case 'B':$GPA2 +=  3.0 * $c5;break;
    case 'B-':$GPA2 += 2.67 * $c5;break;
    case 'C+':$GPA2 += 2.33 * $c5;break;
    case 'C':$GPA2 += 2.0 * $c5;break;
    case 'D' :$GPA2 += 1.0 * $c5 ;break;
    case 'F' :$GPA2 += 0.0 * $c5 ;break;
    default:break;
}
switch($s7){
    case 'A+':$GPA2 += 4.3 * $c6;break;
    case 'A':$GPA2 += 4.0 * $c6;break;
    case 'A-':$GPA2 += 3.67 * $c6;break;
    case 'B+':$GPA2 += 3.3 * $c6;break;
    case 'B':$GPA2 +=  3.0 * $c6;break;
    case 'B-':$GPA2 += 2.67 * $c6;break;
    case 'C+':$GPA2 += 2.33 * $c6;break;
    case 'C':$GPA2 += 2.0 * $c6;break;
    case 'D' :$GPA2 += 1.0 * $c6 ;break;
    case 'F' :$GPA2 += 0.0 * $c6 ;break;
    default:break;
    
}
switch($s8){
    case 'A+':$GPA2 += 4.3 * $c7;break;
    case 'A':$GPA2 += 4.0 * $c7;break;
    case 'A-':$GPA2 += 3.67 * $c7;break;
    case 'B+':$GPA2 += 3.3 * $c7;break;
    case 'B':$GPA2 +=  3.0 * $c7;break;
    case 'B-':$GPA2 += 2.67 * $c7;break;
    case 'C+':$GPA2 += 2.33 * $c7;break;
    case 'C':$GPA2 += 2.0 * $c7;break;
    case 'D' :$GPA2 += 1.0 * $c7 ;break;
    case 'F' :$GPA2 += 0.0 * $c7 ;break;
    default:break;
    
}
switch($s9){
    case 'A+':$GPA2 += 4.3 * $c8;break;
    case 'A':$GPA2 += 4.0 * $c8;break;
    case 'A-':$GPA2 += 3.67 * $c8;break;
    case 'B+':$GPA2 += 3.3 * $c8;break;
    case 'B':$GPA2 +=  3.0 * $c8;break;
    case 'B-':$GPA2 += 2.67 * $c8;break;
    case 'C+':$GPA2 += 2.33 * $c8;break;
    case 'C':$GPA2 += 2.0 * $c8;break;
    case 'D' :$GPA2 += 1.0 * $c8 ;break;
    case 'F' :$GPA2 += 0.0 * $c8 ;break;
    default:break;
    
}
switch($s10){
    case 'A+':$GPA2 += 4.3 * $c9;break;
    case 'A':$GPA2 += 4.0 * $c9;break;
    case 'A-':$GPA2 += 3.67 * $c9;break;
    case 'B+':$GPA2 += 3.3 * $c9;break;
    case 'B':$GPA2 +=  3.0 * $c9;break;
    case 'B-':$GPA2 += 2.67 * $c9;break;
    case 'C+':$GPA2 += 2.33 * $c9;break;
    case 'C':$GPA2 += 2.0 * $c9;break;
    case 'D' :$GPA2 += 1.0 * $c9 ;break;
    case 'F' :$GPA2 += 0.0 * $c9 ;break;
    default:break;
    
}
switch($s11){
    case 'A+':$GPA2 += 4.3 * $c10;break;
    case 'A':$GPA2 += 4.0 * $c10;break;
    case 'A-':$GPA2 += 3.67 * $c10;break;
    case 'B+':$GPA2 += 3.3 * $c10;break;
    case 'B':$GPA2 +=  3.0 * $c10;break;
    case 'B-':$GPA2 += 2.67 * $c10;break;
    case 'C+':$GPA2 += 2.33 * $c10;break;
    case 'C':$GPA2 += 2.0 * $c10;break;
    case 'D' :$GPA2 += 1.0 * $c10 ;break;
    case 'F' :$GPA2 += 0.0 * $c10 ;break;
    default:break;
    
}
switch($s12){
    case 'A+':$GPA2 += 4.3 * $c11;break;
    case 'A':$GPA2 += 4.0 * $c11;break;
    case 'A-':$GPA2 += 3.67 * $c11;break;
    case 'B+':$GPA2 += 3.3 * $c11;break;
    case 'B':$GPA2 +=  3.0 * $c11;break;
    case 'B-':$GPA2 += 2.67 * $c11;break;
    case 'C+':$GPA2 += 2.33 * $c11;break;
    case 'C':$GPA2 += 2.0 * $c11;break;
    case 'D' :$GPA2 += 1.0 * $c11 ;break;
    case 'F' :$GPA2 += 0.0 * $c11 ;break;
    default:break;
    
}
$sum = $c0 + $c1 + $c2 + $c4 + $c5 +$c6 + $c7 + $c8 + $c9 + $c10 + $c11;
return number_format($GPA2/$sum,2);
}
function GPA3($s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8,$s9,$s10,$s11,$s12,$m,$con){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $c6 = 0;
    $c7 = 0;
    $c8 = 0;
    $c9 = 0;
    $c10 = 0;
    $c11 = 0;
    $GPA3 = 0;

    if( $m == 'CS'){
        $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CS'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-3001'];
            $c1 = $row['CST-3011'];
            $c2 = $row['CST-3021'];
            $c3 = $row['CST-3031'];
            $c4 = $row['CST-3041'];
            $c5 = $row['CST-3041'];
            $c6 = $row['E-3002'];
            $c7 = $row['CST-3012'];
            $c8 = $row['CST-3022'];
            $c9 = $row['CST-3032'];
            $c10 = $row['CST-3042'];
            $c11= $row['CST-3042'];
        }
    }
    else{
        $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CT'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-3001'];
            $c1 = $row['CST-3011'];
            $c2 = $row['CST-3021'];
            $c3 = $row['CST-3031'];
            $c4 = $row['CST-3041'];
            $c5 = $row['CST-3041'];
            $c6 = $row['E-3002'];
            $c7 = $row['CST-3012'];
            $c8 = $row['CST-3022'];
            $c9 = $row['CST-3032'];
            $c10 = $row['CST-3042'];
            $c11= $row['CST-3042'];
        }
    
    }
        switch($s1){
            case 'A+':$GPA3 += 4.3 * $c0;break;
            case 'A':$GPA3 += 4.0 * $c0;break;
            case 'A-':$GPA3 += 3.67 * $c0;break;
            case 'B+':$GPA3 += 3.3 * $c0;break;
            case 'B':$GPA3 +=  3.0 * $c0;break;
            case 'B-':$GPA3 += 2.67 * $c0;break;
            case 'C+':$GPA3 += 2.333 * $c0;break;
            case 'C':$GPA3 += 2.0 * $c0;break;
            case 'D' :$GPA3 += 1.0 * $c0 ;break;
            case 'F' :$GPA3 += 0.0 * $c0 ;break;
            default:break;
        }
        switch($s2){
            case 'A+':$GPA3 += 4.3 * $c1;break;
            case 'A':$GPA3 += 4.0 * $c1;break;
            case 'A-':$GPA3 += 3.67 * $c1;break;
            case 'B+':$GPA3 += 3.3 * $c1;break;
            case 'B':$GPA3 +=  3.0 * $c1;break;
            case 'B-':$GPA3 += 2.67 * $c1;break;
            case 'C+':$GPA3 += 2.333 * $c1;break;
            case 'C':$GPA3 += 2.0 * $c1;break;
            case 'D' :$GPA3 += 1.0 * $c1 ;break;
            case 'F' :$GPA3 += 0.0 * $c1 ;break;
            default:break;
        }
        switch($s3){
            case 'A+':$GPA3 += 4.3 * $c2;break;
            case 'A':$GPA3 += 4.0 * $c2;break;
            case 'A-':$GPA3 += 3.67 * $c2;break;
            case 'B+':$GPA3 += 3.3 * $c2;break;
            case 'B':$GPA3 +=  3.0 * $c2;break;
            case 'B-':$GPA3 += 2.67 * $c2;break;
            case 'C+':$GPA3 += 2.333 * $c2;break;
            case 'C':$GPA3 += 2.0 * $c2;break;
            case 'D' :$GPA3 += 1.0 * $c2 ;break;
            case 'F' :$GPA3 += 0.0 * $c2 ;break;
            default:break;
        }
        switch($s4){
            case 'A+':$GPA3 += 4.3 * $c3;break;
            case 'A':$GPA3 += 4.0 * $c3;break;
            case 'A-':$GPA3 += 3.67 * $c3;break;
            case 'B+':$GPA3 += 3.3 * $c3;break;
            case 'B':$GPA3 +=  3.0 * $c3;break;
            case 'B-':$GPA3 += 2.67 * $c3;break;
            case 'C+':$GPA3 += 2.333 * $c3;break;
            case 'C':$GPA3 += 2.0 * $c3;break;
            case 'D' :$GPA3 += 1.0 * $c3 ;break;
            case 'F' :$GPA3 += 0.0 * $c3 ;break;
            default:break;
        }
        switch($s5){
            case 'A+':$GPA3 += 4.3 * $c4;break;
            case 'A':$GPA3 += 4.0 * $c4;break;
            case 'A-':$GPA3 += 3.67 * $c4;break;
            case 'B+':$GPA3 += 3.3 * $c4;break;
            case 'B':$GPA3 +=  3.0 * $c4;break;
            case 'B-':$GPA3 += 2.67 * $c4;break;
            case 'C+':$GPA3 += 2.333 * $c4;break;
            case 'C':$GPA3 += 2.0 * $c4;break;
            case 'D' :$GPA3 += 1.0 * $c4 ;break;
            case 'F' :$GPA3 += 0.0 * $c4 ;break;
            default:break;
        }
        switch($s6){
            case 'A+':$GPA3 += 4.3 * $c5;break;
            case 'A':$GPA3 += 4.0 * $c5;break;
            case 'A-':$GPA3 += 3.67 * $c5;break;
            case 'B+':$GPA3 += 3.3 * $c5;break;
            case 'B':$GPA3 +=  3.0 * $c5;break;
            case 'B-':$GPA3 += 2.67 * $c5;break;
            case 'C+':$GPA3 += 2.333 * $c5;break;
            case 'C':$GPA3 += 2.0 * $c5;break;
            case 'D' :$GPA3 += 1.0 * $c5 ;break;
            case 'F' :$GPA3 += 0.0 * $c5 ;break;
            default:break;
        }
        
        switch($s7){
            case 'A+':$GPA3 += 4.3 * $c6;break;
            case 'A':$GPA3 += 4.0 * $c6;break;
            case 'A-':$GPA3 += 3.67 * $c6;break;
            case 'B+':$GPA3 += 3.3 * $c6;break;
            case 'B':$GPA3 +=  3.0 * $c6;break;
            case 'B-':$GPA3 += 2.67 * $c6;break;
            case 'C+':$GPA3 += 2.333 * $c6;break;
            case 'C':$GPA3 += 2.0 * $c6;break;
            case 'D' :$GPA3 += 1.0 * $c6 ;break;
            case 'F' :$GPA3 += 0.0 * $c6 ;break;
            default:break;
        }
        switch($s8){
            case 'A+':$GPA3 += 4.3 * $c7;break;
            case 'A':$GPA3 += 4.0 * $c7;break;
            case 'A-':$GPA3 += 3.67 * $c7;break;
            case 'B+':$GPA3 += 3.3 * $c7;break;
            case 'B':$GPA3 +=  3.0 * $c7;break;
            case 'B-':$GPA3 += 2.67 * $c7;break;
            case 'C+':$GPA3 += 2.333 * $c7;break;
            case 'C':$GPA3 += 2.0 * $c7;break;
            case 'D' :$GPA3 += 1.0 * $c7 ;break;
            case 'F' :$GPA3 += 0.0 * $c7 ;break;
            default:break;
        }
        switch($s9){
            case 'A+':$GPA3 += 4.3 * $c8;break;
            case 'A':$GPA3 += 4.0 * $c8;break;
            case 'A-':$GPA3 += 3.67 * $c8;break;
            case 'B+':$GPA3 += 3.3 * $c8;break;
            case 'B':$GPA3 +=  3.0 * $c8;break;
            case 'B-':$GPA3 += 2.67 * $c8;break;
            case 'C+':$GPA3 += 2.333 * $c8;break;
            case 'C':$GPA3 += 2.0 * $c8;break;
            case 'D' :$GPA3 += 1.0 * $c8 ;break;
            case 'F' :$GPA3 += 0.0 * $c8 ;break;
            default:break;
        }
        switch($s10){
            case 'A+':$GPA3 += 4.3 * $c9;break;
            case 'A':$GPA3 += 4.0 * $c9;break;
            case 'A-':$GPA3 += 3.67 * $c9;break;
            case 'B+':$GPA3 += 3.3 * $c9;break;
            case 'B':$GPA3 +=  3.0 * $c9;break;
            case 'B-':$GPA3 += 2.67 * $c9;break;
            case 'C+':$GPA3 += 2.333 * $c9;break;
            case 'C':$GPA3 += 2.0 * $c9;break;
            case 'D' :$GPA3 += 1.0 * $c9 ;break;
            case 'F' :$GPA3 += 0.0 * $c9 ;break;
            default:break;
        }
        switch($s11){
            case 'A+':$GPA3 += 4.3 * $c10;break;
            case 'A':$GPA3 += 4.0 * $c10;break;
            case 'A-':$GPA3 += 3.67 * $c10;break;
            case 'B+':$GPA3 += 3.3 * $c10;break;
            case 'B':$GPA3 +=  3.0 * $c10;break;
            case 'B-':$GPA3 += 2.67 * $c10;break;
            case 'C+':$GPA3 += 2.333 * $c10;break;
            case 'C':$GPA3 += 2.0 * $c10;break;
            case 'D' :$GPA3 += 1.0 * $c10 ;break;
            case 'F' :$GPA3 += 0.0 * $c10 ;break;
            default:break;
        }
        switch($s12){
            case 'A+':$GPA3 += 4.3 * $c11;break;
            case 'A':$GPA3 += 4.0 * $c11;break;
            case 'A-':$GPA3 += 3.67 * $c11;break;
            case 'B+':$GPA3 += 3.3 * $c11;break;
            case 'B':$GPA3 +=  3.0 * $c11;break;
            case 'B-':$GPA3 += 2.67 * $c11;break;
            case 'C+':$GPA3 += 2.333 * $c11;break;
            case 'C':$GPA3 += 2.0 * $c11;break;
            case 'D' :$GPA3 += 1.0 * $c11 ;break;
            case 'F' :$GPA3 += 0.0 * $c11 ;break;
            default:break;
        }

    $sum = $c0 + $c1 + $c2 + $c4 + $c5 + $c6 + $c7 + $c8 + $c9 + $c10 + $c11 ;
    return number_format($GPA3/$sum,2);
}
$f1 = "SELECT * FROM 'first_sm'";
$r1 = mysqli_query($con,$f1);
$f2 = "SELECT * FROM 'second_sm'";
$r2 = mysqli_query($con,$f2);
$f3 = "SELECT * FROM 'third_sm'";
$r3 = mysqli_query($con,$f3);
if(isset($_POST['insertfirst'])){
    if(date('Y-m-d h-i-sa') >= $realtime1 && date('Y-m-d h-i-sa') <= $realtime2){
    $firstok = true;
    $fid = $_POST['fid'];
    $fname = $_POST['fname'];
 $m1 = $_POST['m1'];
 $e1 = $_POST['e1'];
 $p1 = $_POST['p1'];
 $f011 = $_POST['f011'];
 $f021 = $_POST['f021'];
 $f031 = $_POST['f031'];
 $m2 = $_POST['m2'];
 $e2 = $_POST['e2'];
 $p2 = $_POST['p2'];
 $f012 = $_POST['f012'];
 $f022 = $_POST['f022'];
 $f032 = $_POST['f032'];
 $fgpa = GPA1($m1,$e1,$p1,$f011,$f021,$f031,$m2,$e2,$p2,$f012,$f022,$f032,$con);
 $fmaj = $_POST['fmajor'];

if(empty($fid) || empty($fname)){
    $firstok = false;
   
}
else{
    if(!preg_match("/[0-9]/",$fid) || !preg_match("/[a-zA-Z]/",$fname)){
        $firstok = false;
       
    }
}
if($firstok){
        $fsql = "INSERT INTO `first_sm`(`St_ID`, `St_Name`, `M-100`, `E-100`, `P-100`, `CST-101`, `CST-102`, `CST-103`, `M-1002`, `E-1002`, `P-1002`, `CST-1012`, `CST-1022`, `CST-1032`, `GPA`, `Major`) VALUES 
        ('$fid','$fname','$m1','$e1','$p1','$f011','$f021','$f031','$m2','$e2','$p2','$f012','$f022','$f032','$fgpa','$fmaj')";
    $result = mysqli_query($con,$fsql);
if($result){
    
    $insertinfo = 'You data to first year special semester result table have inserted';
}
else {
    $insertinfo = 'You Can\'t insert the Data that already Exist';
   
}
}else{
    $insertinfo = 'Invalid Input Or Empty Value or Your Input is already exist';
}
  $delet = "DELETE FROM `first_sm` WHERE St_ID = ''";
  mysqli_query($con,$delet);
}else{
    $insertinfo = 'You don\'t have permission to insert data';
}
}

if(isset($_POST['insertsecond'])){
   if(date('Y-m-d h-i-sa') >= $realtime1 && date('Y-m-d h-i-sa') <= $realtime2){
    $secondok = true;
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $se1 = $_POST['se1'];
    $s011 = $_POST['s011'];
    $s021 = $_POST['s021'];
    $s031 = $_POST['s031'];
    $s041 = $_POST['s041'];
    $s051 = $_POST['s051'];

    $se2 = $_POST['se2'];
    $s012 = $_POST['s012'];
    $s022 = $_POST['s022'];
    $s032 = $_POST['s032'];
    $s042 = $_POST['s042'];
    $s052 = $_POST['s052'];
    $smaj = $_POST['smajor'];
    $sgpa = GPA2($se1,$s011,$s021,$s031,$s041,$s051,$se2,$s012,$s022,$s032,$s042,$s052,$smaj,$con);
   
    if(empty($sid) || empty($sname)){
        $secondok = false;
       
    }
    else{
        if(!preg_match("/[0-9]/",$sid) || !preg_match("/[a-zA-Z]/",$sname)){
            $secondok = false;
           
        }
    }

    if($secondok){

    $sql = "INSERT INTO `second_sm`(`St_ID`, `St_Name`, `E-2001`, `CST-2011`, `CST-2021`, `CST-2031`, `CST-2041`, `CST-2051`, `E-2002`, `CST-2012`, `CST-2022`, `CST-2032`, `CST-2042`, `CST-2052`, `GPA`, `Major`) VALUES
    ('$sid','$sname','$se1','$s011','$s021','$s031','$s041','$s051','$se2','$s012','$s022','$s032','$s042','$s052','$sgpa','$smaj')";
    $result = mysqli_query($con,$sql);
        if($result){
    
         $insertinfo = 'You data to second year special semester result table have inserted';
            }
        else{
        $insertinfo = 'You Can\'t insert the Data that already Exist';
        }
    }else{
        $insertinfo = 'Invalid Input or Data Type';
    }
  $delet = "DELETE FROM `second_sm` WHERE St_ID = ''";
  mysqli_query($con,$delet);
}else{
    $insertinfo = 'You don\'t have permision to insert result data';
}

}

if(isset($_POST['insertthird'])){
   if(date('Y-m-d h-i-sa') >=  $realtime1 && date('Y-m-d h-i-sa') <= $realtime2){
    $thirdok =true;
    $tid = $_POST['tid'];
    $tname = $_POST['tname'];
    $te1 = $_POST['te1'];
    $t011 = $_POST['t011'];
    $t021 = $_POST['t021'];
    $t031 = $_POST['t031'];
    $t041 = $_POST['t041'];
    $t051 = $_POST['t051'];

    $te2 = $_POST['te2'];
    $t012 = $_POST['t012'];
    $t022 = $_POST['t022'];
    $t032 = $_POST['t032'];
    $t042 = $_POST['t042'];
    $t052 = $_POST['t052'];
    $tmaj = $_POST['tmajor'];
    $tgpa = GPA3($te1,$t011,$t021,$t031,$t041,$t051,$te2,$t012,$t022,$t032,$t042,$t052,$tmaj,$con);
   
    if(empty($tid) || empty($tname)){
        $thirdok = false;
       
    }
    else{
        if(!preg_match("/[0-9]/",$tid) || !preg_match("/[a-zA-Z]/",$tname)){
            $thirdok = false;
           
        }
    }
    if($thirdok){
    $sql = " INSERT INTO `third_sm`(`St_ID`, `St_Name`, `E-3001`, `CST-3011`, `CST-3021`, `CST-3031`, `CST-3041`, `CST-3051`, `E-3002`, `CST-3012`, `CST-3022`, `CST-3032`, `CST-3042`, `CST-3052`, `GPA`, `Major`)
    VALUES ('$tid','$tname','$te1','$t011','$t021','$t031','$t041','$t051','$te2','$t012','$t022','$t032','$t042','$t052','$tgpa','$tmaj')";
    $result = mysqli_query($con,$sql);

    if($result){
        
        $insertinfo = 'You data to third year special semester result table have inserted';
    }
    else {
      $insertinfo = 'You Can\'t insert the Data that already Exist';
    }
}else{
    $insertinfo = 'Invalid Input Or Data Type or Data already exist!';
}
      $delet = "DELETE FROM `third_sm` WHERE St_ID = ''";
      mysqli_query($con,$delet);
}else{
    $insertinfo = 'You don\'t have permission to insert result data';
}

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>                                        
<title>Online Student Exam Result System</title> 
<link rel = "stylesheet" href="mypage.css">   
<style>
    body{

   background-image:url(h4.jpg);
    background-repeat:repeat-y;
    background-size:100% 500%;
    }
</style>
</head>
<body>
        <div id = "wrapper">
            <div id = "ose"><div id = "space"></div>
                <div id = "oserbackend"><h1 style = "text-align:center">Welcom From OSERS BACKEND Data Inserting</h2></div>
                    
        <div id= "insertheader">
        <p style = "text-align:center"> <strong>Make You Table Selection You Want To Insert</strong></p>
        <div id = "insertchoicepane">
 <form action = "studentinsert.php" method = "post">

                    <input type="submit" name ="student" value = "INSERT STUDENTS"/>
                    <input type="submit" name ="S_I" value = "Semster I Result"/>
                    <input type="submit" name ="S_II" value = "Semster II Result"/>
                    <input type="submit" name ="Special" value = "Special Semester"/>
                    <input type="submit" name ="back" value = "BackToHome"/>
                    <div id="insertinfo"><h3><?php echo $insertinfo;?><h3></div>
        
</form>

        </div><hr/>
        <div id="showinsertpane">   
            <div id="studentchoice">
                <form action="SpecialR.php" method="post">
                <label><strong>Choose The Student's Result Table</strong></label>
            </div>
            <div id="studetinsertpane">
            <table border= "0" align= "center" width = "100%" cellspacing="0" cellpadding="10" background-color="white">
            <caption align ="center"><strong>First Year Special Semester Result</caption>
            <tr><th>ID</th><th>Name</th><th>M-1001</th><th>E-1001</th><th>P-1001</th><th>1011</th><th>1021</th><th>1031</th><th>M-1002</th><th>E-1002</th><th>P-1002</th><th>1012</th><th>1022</th><th>1032</th><th>Major</th></tr>
            <tr align = "center"><th><input type="text" name="fid" placeholder="0000" maxlength="4" size = "5"></td><td>
            <input type="text" name="fname" placeholder="Student name" maxlength="30" max="30" size="15"></td>
            <td><select name = "m1">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "e1">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "p1">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "f011">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "f021">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "f031">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "m2">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "e2">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "p2">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "f012">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "f022">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "f032">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

            <td><select name = "fmajor">
                <option selected = "selected">CST </option>
            </select> </td>
            <td><input type ="submit" name ="insertfirst" value= "Insert Student Info"  onclick = "return confirm('Are you sure to Insert  Data!')"/></td><tr>
            </table>

            <hr/>
            <table border= "0" align= "center" width = "100%" cellspacing="0" cellpadding="10" background-color="white">
            <caption align ="center"><strong>Second Year Special Semester Result</caption>
            <tr><th>ID</th><th>Name</th><th>E2001</th><th>2011</th><th>2021</th><th>2031</th><th>2041</th><th>2051</th><th>E-2002</th><th>2012</th><th>2022</th><th>2032</th><th>2042</th><th>2052</th><th>GPA</th></tr>
            <tr align = "center"><th><input type="text" name="sid" placeholder="0000" maxlength="4" size = "5"></td><td>
            <input type="text" name="sname" placeholder="Student name" maxlength="30" max="30" size="15"></td>
            <td><select name = "se1">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "s011">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s021">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s031">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s041">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s051">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "se2">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "s012">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s022">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s032">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s042">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "s052">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "smajor">
                <option selected = "selected">CS</option>
                <option>CT</option>
            </select> </td>
          
              <td><input type ="submit" name ="insertsecond" value= "Insert Student Info" onclick = "return confirm('Are you sure to Insert All Data!')"/></td></tr>
           </table>
           <hr/>
           <table border= "0" align= "center" width = "100%" cellspacing="0" cellpadding="10" background-color="white">
            <caption align ="center"><strong>Third Year Special Semester Result</caption>
            <tr><th>ID</th><th>Name</th><th>E3001</th><th>3011</th><th>3021</th><th>3031</th><th>3041</th><th>3051</th><th>E-3002</th><th>3012</th><th>3022</th><th>3032</th><th>3042</th><th>3052</th><th>Major</th></tr>
            <tr align = "center"><th><input type="text" name="tid" placeholder="0000" maxlength="4" size = "5"></td><td>
            <input type="text" name="tname" placeholder="Student name" maxlength="30" max="30" size="15"></td>
            <td><select name = "te1">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "t011">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t021">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t031">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t041">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t051">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "te2">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "t012">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t022">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t032">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t042">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>

<td><select name = "t052">
<option selected = "selected">A+</option>
<option>A</option>
<option>A-</option>
<option>B+</option>
<option>B</option>
<option>B-</option>
<option>C+</option>
<option>C</option>
<option>D</option>
<option>F</option>
<option>-</option>
</select></td>
<td><select name = "tmajor">
<option selected = "selected">CS</option>
<option>CT</option>
            </select> </td>

              <td><input type ="submit" name ="insertthird" value= "Insert Student Info" onclick = "return confirm('Are you sure to Insert All Data!')"/></td></tr>
           </table><hr/>
              </form>
            </div>
        </div>
                </div>
        </div>  
        
            </div>
</body>
</html>
