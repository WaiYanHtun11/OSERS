<?php  
session_start();
$con = mysqli_connect("localhost","root","","osers");
if(!$con){
    die('Could not connect:'.mysqli_error());
}
mysqli_select_db($con,"osers");
$studentid = $_SESSION["pass"];
$Major = '';
$GPA1 = 0;
$GPA2 = 0;
$CGBA = 0;
$sum = 0;
$Total = 0;
$myCGBA = 0;
$realCGBA = 0;
function catchgpa1($GPA1){
    return $GPA1;
}
function catchgpa2($GPA2){
    return $GPA2;
}
function CGBA($GPA,$y,$major){
    if($y == 'First_Year' && $major = "CST"){
   return $GPA/39; 
    }
    elseif($y == 'Second_Year' && $major = 'CS'){
        return $GPA/37;
    }
    elseif($y == 'Second_Year' && $major = 'CT'){
        return $GPA/38;
    }
    elseif($y == 'Third_Year' && $major = 'CS'){
        return $GPA/36;
    }
    elseif($y == 'Third_Year' && $major = 'CT'){
        return $GPA/37;
    }else{
        echo '';
    }
}
function firstSI($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$con,$GPA1,$CGBA,$sum,$Major){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $sql = "SELECT * FROM `firstcredit`";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['M-1001'];
        $c1 = $row['E-1001'];
        $c2 = $row['P-1001'];
        $c3 = $row['CST-1011'];
        $c4 = $row['CST-1021'];
        $c5 = $row['CST-1031'];
    }
    switch($sub1){
        case 'A+':$GPA1 += 4.3 * $c0;break;
        case 'A':$GPA1 += 4.0 * $c0;break;
        case 'A-':$GPA1 += 3.67 * $c0;break;
        case 'B+':$GPA1 += 3.3 * $c0;break;
        case 'B':$GPA1 +=  3.0 * $c0;break;
        case 'B-':$GPA1 += 2.67 * $c0;break;
        case 'C+':$GPA1 += 2.333 * $c0;break;
        case 'C':$GPA1 += 2.0 * $c0;break;
        case 'D' :$GPA1 += 1.0 * $c0 ;break;
        case 'F' :$GPA1 += 0.0 * $c0 ;break;
        default:break;
    }
    switch($sub2){
        case 'A+':$GPA1 += 4.3 * $c1;break;
        case 'A':$GPA1 += 4.0 * $c1;break;
        case 'A-':$GPA1 += 3.67 * $c1;break;
        case 'B+':$GPA1 += 3.3 * $c1;break;
        case 'B':$GPA1 +=  3.0 * $c1;break;
        case 'B-':$GPA1 += 2.67 * $c1;break;
        case 'C+':$GPA1 += 2.63 * $c1;break;
        case 'C':$GPA1 += 2.0 * $c1;break;
        case 'D' :$GPA1 += 1.0 * $c1 ;break;
        case 'F' :$GPA1 += 0.0 * $c1 ;break;
        default:break;
    }
    switch($sub3){
        case 'A+':$GPA1 += 4.3 * $c2;break;
        case 'A':$GPA1 += 4.0 * $c2;break;
        case 'A-':$GPA1 += 3.67 * $c2;break;
        case 'B+':$GPA1 += 3.3 * $c2;break;
        case 'B':$GPA1 +=  3.0 * $c2;break;
        case 'B-':$GPA1 += 2.67 * $c2;break;
        case 'C+':$GPA1 += 2.333 * $c2;break;
        case 'C':$GPA1 += 2.0 * $c2;break;
        case 'D' :$GPA1 += 1.0 * $c2 ;break;
        case 'F' :$GPA1 += 0.0 * $c2 ;break;
        default:break;
    }
    switch($sub4){
        case 'A+':$GPA1 += 4.3 * $c3;break;
        case 'A':$GPA1 += 4.0 * $c3;break;
        case 'A-':$GPA1 += 3.67 * $c3;break;
        case 'B+':$GPA1 += 3.3 * $c3;break;
        case 'B':$GPA1 +=  3.0 * $c3;break;
        case 'B-':$GPA1 += 2.67 * $c3;break;
        case 'C+':$GPA1 += 2.333 * $c3;break;
        case 'C':$GPA1 += 2.0 * $c3;break;
        case 'D' :$GPA1 += 1.0 * $c3 ;break;
        case 'F' :$GPA1 += 0.0 * $c3 ;break;
        default:break;
    }
    switch($sub5){
        case 'A+':$GPA1 += 4.3 * $c4;break;
        case 'A':$GPA1 += 4.0 * $c4;break;
        case 'A-':$GPA1 += 3.67 * $c4;break;
        case 'B+':$GPA1 += 3.3 * $c4;break;
        case 'B':$GPA1 +=  3.0 * $c4;break;
        case 'B-':$GPA1 += 2.67 * $c4;break;
        case 'C+':$GPA1 += 2.336 * $c4;break;
        case 'C':$GPA1 += 2.0 * $c4;break;
        case 'D' :$GPA1 += 1.0 * $c4 ;break;
        case 'F' :$GPA1 += 0.0 * $c4 ;break;
        default:break;
    }
    switch($sub6){
        case 'A+':$GPA1 += 4.3 * $c5;break;
        case 'A':$GPA1 += 4.0 * $c5;break;
        case 'A-':$GPA1 += 3.67 * $c5;break;
        case 'B+':$GPA1 += 3.3 * $c5;break;
        case 'B':$GPA1 +=  3.0 * $c5;break;
        case 'B-':$GPA1 += 2.67 * $c5;break;
        case 'C+':$GPA1 += 2.63 * $c5;break;
        case 'C':$GPA1 += 2.0 * $c5;break;
        case 'D' :$GPA1 += 1.0 * $c5 ;break;
        case 'F' :$GPA1 += 0.0 * $c5 ;break;
        default:break;
    }
        catchgpa1($GPA1);
        $sum += CGBA($GPA1,$_SESSION["year"],$Major);
  return $sum;
   
}
function firstSII($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$con,$GPA2,$CGBA,$sum,$Major){
    $GPA = 0;
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $sql = "SELECT * FROM `firstcredit`";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['M-1002'];
        $c1 = $row['E-1002'];
        $c2 = $row['P-1002'];
        $c3 = $row['CST-1012'];
        $c4 = $row['CST-1022'];
        $c5 = $row['CST-1032'];
    }
    switch($sub1){
        case 'A+':$GPA2 += 4.3 * $c0;break;
        case 'A':$GPA2 += 4.0 * $c0;break;
        case 'A-':$GPA2 += 3.67 * $c0;break;
        case 'B+':$GPA2 += 3.3 * $c0;break;
        case 'B':$GPA2 +=  3.0 * $c0;break;
        case 'B-':$GPA2 += 2.67 * $c0;break;
        case 'C+':$GPA2 += 2.333 * $c0;break;
        case 'C':$GPA2 += 2.0 * $c0;break;
        case 'D' :$GPA2 += 1.0 * $c0 ;break;
        case 'F' :$GPA2 += 0.0 * $c0 ;break;
        default:break;
    }
    switch($sub2){
        case 'A+':$GPA2 += 4.3 * $c1;break;
        case 'A':$GPA2 += 4.0 * $c1;break;
        case 'A-':$GPA2 += 3.67 * $c1;break;
        case 'B+':$GPA2 += 3.3 * $c1;break;
        case 'B':$GPA2 +=  3.0 * $c1;break;
        case 'B-':$GPA2 += 2.67 * $c1;break;
        case 'C+':$GPA2 += 2.333 * $c1;break;
        case 'C':$GPA2 += 2.0 * $c1;break;
        case 'D' :$GPA2 += 1.0 * $c1 ;break;
        case 'F' :$GPA2 += 0.0 * $c1 ;break;
        default:break;
    }
    switch($sub3){
        case 'A+':$GPA2+= 4.3 * $c2;break;
        case 'A':$GPA2 += 4.0 * $c2;break;
        case 'A-':$GPA2 += 3.67 * $c2;break;
        case 'B+':$GPA2 += 3.3 * $c2;break;
        case 'B':$GPA2 +=  3.0 * $c2;break;
        case 'B-':$GPA2 += 2.67 * $c2;break;
        case 'C+':$GPA2 += 2.333 * $c2;break;
        case 'C':$GPA2 += 2.0 * $c2;break;
        case 'D' :$GPA2 += 1.0 * $c2 ;break;
        case 'F' :$GPA2 += 0.0 * $c2 ;break;
        default:break;
    }
    switch($sub4){
        case 'A+':$GPA2 += 4.3 * $c3;break;
        case 'A':$GPA2 += 4.0 * $c3;break;
        case 'A-':$GPA2 += 3.67 * $c3;break;
        case 'B+':$GPA2 += 3.3 * $c3;break;
        case 'B':$GPA2 +=  3.0 * $c3;break;
        case 'B-':$GPA2 += 2.67 * $c3;break;
        case 'C+':$GPA2 += 2.333 * $c3;break;
        case 'C':$GPA2 += 2.0 * $c3;break;
        case 'D' :$GPA2 += 1.0 * $c3 ;break;
        case 'F' :$GPA2 += 0.0 * $c3 ;break;
        default:break;
    }
    switch($sub5){
        case 'A+':$GPA2 += 4.3 * $c4;break;
        case 'A':$GPA2 += 4.0 * $c4;break;
        case 'A-':$GPA2 += 3.67 * $c4;break;
        case 'B+':$GPA2 += 3.3 * $c4;break;
        case 'B':$GPA2 +=  3.0 * $c4;break;
        case 'B-':$GPA2 += 2.67 * $c4;break;
        case 'C+':$GPA2 += 2.333 * $c4;break;
        case 'C':$GPA2 += 2.0 * $c4;break;
        case 'D' :$GPA2 += 1.0 * $c4 ;break;
        case 'F' :$GPA2 += 0.0 * $c4 ;break;
        default:break;
    }
    switch($sub6){
        case 'A+':$GPA2 += 4.3 * $c5;break;
        case 'A':$GPA2 += 4.0 * $c5;break;
        case 'A-':$GPA2 += 3.67 * $c5;break;
        case 'B+':$GPA2 += 3.3 * $c5;break;
        case 'B':$GPA2 +=  3.0 * $c5;break;
        case 'B-':$GPA2 += 2.67 * $c5;break;
        case 'C+':$GPA2 += 2.333 * $c5;break;
        case 'C':$GPA2 += 2.0 * $c5;break;
        case 'D' :$GPA2 += 1.0 * $c5 ;break;
        case 'F' :$GPA2 += 0.0 * $c5 ;break;
        default:break;
    }
    catchgpa2($GPA2);
  $sum += CGBA($GPA2,$_SESSION["year"] ,$Major);
  return $sum;

}
function secondSI($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$con,$GPA1,$CGBA,$sum,$Major){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    if( $Major=='CS'){
    $sql = "SELECT * FROM `secondcredit` WHERE  `Major` = 'CS' ";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['E-2001'];
        $c1 = $row['CST-2011'];
        $c2 = $row['CST-2021'];
        $c3 = $row['CST-2031'];
        $c4 = $row['CST-2041'];
        $c5 = $row['CST-2041'];
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
        $c5 = $row['CST-2041'];
    }

}
    switch($sub1){
        case 'A+':$GPA1 += 4.3 * $c0;break;
        case 'A':$GPA1 += 4.0 * $c0;break;
        case 'A-':$GPA1 += 3.67 * $c0;break;
        case 'B+':$GPA1 += 3.3 * $c0;break;
        case 'B':$GPA1 +=  3.0 * $c0;break;
        case 'B-':$GPA1 += 2.67 * $c0;break;
        case 'C+':$GPA1 += 2.333 * $c0;break;
        case 'C':$GPA1 += 2.0 * $c0;break;
        case 'D' :$GPA1 += 1.0 * $c0 ;break;
        case 'F' :$GPA1 += 0.0 * $c0 ;break;
        default:break;
    }
    switch($sub2){
        case 'A+':$GPA1 += 4.3 * $c1;break;
        case 'A':$GPA1 += 4.0 * $c1;break;
        case 'A-':$GPA1 += 3.67 * $c1;break;
        case 'B+':$GPA1 += 3.3 * $c1;break;
        case 'B':$GPA1 +=  3.0 * $c1;break;
        case 'B-':$GPA1 += 2.67 * $c1;break;
        case 'C+':$GPA1 += 2.333 * $c1;break;
        case 'C':$GPA1 += 2.0 * $c1;break;
        case 'D' :$GPA1 += 1.0 * $c1 ;break;
        case 'F' :$GPA1 += 0.0 * $c1 ;break;
        default:break;
    }
    switch($sub3){
        case 'A+':$GPA1 += 4.3 * $c2;break;
        case 'A':$GPA1 += 4.0 * $c2;break;
        case 'A-':$GPA1 += 3.67 * $c2;break;
        case 'B+':$GPA1 += 3.3 * $c2;break;
        case 'B':$GPA1 +=  3.0 * $c2;break;
        case 'B-':$GPA1 += 2.67 * $c2;break;
        case 'C+':$GPA1 += 2.333 * $c2;break;
        case 'C':$GPA1 += 2.0 * $c2;break;
        case 'D' :$GPA1 += 1.0 * $c2 ;break;
        case 'F' :$GPA1 += 0.0 * $c2 ;break;
        default:break;
    }
    switch($sub4){
        case 'A+':$GPA1 += 4.3 * $c3;break;
        case 'A':$GPA1 += 4.0 * $c3;break;
        case 'A-':$GPA1 += 3.67 * $c3;break;
        case 'B+':$GPA1 += 3.3 * $c3;break;
        case 'B':$GPA1 +=  3.0 * $c3;break;
        case 'B-':$GPA1 += 2.67 * $c3;break;
        case 'C+':$GPA1 += 2.333 * $c3;break;
        case 'C':$GPA1 += 2.0 * $c3;break;
        case 'D' :$GPA1 += 1.0 * $c3 ;break;
        case 'F' :$GPA1 += 0.0 * $c3 ;break;
        default:break;
    }
    switch($sub5){
        case 'A+':$GPA1 += 4.3 * $c4;break;
        case 'A':$GPA1 += 4.0 * $c4;break;
        case 'A-':$GPA1 += 3.67 * $c4;break;
        case 'B+':$GPA1 += 3.3 * $c4;break;
        case 'B':$GPA1 +=  3.0 * $c4;break;
        case 'B-':$GPA1 += 2.67 * $c4;break;
        case 'C+':$GPA1 += 2.333 * $c4;break;
        case 'C':$GPA1 += 2.0 * $c4;break;
        case 'D' :$GPA1 += 1.0 * $c4 ;break;
        case 'F' :$GPA1 += 0.0 * $c4 ;break;
        default:break;
    }
    switch($sub6){
        case 'A+':$GPA1 += 4.3 * $c5;break;
        case 'A':$GPA1 += 4.0 * $c5;break;
        case 'A-':$GPA1 += 3.67 * $c5;break;
        case 'B+':$GPA1 += 3.3 * $c5;break;
        case 'B':$GPA1 +=  3.0 * $c5;break;
        case 'B-':$GPA1 += 2.67 * $c5;break;
        case 'C+':$GPA1 += 2.333 * $c5;break;
        case 'C':$GPA1 += 2.0 * $c5;break;
        case 'D' :$GPA1 += 1.0 * $c5 ;break;
        case 'F' :$GPA1 += 0.0 * $c5 ;break;
        default:break;
    }
        catchgpa1($GPA1);
        $sum += CGBA($GPA1,$_SESSION['year'],$Major);
  return $sum;
   
}
function secondSII($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$con,$GPA2,$CGBA,$sum,$Major){
    $GPA = 0;
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    if( $Major=='CS'){
        $sql = "SELECT * FROM `secondcredit` WHERE  `Major` = 'CS' ";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-2002'];
            $c1 = $row['CST-2012'];
            $c2 = $row['CST-2022'];
            $c3 = $row['CST-2032'];
            $c4 = $row['CST-2042'];
            $c5 = $row['CST-2042'];
    }
}else{
    $sql = "SELECT * FROM `secondcredit` WHERE  `Major` = 'CT' ";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['E-2002'];
        $c1 = $row['CST-2012'];
        $c2 = $row['CST-2022'];
        $c3 = $row['CST-2032'];
        $c4 = $row['CST-2042'];
        $c5 = $row['CST-2042'];
}


}
    switch($sub1){
        case 'A+':$GPA2 += 4.3 * $c0;break;
        case 'A':$GPA2 += 4.0 * $c0;break;
        case 'A-':$GPA2 += 3.67 * $c0;break;
        case 'B+':$GPA2 += 3.3 * $c0;break;
        case 'B':$GPA2 +=  3.0 * $c0;break;
        case 'B-':$GPA2 += 2.67 * $c0;break;
        case 'C+':$GPA2 += 2.333 * $c0;break;
        case 'C':$GPA2 += 2.0 * $c0;break;
        case 'D' :$GPA2 += 1.0 * $c0 ;break;
        case 'F' :$GPA2 += 0.0 * $c0 ;break;
        default:break;
    }
    switch($sub2){
        case 'A+':$GPA2 += 4.3 * $c1;break;
        case 'A':$GPA2 += 4.0 * $c1;break;
        case 'A-':$GPA2 += 3.67 * $c1;break;
        case 'B+':$GPA2 += 3.3 * $c1;break;
        case 'B':$GPA2 +=  3.0 * $c1;break;
        case 'B-':$GPA2 += 2.67 * $c1;break;
        case 'C+':$GPA2 += 2.333 * $c1;break;
        case 'C':$GPA2 += 2.0 * $c1;break;
        case 'D' :$GPA2 += 1.0 * $c1 ;break;
        case 'F' :$GPA2 += 0.0 * $c1 ;break;
        default:break;
    }
    switch($sub3){
        case 'A+':$GPA2+= 4.3 * $c2;break;
        case 'A':$GPA2 += 4.0 * $c2;break;
        case 'A-':$GPA2 += 3.67 * $c2;break;
        case 'B+':$GPA2 += 3.3 * $c2;break;
        case 'B':$GPA2 +=  3.0 * $c2;break;
        case 'B-':$GPA2 += 2.67 * $c2;break;
        case 'C+':$GPA2 += 2.333 * $c2;break;
        case 'C':$GPA2 += 2.0 * $c2;break;
        case 'D' :$GPA2 += 1.0 * $c2 ;break;
        case 'F' :$GPA2 += 0.0 * $c2 ;break;
        default:break;
    }
    switch($sub4){
        case 'A+':$GPA2 += 4.3 * $c3;break;
        case 'A':$GPA2 += 4.0 * $c3;break;
        case 'A-':$GPA2 += 3.67 * $c3;break;
        case 'B+':$GPA2 += 3.3 * $c3;break;
        case 'B':$GPA2 +=  3.0 * $c3;break;
        case 'B-':$GPA2 += 2.67 * $c3;break;
        case 'C+':$GPA2 += 2.333 * $c3;break;
        case 'C':$GPA2 += 2.0 * $c3;break;
        case 'D' :$GPA2 += 1.0 * $c3 ;break;
        case 'F' :$GPA2 += 0.0 * $c3 ;break;
        default:break;
    }
    switch($sub5){
        case 'A+':$GPA2 += 4.3 * $c4;break;
        case 'A':$GPA2 += 4.0 * $c4;break;
        case 'A-':$GPA2 += 3.67 * $c4;break;
        case 'B+':$GPA2 += 3.3 * $c4;break;
        case 'B':$GPA2 +=  3.0 * $c4;break;
        case 'B-':$GPA2 += 2.67 * $c4;break;
        case 'C+':$GPA2 += 2.333 * $c4;break;
        case 'C':$GPA2 += 2.0 * $c4;break;
        case 'D' :$GPA2 += 1.0 * $c4 ;break;
        case 'F' :$GPA2 += 0.0 * $c4 ;break;
        default:break;
    }
    switch($sub6){
        case 'A+':$GPA2 += 4.3 * $c5;break;
        case 'A':$GPA2 += 4.0 * $c5;break;
        case 'A-':$GPA2 += 3.67 * $c5;break;
        case 'B+':$GPA2 += 3.3 * $c5;break;
        case 'B':$GPA2 +=  3.0 * $c5;break;
        case 'B-':$GPA2 += 2.67 * $c5;break;
        case 'C+':$GPA2 += 2.333 * $c5;break;
        case 'C':$GPA2 += 2.0 * $c5;break;
        case 'D' :$GPA2 += 1.0 * $c5 ;break;
        case 'F' :$GPA2 += 0.0 * $c5 ;break;
        default:break;
    }
    catchgpa2($GPA2);
  $sum += CGBA($GPA2,$_SESSION["year"] ,$Major);
  return $sum;

}
function thirdSI($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$con,$GPA1,$CGBA,$sum,$Major){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    if( $Major=='CS'){
    $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CS' ";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['E-3001'];
        $c1 = $row['CST-3011'];
        $c2 = $row['CST-3021'];
        $c3 = $row['CST-3031'];
        $c4 = $row['CST-3041'];
        $c5 = $row['CST-3041'];
    }
}else{
    $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CT' ";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['E-3001'];
        $c1 = $row['CST-3011'];
        $c2 = $row['CST-3021'];
        $c3 = $row['CST-3031'];
        $c4 = $row['CST-3041'];
        $c5 = $row['CST-3041'];
    }

}
    switch($sub1){
        case 'A+':$GPA1 += 4.3 * $c0;break;
        case 'A':$GPA1 += 4.0 * $c0;break;
        case 'A-':$GPA1 += 3.67 * $c0;break;
        case 'B+':$GPA1 += 3.3 * $c0;break;
        case 'B':$GPA1 +=  3.0 * $c0;break;
        case 'B-':$GPA1 += 2.67 * $c0;break;
        case 'C+':$GPA1 += 2.333 * $c0;break;
        case 'C':$GPA1 += 2.0 * $c0;break;
        case 'D' :$GPA1 += 1.0 * $c0 ;break;
        case 'F' :$GPA1 += 0.0 * $c0 ;break;
        default:break;
    }
    switch($sub2){
        case 'A+':$GPA1 += 4.3 * $c1;break;
        case 'A':$GPA1 += 4.0 * $c1;break;
        case 'A-':$GPA1 += 3.67 * $c1;break;
        case 'B+':$GPA1 += 3.3 * $c1;break;
        case 'B':$GPA1 +=  3.0 * $c1;break;
        case 'B-':$GPA1 += 2.67 * $c1;break;
        case 'C+':$GPA1 += 2.333 * $c1;break;
        case 'C':$GPA1 += 2.0 * $c1;break;
        case 'D' :$GPA1 += 1.0 * $c1 ;break;
        case 'F' :$GPA1 += 0.0 * $c1 ;break;
        default:break;
    }
    switch($sub3){
        case 'A+':$GPA1 += 4.3 * $c2;break;
        case 'A':$GPA1 += 4.0 * $c2;break;
        case 'A-':$GPA1 += 3.67 * $c2;break;
        case 'B+':$GPA1 += 3.3 * $c2;break;
        case 'B':$GPA1 +=  3.0 * $c2;break;
        case 'B-':$GPA1 += 2.67 * $c2;break;
        case 'C+':$GPA1 += 2.333 * $c2;break;
        case 'C':$GPA1 += 2.0 * $c2;break;
        case 'D' :$GPA1 += 1.0 * $c2 ;break;
        case 'F' :$GPA1 += 0.0 * $c2 ;break;
        default:break;
    }
    switch($sub4){
        case 'A+':$GPA1 += 4.3 * $c3;break;
        case 'A':$GPA1 += 4.0 * $c3;break;
        case 'A-':$GPA1 += 3.67 * $c3;break;
        case 'B+':$GPA1 += 3.3 * $c3;break;
        case 'B':$GPA1 +=  3.0 * $c3;break;
        case 'B-':$GPA1 += 2.67 * $c3;break;
        case 'C+':$GPA1 += 2.333 * $c3;break;
        case 'C':$GPA1 += 2.0 * $c3;break;
        case 'D' :$GPA1 += 1.0 * $c3 ;break;
        case 'F' :$GPA1 += 0.0 * $c3 ;break;
        default:break;
    }
    switch($sub5){
        case 'A+':$GPA1 += 4.3 * $c4;break;
        case 'A':$GPA1 += 4.0 * $c4;break;
        case 'A-':$GPA1 += 3.67 * $c4;break;
        case 'B+':$GPA1 += 3.3 * $c4;break;
        case 'B':$GPA1 +=  3.0 * $c4;break;
        case 'B-':$GPA1 += 2.67 * $c4;break;
        case 'C+':$GPA1 += 2.333 * $c4;break;
        case 'C':$GPA1 += 2.0 * $c4;break;
        case 'D' :$GPA1 += 1.0 * $c4 ;break;
        case 'F' :$GPA1 += 0.0 * $c4 ;break;
        default:break;
    }
    switch($sub6){
        case 'A+':$GPA1 += 4.3 * $c5;break;
        case 'A':$GPA1 += 4.0 * $c5;break;
        case 'A-':$GPA1 += 3.67 * $c5;break;
        case 'B+':$GPA1 += 3.3 * $c5;break;
        case 'B':$GPA1 +=  3.0 * $c5;break;
        case 'B-':$GPA1 += 2.67 * $c5;break;
        case 'C+':$GPA1 += 2.333 * $c5;break;
        case 'C':$GPA1 += 2.0 * $c5;break;
        case 'D' :$GPA1 += 1.0 * $c5 ;break;
        case 'F' :$GPA1 += 0.0 * $c5 ;break;
        default:break;
    }
        catchgpa1($GPA1);
        $sum += CGBA($GPA1,$_SESSION["year"] ,$Major);
  return $sum;
   
}
function thirdSII($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$con,$GPA2,$CGBA,$sum,$Major){
    $GPA = 0;
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    if( $Major=='CS'){
        $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CS' ";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-3002'];
            $c1 = $row['CST-3012'];
            $c2 = $row['CST-3022'];
            $c3 = $row['CST-3032'];
            $c4 = $row['CST-3042'];
            $c5 = $row['CST-3042'];
    }
}else{
    $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CT' ";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $c0 = $row['E-3002'];
        $c1 = $row['CST-3012'];
        $c2 = $row['CST-3022'];
        $c3 = $row['CST-3032'];
        $c4 = $row['CST-3042'];
        $c5 = $row['CST-3042'];
}


}
    switch($sub1){
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
    switch($sub2){
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
    switch($sub3){
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
    switch($sub4){
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
    switch($sub5){
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
    switch($sub6){
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
    catchgpa2($GPA2);
  $sum += CGBA($GPA2,$_SESSION["year"] ,$Major);
  return $sum;

}
$re1 = mysqli_query($con,"SELECT * FROM resulttime Where id = '1'");
while($row = mysqli_fetch_array($re1)){
    $date = $row['Date'];
    $time = date('H:i:sa',strtotime($row['Time']));
    $real = $date.''.$time;
    
}
$result2 = mysqli_query($con,"SELECT * FROM `resulttime` WHERE ID = '2' ");
while($row = mysqli_fetch_array($result2)){
    $date2 = $row['Date'];
    $time2 = date('H-i-sa',strtotime($row['Time']));
    $real2 = $date2.''.$time2;
}

$maj ='';

if($_SESSION['year'] == 'First_Year'){
    $re = mysqli_query($con,"SELECT `deptID` FROM `student1` WHERE `St_ID` = '$studentid'");
  
    while($row = mysqli_fetch_array($re)){
        $maj = $row['deptID'];
    }
}elseif($_SESSION['year'] == 'Second_Year'){
    $sqlm = "SELECT * FROM `student2` WHERE `St_ID` = '$studentid'";
    $rm = mysqli_query($con,$sqlm);
    while($row = mysqli_fetch_array($rm)){
        $maj = $row['deptID'];
    }
}else{
    $sqlm = "SELECT * FROM `student3` WHERE `St_ID` = '$studentid'";
    $rm = mysqli_query($con,$sqlm);
    while($rowm = mysqli_fetch_array($rm)){
        $maj = $rowm['deptID'];
    }
}

/*if($date < date('Y:m:d'))echo 'result date smaller';
else echo 'result date greater';*/

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
            <div id = "topic"><h1 style = "text-align:center;">Your Work Space!</h1></div>
            <div id = "BodyInfo">
         <div>
         <?php
          if(($_SESSION["year"] == 'First_Year')){?>
             <table style = "background-color:white;" border="1" cellspacing="0" cellpadding="5" width = "95%">
                       <caption><h4 style = "font-weight:bold;font-size:18;">First Semester Result</h4></caption>
             <tr><th>ID</th><th>Name</th><th>Myanmar</th><th>English</th><th>Physics</th><th>1011</th><th>1021</th><th>1031</th><th>GPA</th></tr>
            <?php 
              
          
              if($real <= date('Y-m-d h-i-sa')){
            $result = mysqli_query($con,"SELECT * FROM first_year_rt WHERE St_ID = '$studentid' ");
            while($row = mysqli_fetch_array($result)){
                            $name = $row['St_Name'];
                            $id = $row['St_ID'];
                         
                     echo '<tr style= "font-size:20">'.'<td>'.$id.'</td>'.'<td>'.$name.'</td>';
                        switch($row['M-100']){
                            case 'D':echo '<td style = "background-color:yellow">'.$row['M-100'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['M-100'].'</td>';break;
                            default: echo '<td>'.$row['M-100'].'</td>';break;
                        }
                        switch($row['M-100']){
                            case 'D':echo '<td style = "background-color:yellow">'.$row['E-100'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['E-100'].'</td>';break;
                            default: echo '<td>'.$row['E-100'].'</td>';break;
                        }
                        switch($row['P-100']){
                            case 'D':echo '<td style = "background-color:yellow">'.$row['P-100'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['P-100'].'</td>';break;
                            default: echo '<td>'.$row['P-100'].'</td>';break;
                        }
                        switch($row['CST-101']){
                            case 'D':echo '<td style = "background-color:yellow">'.$row['CST-101'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-101'].'</td>';break;
                            default: echo '<td>'.$row['CST-101'].'</td>';break;
                        }
                        switch($row['CST-102']){
                            case 'D':echo '<td style = "background-color:yellow">'.$row['CST-102'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-102'].'</td>';break;
                            default: echo '<td>'.$row['CST-102'].'</td>';break;
                        }
                        switch($row['CST-103']){
                            case 'D':echo '<td style = "background-color:yellow">'.$row['CST-103'].'</td>';break;
                            case 'F':echo '<td style = "background-color:red">'.$row['CST-103'].'</td>';break;
                            default: echo '<td>'.$row['CST-102'].'</td>';break;
                        }
                     echo '<td>'.$row['GPA'].'</td>';
                     echo '</tr>';
                        $GPA1 = $row['GPA'];
                     $Major = $row["Major"];
                     $Total +=   firstSI($row['M-100'],$row['E-100'],$row['P-100'],$row['CST-101'],$row['CST-102'],$row['CST-103'],$con,$GPA1,$CGBA,$sum,$Major);
                        }
                     } ?>
        </table>
         <?php  }elseif($_SESSION["year"]== 'Second_Year'){ ?>
            <table style = "background-color:white;" border="1" cellspacing="0" cellpadding="5" width = "95%">
            <caption><h4 style = "font-weight:bold;font-size:18;">First Semester Result</h4></caption>
            <tr><th>ID</th><th>Name</th><th>English</th><th>2011</th><th>2021</th><th>2031</th><th>2041</th><th>2051</th><th>GPA</th></tr>
            <?php 
             
            
                if($real <= date('Y-m-d h-i-sa')){
            $result = mysqli_query($con,"SELECT * FROM second_year_rt WHERE  St_ID = '$studentid'");
            while($row = mysqli_fetch_array($result)){
                $name = $row['St_Name'];
               $id = $row['St_ID'];
        echo '<tr style= "font-size:20">'.'<td>'.$id.'</td>'.'<td>'.$name.'</td>';
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
        echo '<td>'.$row['GPA'].'</td>'.'</tr>';
        $GPA1 = $row['GPA'];
        $Major = $row['Major']; 
        $Total +=   secondSI($row['E-200'],$row['CST-201'],$row['CST-202'],$row['CST-203'],$row['CST-204'],$row['CST-205'],$con,$GPA1,$CGBA,$sum,$Major);
    }
 
   }   ?>   </table">

       
         <?php }else{ ?>
            <table style = "background-color:white;" border="1" cellspacing="0" cellpadding="5" width = "95%">
            <caption><h4 style = "font-weight:bold;font-size:18;">First Semester Result</h4></caption>
            <tr><th>ID</th><th>Name</th><th>English</th><th>3011</th><th>3021</th><th>3031</th><th>3041</th><th>3051</th><th>GPA</th></tr>
            <?php
            
            if($real <= date('Y-m-d h-i-sa')){
            $result = mysqli_query($con,"SELECT * FROM third_year_rt WHERE St_ID = '$studentid'");
            while($row = mysqli_fetch_array($result)){
                $name = $row['St_Name'];
                  $id = $row['St_ID'];
       echo '<tr style= "font-size:20">'.'<td>'.$id.'</td>'.'<td>'.$name.'</td>';
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
       echo '<td>'.$row['GPA'].'</td>'.'</tr>';
       $GPA1 = $row['GPA'];            
       $Major = $row['Major'];
       $Total +=   thirdSI($row['E-300'],$row['CST-301'],$row['CST-302'],$row['CST-303'],$row['CST-304'],$row['CST-305'],$con,$GPA1,$CGBA,$sum,$Major);
            }
    }
    
            ?>
            </table>
         <?php } ?>


        <?php




/*if($date < date('Y:m:d'))echo 'result date smaller';
else echo 'result date greater';*/



          if(($_SESSION["year"] == 'First_Year')){?>
             <table style = "background-color:white;" border="1" cellspacing="0" cellpadding="5" width = "95%">
             <caption><h4 style = "font-weight:bold;font-size:18;">Second Semester Result</h4></caption>
             <tr><th>ID</th><th>Name</th><th>Myanmar</th><th>English</th><th>Physics</th><th>1012</th><th>1022</th><th>1032</th><th>GPA</th></tr>
            <?php 
            if($real2 <= date('Y-m-d h-i-sa')){
           $result = mysqli_query($con,"SELECT * FROM `first_year_ii` WHERE St_ID = '$studentid' ");
            while($row = mysqli_fetch_array($result)){
               
               echo '<tr style= "font-size:20">'.'<td>'.$row['St_ID'].'</td>'.'<td>'.$row['St_Name'].'</td>';
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
             
               echo '<td>'.$row['GPA'].'</td>'.'</tr>';
                        $GPA2 = $row['GPA'];
                     $Major = $row['Major'];
                     $Total +=  firstSII($row['M-1002'],$row['E-1002'],$row['P-1002'],$row['CST-1012'],$row['CST-1022'],$row['CST-1032'],$con,$GPA2,$CGBA,$sum,$Major);
            }
                   }
                  ?>
        </table>
         <?php  }elseif($_SESSION["year"] == 'Second_Year'){ ?>
            <table style = "background-color:white;" border="1" cellspacing="0" cellpadding="5" width = "95%">
            <caption><h4 style = "font-weight:bold;font-size:18;">Second Semester Result</h4></caption>
            <tr><th>ID</th><th>Name</th><th>English</th><th>2012</th><th>2022</th><th>2032</th><th>2042</th><th>2052</th><th>GPA</th></tr>
            <?php 
            if($real2 <= date('Y-m-d h-i-sa') ){
            $result = mysqli_query($con,"SELECT * FROM `second_year_ii` WHERE St_ID = '$studentid'");
            while($row = mysqli_fetch_array($result)){
                 echo '<tr style= "font-size:20">'.'<td>'.$row['St_ID'].'</td>'.'<td>'.$row['St_Name'].'</td>';
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
                 echo '<td>'.$row['GPA'].'</td>'.'</tr>';
        $GPA2 = $row['GPA'];
        $Major = $row['Major']; 
        $Total += secondSII($row['E-2002'],$row['CST-2012'],$row['CST-2022'],$row['CST-2022'],$row['CST-2042'],$row['CST-2052'],$con,$GPA2,$CGBA,$sum,$Major);
    }
}
 
            ?>   </table >

       
         <?php }else{ ?>

            <table style = "background-color:white;" border="1" cellspacing="0" cellpadding="5" width = "95%">
            <caption><h4 style = "font-weight:bold;font-size:18;">Second Semester Result</h4></caption>
            <tr><th>ID</th><th>Name</th><th>English</th><th>3012</th><th>3022</th><th>3032</th><th>3042</th><th>3052</th><th>GPA</th></tr>
            <?php
            if($real2  <= date('Y-m-d h-i-sa') ){
            $result = mysqli_query($con,"SELECT * FROM third_year_ii WHERE St_ID = '$studentid'");
            while($row = mysqli_fetch_array($result)){
               
                echo '<tr style= "font-size:20">'.'<td>'.$row['St_ID'].'</td>'.'<td>'.$row['St_Name'].'</td>';
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
                echo '<td>'.$row['GPA'].'</td>'.'</tr>';
       $GPA2 = $row['GPA'];            
       $Major = $row['Major'];
       $Total += thirdSII($row['E-3002'],$row['CST-3012'],$row['CST-3022'],$row['CST-3022'],$row['CST-3042'],$row['CST-3052'],$con,$GPA2,$CGBA,$sum,$Major);
               }
               }
            ?>
            </table >
         <?php } 


?>
<div id = "foot"><table style = "background-color:white;" border = "0" cellspacing= "5" cellpadding= "5" align = "center">

      <tr><td><h2>Major:</h2></td><td><h2><?php echo $maj;?></h2></td><td><h2>CGPA :</h2></td>
      <form action= 'Workspace.php' method="post">
      
      
      <?php 
      if($real2 < date('Y-m-d h-i-sa')){
          $myCGBA = number_format($Total,2);
          $realCGBA = $myCGBA;
          $year = $_SESSION['year'];
          $name = $_SESSION['user'];
          $recorded = 0;
          $Sid = $_SESSION['pass'];
        
          $result3 = mysqli_query($con,"SELECT * FROM `resulttime` WHERE ID = '3' ");
          while($row = mysqli_fetch_array($result3)){
              $date3 = $row['Date'];
              $time3 = date('H-i-sa',strtotime($row['Time']));
              $real3 = $date3.''.$time3;
              
          }
          if($real3 < date('Y-m-d h-i-sa')){
            $find = '';
            if($year == 'First_Year'){
                $find = "SELECT * FROM `first_sm` WHERE `St_ID`='$Sid'";
            }elseif($year == 'Second_Year'){
                $find = "SELECT * FROM `second_sm` WHERE `St_ID`='$Sid'";
            }else{
                $find = "SELECT * FROM `third_sm`  WHERE `St_ID`='$Sid'";
            }
            $findresult = mysqli_query($con,$find);
            if($findresult){}else{echo 'error';}
            $value = 0;
            $ro1 = mysqli_fetch_assoc($findresult);
            if($ro1){
                $value =  $ro1['GPA'];
            }else{
                echo "error";
            }
            $myCGBA = $myCGBA + $value;
          }


          $sql = '';
          
          $cgbaq = '';
          $year1 = date('Y');
          $year2 = $year1-1;
          $ACD = $year2.'-'.$year1;
           if($year == 'First_Year'){
            $sql = "SELECT * FROM `student1` WHERE St_ID = '1111'";
           
          }elseif($year == 'Second_Year'){
            $sql = "SELECT  * FROM `student2` WHERE `St_ID` = '$Sid'";
            
          }else{
            $sql = "SELECT  * FROM `student3` WHERE `St_ID` = '$Sid'";
          }
          
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_array($result)){
              $recorded= $row['CGBARecorded'];
          }
          if($recorded == false){ 
              echo '<div id="recorded"><input type="submit" name="seeCGPA" value = "See My CGPA"/></div>';
              if(isset($_POST['seeCGBA'])){
                echo '<td><h2>'.$myCGBA;
                $q1 = "INSERT INTO `cumulative`(`St_ID`, `St_Name`, `AcdYear`, `Year`, `CGBAGRADE`) VALUES 
                ('$Sid','$name','$ACD','$year','$myCGBA')";
                $res1 = mysqli_query($con,$q1);
                if($res1){
                    echo '';
                }else
                echo 'error';
                $Q = '';
                if($year == 'First_Year'){
                    $Q = "UPDATE `student1` SET  `CGBARecorded` = true WHERE St_ID = '$Sid'";
                  }elseif($year == 'Second_Year'){
                    $Q = "UPDATE `student2` SET  `CGBARecorded` = true WHERE `St_ID` = '$Sid'";
                  }else{
                    $Q = "UPDATE `student3` SET  `CGBARecorded` = true WHERE `St_ID` = '$Sid'";
                  }
                  $res2 = mysqli_query($con,$Q);
                  if($res2){ echo 'have recorded';}else{echo '';}
                
            }
              }else   echo '<td><h2>'.$realCGBA;
          }else{
            echo '<td><h2>'.$realCGBA;
          
                 }

      
      ?>
</h2></td></tr>
     </table >
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