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
$insertnoti ='';
$insertinfo='';
$tablename= '';
$nos = 0;
date_default_timezone_set("Asia/Yangon");
$resut = mysqli_query($con,"SELECT * FROM resulttime Where id = '2'");
while($row = mysqli_fetch_array($resut)){
    $date = $row['Date'];
    $time = date('H-i-sa',strtotime($row['Time']));
    $realtime2 = $date.''.$time;
}



/*$fid[] = '';
$fname[] = '';
$myan[] ='';
$eng[] = '';
$phy[] = '';
$fs01[]= '';
$fs02[] = '';
$fs03[] = '';
$fmajor[] = '';
$sid[] = '';
$sname[] = '';
$se[] ='';
$sec01[] = '';
$sec02[] = '';
$sec03[] = '';
$sec04[] = '';
$sec05[] = '';
$secmaj[] = '';
$tid[] ='';
$tname[]='';
$te[] = '';
$ts01[] ='';
$ts02[] ='';
$ts03[] ='';
$ts04[]= '';
$ts05[]= '';
$tmajor[] = '';*/
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
function GPA1($s1,$s2,$s3,$s4,$s5,$s6,$con){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $GPA1 = 0;
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

    $sum = $c0 + $c1 + $c2 +$c3 + $c4 + $c5;
    return number_format($GPA1/$sum,2);
}
function GPA2($s1,$s2,$s3,$s4,$s5,$s6,$m,$con){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $GPA2 = 0;
    if( $m == 'CS'){
        $sql = "SELECT * FROM `secondcredit` WHERE  `Major` = 'CS' ";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-2002'];
            $c1 = $row['CST-2012'];
            $c2 = $row['CST-2022'];
            $c3 = $row['CST-2032'];
            $c4 = $row['CST-2042'];
            $c5 = $row['CST-2052'];
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
        $c5 = $row['CST-2052'];
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
$sum = $c0 + $c1 + $c2 + $c3+ $c4 + $c5;
return number_format($GPA2/$sum,2);
}
function GPA3($s1,$s2,$s3,$s4,$s5,$s6,$m,$con){
    $c0 = 0;
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;
    $c4 = 0;
    $c5 = 0;
    $GPA3 = 0;

    if( $m == 'CS'){
        $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CS'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-3002'];
            $c1 = $row['CST-3012'];
            $c2 = $row['CST-3022'];
            $c3 = $row['CST-3032'];
            $c4 = $row['CST-3042'];
            $c5 = $row['CST-3052'];
        }
    }
    else{
        $sql = "SELECT * FROM `thirdcredit` WHERE  `Major` = 'CT'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $c0 = $row['E-3003'];
            $c1 = $row['CST-3013'];
            $c2 = $row['CST-3023'];
            $c3 = $row['CST-3033'];
            $c4 = $row['CST-3043'];
            $c5 = $row['CST-3053'];
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


    $sum = $c0 + $c1 + $c2 + $c3 + $c4 + $c5;
    return number_format($GPA3/$sum,2);
}



if(isset($_POST['insertonce'])){
if(date('Y-m-d h-i-sa') <= $realtime2 ){
    $f1 = "SELECT * FROM `first_year_ii`";
    $r1 = mysqli_query($con,$f1);
    $id = $_POST['pid'];
    $name = $_POST['pname'];
    $m = $_POST['m'];
    $e = $_POST['e'];
    $p = $_POST['p'];
    $s01 = $_POST['s01'];
    $s02 = $_POST['s02'];
    $s03 = $_POST['s03'];
    $gpa = GPA1($m,$e,$p,$s01,$s02,$s03,$con);
    $maj = $_POST['major'];
    $student = array($id,$name,$m,$e,$p,$s01,$s02,$s03,$gpa,$maj,$con);
    $insertok = true;
    if(empty($id) || empty($name)){
        $insertok = false;
        $insertinfo = 'you forget something to fill';
    }
    else{
        if(!preg_match("/[a-zA-Z ]/",$name) || !preg_match("/[0-9]/",$id)){
            $insertok = false;
            $insertnoti = 'Invalid Input Type';
        }
      
    }
    while($row = mysqli_fetch_array($r1)){
        if($id == $row['St_ID']){
            $insertok = false;
        }
    }    
     if($insertok){
                    $sql = "INSERT INTO `first_year_ii`(`St_ID`, `St_Name`, `M-1002`, `E-1002`, `P-1002`, `CST-1012`, `CST-1022`, `CST-1032`, `GPA`, `Major`) VALUES
                    ('$id','$name','$m','$e','$p','$s01','$s02','$s03','$gpa','$maj')";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        $insertnoti = 'your data have Insert One Student';
                    }
                    else{
                        $insertnoti = 'error';
                    }
                $delet = "DELETE FROM `first_year_ii` WHERE St_ID = ''";
                mysqli_query($con,$delet);
                }
                else{
                    $insertnoti = 'Invalid input data type! or Your Input is already Exist!';
                }
            }else{
                $insertnoti = 'You Don\'t have permission to insert resut data';
            }
    }
if(isset($_POST['insertall'])){
if(date('Y-m-d h-i-sa') <= $realtime2 ){
    $f1 = "SELECT * FROM `first_year_ii`";
    $r1 = mysqli_query($con,$f1);
    if(empty($_SESSION['nos'])){
        $insertinfo = 'Empty Input';
    }else{
$insertok0 = true;
if(isset($_SESSION['nos'])){
for($i = 0;$i < $_SESSION['nos'];$i++){
    $idv = $_POST['fid'.$i];
    $nv = $_POST['fname'.$i];
    if(empty($idv) || empty($nv) || !preg_match("/[0-9]/",$idv) || !preg_match("/[a-zA-Z ]/",$nv)){
        $insertok0 = false;
    }
    while($row = mysqli_fetch_array($r1)){
        if($idv == $row['St_ID']){
            $insertok0 = false;
        }
    }
    
    if($insertok0){
        $firstgpa = 0;
        $mv = $_POST['myan'.$i];
        $ev = $_POST['eng'.$i];
        $pv = $_POST['phy'.$i];
        $f01v = $_POST['fs01'.$i];
        $f02v = $_POST['fs02'.$i];
        $f03v = $_POST['fs03'.$i];
        $majv = $_POST['fmajor'.$i];
        $firstgpa = GPA1($mv,$ev,$pv,$f01v,$f02v,$f03v,$con);
            $sql = "INSERT INTO `first_year_ii`(`St_ID`, `St_Name`, `M-1002`, `E-1002`, `P-1002`, `CST-1012`, `CST-1022`, `CST-1032`, `GPA`, `Major`) VALUES
            ('$idv','$nv','$mv','$ev','$pv','$f01v','$f02v','$f03v','$firstgpa','$majv')";
            $result = mysqli_query($con,$sql);
            if($result){
                $insertinfo = 'your data to first year semester_II have Inserted '.$_SESSION['nos'].' Student';
            }
            else{
                $insertinfo = 'error';
            }
        }
        else{
            $insertinfo = 'You Forget Some Field To Fill or Invalid Input type! or You Input is already exist';
        }
   
}


$delet = "DELETE FROM `first_year_rt` WHERE St_ID = ''";
mysqli_query($con,$delet);
}
    }
}else{
    $insertnoti='You don\'t have permission to insert result';
}
}else{
    $insertinfo = "";
}
if(isset($_POST['sinsertonce'])){
    
if(date('Y-m-d h-i-sa') <= $realtime2 ){
    $f2 = "SELECT * FROM `second_year_ii`";
    $r2 = mysqli_query($con,$f2);
    $psid = $_POST['psid'];
    $psname = $_POST['psname'];
    $pes = $_POST['pes'];
    $ss01 = $_POST['ss01'];
    $ss02 = $_POST['ss02'];
    $ss03 = $_POST['ss03'];
    $ss04 = $_POST['ss04'];
    $ss05 = $_POST['ss05'];
    $mjs = $_POST['mjs'];
    $gs = GPA2($pes,$ss01,$ss02,$ss03,$ss04,$ss05,$mjs,$con);
    $sinsertok = true;
    if(empty($psid) || empty($psname)){
        $sinsertok = false;
    }
    else{
        if(!preg_match("/[a-z A-Z]/",$psname) || !preg_match("/[0-9]/",$psid)){
            $sinsertok = false;
        }
      
    }
    while($row = mysqli_fetch_array($r2)){
        if($psid == $row['St_ID']){
            $sinsertok = false;
        }
    }
    if($sinsertok){
        $sql = "INSERT INTO `second_year_ii`(`St_ID`, `St_Name`, `E-2002`, `CST-2012`, `CST-2022`, `CST-2032`, `CST-2042`, `CST-2052`, `GPA`, `Major`) VALUES
        ('$psid','$psname','$pes','$ss01','$ss02','$ss03','$ss04','$ss05','$gs','$mjs')"; 
        $result = mysqli_query($con,$sql);
        if($result == true){
            $insertinfo = 'your data to Second Year Result table have Insert One Student';
        }
        else{
            $insertinfo = 'error';
        }

    }else{
        $insertinfo = 'Invalid Input Type or Empty Input or Your Input is already Exist';
    }
}else{
    $insertinfo = 'You Don\' have permission to insert result data';
}
}
if(isset($_POST['sinsertall'])){
    
if(date('Y-m-d h-i-sa') <= $realtime2){
    $f2 = "SELECT * FROM `second_year_ii`";
    $r2 = mysqli_query($con,$f2);
    $insertok1 = true;
    if(isset($_SESSION['nos'])){
    for($i = 0;$i < $_SESSION['nos'];$i++){
        $idv = $_POST['sid'.$i];
        $nv = $_POST['sname'.$i];
        if(empty($idv) || empty($nv) || !preg_match("/[0-9]/",$idv) || !preg_match("/[a-zA-Z ]/",$nv)){
            $insertok1 = false;
        }
        while($row = mysqli_fetch_array($r2)){
           if($idv == $row['St_ID']){
            $insertok1 = false;
        }
        }
        if($insertok1){
            $secondgpa = 0;
            $mv = $_POST['se'.$i];
            $ev = $_POST['sec01'.$i];
            $pv = $_POST['sec02'.$i];
            $f01v = $_POST['sec03'.$i];
            $f02v = $_POST['sec04'.$i];
            $f03v = $_POST['sec05'.$i];
            $majv = $_POST['secmaj'.$i];
            $secondgpa = GPA2($mv,$ev,$pv,$f01v,$f02v,$f03v,$majv,$con);
                $sql = "INSERT INTO `second_year_ii`(`St_ID`, `St_Name`, `E-2002`, `CST-2012`, `CST-2022`, `CST-2032`, `CST-2042`, `CST-2052`, `GPA`, `Major`) VALUES
                ('$idv','$nv','$mv','$ev','$pv','$f01v','$f02v','$f03v','$secondgpa','$majv')";
                $result = mysqli_query($con,$sql);
                if($result){
                    $insertinfo = 'your data to second year semester_II have Inserted '.$_SESSION['nos'].' Student';
                }
                else{
                    $insertinfo = 'error';
                }
            }
            else{
                $insertinfo = 'You Forget Some Field To Fill or Invalid Input type! or Your input is already exist';
            }
       
    }
    
    
    }
   
$delet = "DELETE FROM `second_year_ii` WHERE St_ID = ''";
mysqli_query($con,$delet);
}else{
    $insertinfo = 'You Don\'t have permission to insert result data';
}
}
if(isset($_POST['tinsertonce'])){
    
if(date('Y-m-d h-i-sa') <= $realtime2 ){
    
    $insertok2 = true;
    $ptid = $_POST['ptid'];
    $ptname = $_POST['ptname'];
    $pet = $_POST['et'];
    $st01 = $_POST['st01'];
    $st02 = $_POST['st02'];
    $st03 = $_POST['st03'];
    $st04 = $_POST['st04'];
    $st05 = $_POST['st05'];
    $mjt = $_POST['mjt'];
    $gt = GPA3($pet,$st01,$st02,$st03,$st04,$st05,$mjt,$con);
        if(empty($ptid) || empty($ptname)){
            $insertok2 = false;
        }else{
            if(!preg_match("/[0-9]/",$ptid) || !preg_match("/[a-zA-Z ]/",$ptname)){
                $insertok2 = false;
            }
        }
        $f3 = "SELECT * FROM `third_year_ii`";
        $r = mysqli_query($con,$f3);
        while($row = mysqli_fetch_array($r)){
            if($ptid == $row['St_ID']){
                $insertok2 = false;
            }
        }
        if($insertok2){
        $sql = "INSERT INTO `third_year_ii`(`St_ID`, `St_Name`, `E-3002`, `CST-3012`, `CST-3022`, `CST-3032`, `CST-3042`, `CST-3052`, `GPA`, `Major`) VALUES
        ('$ptid','$ptname','$pet','$st01','$st02','$st03','$st04','$st05','$gt','$mjt')"; 
        $result = mysqli_query($con,$sql);
        if($result == true){
            $insertinfo = 'your data to Third Year Result table have Insert One Student';
        }
        else{
            $insertinfo = 'error';
        }
    }else{
        $insertinfo = 'Invalid Input Type or Empty Value or Your Input is already exist!';
    }
        $delet = "DELETE FROM `third_year_ii` WHERE St_ID = ''";
        mysqli_query($con,$delet);
}else{
    $insertinfo='You don\'t have permission to insert the result data';
}
}
if(isset($_POST['tinsertall'])){
    
if(date('Y-m-d h-i-sa') <= $realtime2 ){
    $f3 = "SELECT * FROM `third_year_ii`";
    $r3 = mysqli_query($con,$f3);
    $insertok2 = true;
    if(isset($_SESSION['nos'])){
    for($i = 0;$i < $_SESSION['nos'];$i++){
        $idv = $_POST['tid'.$i];
        $nv = $_POST['tname'.$i];
        if(empty($idv) || empty($nv) || !preg_match("/[0-9]/",$idv) || !preg_match("/[a-zA-Z ]/",$nv)){
            $insertok2 = false;
        }
        while($row = mysqli_fetch_array($r3)){
            if($idv == $row['St_ID']){
                $insertok2 = false;
            }
        }
        if($insertok2){
            $thirdgpa = 0;
            $mv = $_POST['te'.$i];
            $ev = $_POST['ts01'.$i];
            $pv = $_POST['ts02'.$i];
            $f01v = $_POST['ts03'.$i];
            $f02v = $_POST['ts04'.$i];
            $f03v = $_POST['ts05'.$i];
            $majv = $_POST['tmajor'.$i];
            $secondgpa = GPA3($mv,$ev,$pv,$f01v,$f02v,$f03v,$majv,$con);
                $sql = "INSERT INTO `third_year_ii`(`St_ID`,`St_Name`, `E-300`, `CST-301`, `CST-302`, `CST-303`, `CST-304`, `CST-305`, `GPA`, `Major`) VALUES
                ('$idv','$nv','$mv','$ev','$pv','$f01v','$f02v','$f03v','$secondgpa','$majv')";
                $result = mysqli_query($con,$sql);
                if($result){
                    $insertinfo = 'your data to third year semester_I have Inserted '.$_SESSION['nos'].' Student';
                }
                else{
                    $insertinfo = 'error';
                }
            }
            else{
                $insertinfo = 'You Forget Some Field To Fill or Invalid Input type! or Your Input is already Exist!';
            }
       
    }
    
    
    }
   
    $delet = "DELETE FROM `third_year_ii` WHERE St_ID = ''";
    mysqli_query($con,$delet);
}else{
    $insertinfo ='You Don\'t have the permission to insert the result data';
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
                <div id = "oserbackend"><h1 style = "text-align:center">WELCOME OSERS DATA INSERTING</h2></div>
                    
        <div id= "insertheader">
        <p style = "text-align:center"> <strong>Make You Table Selection You Want To Insert</strong></p>
        <div id = "insertchoicepane">
 <form action = "studentinsert.php" method = "post">

                    <input type="submit" name ="student" value = "INSERT STUDENTS"/>
                    <input type="submit" name ="S_I" value = "Semster I Result"/>
                    <input type="submit" name ="S_II" value = "Semster II Result"/>
                    <input type="submit" name ="Special" value = "Special Semester"/>
                    <input type="submit" name ="back" value = "BackToHome"/>
                    <div id="insertinfo"><h3><?php echo $insertinfo;
                    echo $insertnoti;?><h3></div>
        
</form>

        </div><hr/>
        <div id="showinsertpane">   
            <div id="studentchoice">
                <form action="semesterIIR.php" method="post">
                <label><strong>Choose The Students Result Table For Semester II</strong></label>
            </div>
            <div id="studetinsertpane">
            <table border= "0" align= "center" width = "100%" cellspacing="0" cellpadding="5" background-color="white">
            <caption align ="center"><strong>Insert To First Year Result Table</caption>
            <tr><td><strong style = "text-align:center">Insert One Student</strong></td></tr>
            <tr><th>ID</th><th>Name</th><th>M-1001</th><th>E-1001</th><th>P-1001</th><th>1011</th><th>1021</th><th>1031</th><th>Major</th></tr>
            <tr align = "center"><th><input type="text" name="pid" placeholder="0000" maxlength="4" size = "4"></td><td>
            <input type="text" name="pname" placeholder="Student name" maxlength="30" max="30" size = "15"></td>
            <td><select name = "m">
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
</select></td>
            <td><select name = "e">
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
</select></td>
            <td><select name = "p">
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
</select></td>
            <td><select name = "s01">
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
</select></td>
            <td><select name = "s02">
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
</select></td>
            <td><select name = "s03">
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
</select></td>
            <td><select name = "major">
            <option selected = "selected">CST</option>
                </select>
            </td><td><input type ="submit" name ="insertonce" value= "Insert One Student"  onclick = "return confirm('Are you sure to Insert  Data!')"/></td><tr>
           <tr  align = "center"><td><strong style = "text-align:center">Insert Multiple Student</strong></td><td>Number Of Student</td><td><input type = "text" name = "number1" size = "2" placeholder = "30<="/></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type ="submit" name="choose1" value ="Start Inserting"></td></tr>
           <?php 
            if(isset($_POST['choose1'])){
                $time = $_POST['number1'];
                if($time < 31 && $time > 1){
                    $nos = $time;
                    $_SESSION['nos'] = $time;
                    for($i = 0;$i<$time;$i++){  ?>
                        <tr align = "center"><th><input type="text" name="fid<?php echo $i;?>" placeholder = "1111" maxlength="4" size = "4" ></td><td>
                        <input type="text" name="fname<?php echo $i; ?>" placeholder="Student name" maxlength="30" max="30" size = "15"></td>
                        <td><select name = "myan<?php echo $i; ?>">
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
            </select></td>
                        <td><select name = "eng<?php echo $i;?>">
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
            </select></td>
                        <td><select name = "phy<?php echo $i;?>">
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
            </select></td>
                        <td><select name = "fs01<?php echo $i;?>">
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
            </select></td>
                        <td><select name = "fs02<?php echo $i;?>">
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
            </select></td>
                        <td><select name = "fs03<?php echo $i;?>">
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
            </select></td>
                       
                        <td><select name = "fmajor<?php echo $i;?>">
                            <option selected = "selected">CST</option>
                          </select></td></tr>
       <?php              }

                }else{
                    $insertinfo = 'You Choice on Number of Student is greter than 30';
                }
            }
           ?>
           
           <tr align = "center"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type ="submit" name ="insertall" value= "Insert All Students" onclick = "return confirm('Are you sure to Insert All Data!')"/></td></tr>
              </table>
              <hr/>






              <table border= "0" align= "center" width = "100%" cellspacing="0" cellpadding="5" background-color="white">
            <caption align ="center"><strong>Insert To Second Year Result Table</caption>
            <tr><td><strong style = "text-align:center">Insert One Student</strong></td></tr>
            <tr><th>ID</th><th>Name</th><th>E2002</th><th>2012</th><th>2022</th><th>2032</th><th>2042</th><th>2052</th><th>Major</th></tr>
            <tr align = "center"><th><input type="text" name="psid" placeholder="0000" maxlength="4" size = "4"></td><td>
            <input type="text" name="psname" placeholder="Student name" maxlength="30" max="30" size = "15"></td>
            <td><select name = "pes">
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
</select></td>
            <td><select name = "ss01">
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
</select></td>
            <td><select name = "ss02">
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
</select></td>
            <td><select name = "ss03">
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
</select></td>
            <td><select name = "ss04">
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
</select></td>
            <td><select name = "ss05">
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
</select></td>
            
            <td><select name = "mjs">
                <option selected = "selected">CS</option>
                <option>CT</option>
                </select>
            </td><td><input type ="submit" name ="sinsertonce" value= "Insert One Student"  onclick = "return confirm('Are you sure to Insert  Data!')"/></td><tr>
           <tr align = "center"><td><strong style = "text-align:center">Insert Multiple Student</strong></td><td>Number Of Student</td><td><input type = "text" name = "number2" size = "2" placeholder = "30<="/></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type ="submit" name="choose2" value ="Start Inserting"></td></tr>
           <?php 
            if(isset($_POST['choose2'])){
                $time = $_POST['number2'];
                if($time < 31 && $time>1){
                    $nos = $time;
                    for($i = 0;$i<$time;$i++){  ?>
            <tr align = "center"><th><input type="text" name="sid<?php echo $i;?>" placeholder = "1111" maxlength="4" size = "4" ></td><td>
            <input type="text" name="sname<?php echo $i;?>" placeholder="Student name" maxlength="30" max="30" size = "15"></td>
            <td><select name = "se<?php echo $i;?>">
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
</select></td>
            <td><select name = "sec01<?php echo $i;?>">
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
</select></td>
            <td><select name = "sec02<?php echo $i;?>">
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
</select></td>
            <td><select name = "sec03<?php echo $i;?>">
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
</select></td>
            <td><select name = "sec04<?php echo $i;?>">
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
</select></td>
            <td><select name = "sec05<?php echo $i;?>">
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
</select></td>  
            <td><select name = "secmaj<?php echo $i;?>">
                <option selected = "selected">CS</option>
                <option>CT</option>
              </select></td></tr>
              <?php 
                    }
                }else{
                    $insertinfo = 'Number of Students is greater than limit';
                }
            }
              ?>
               <tr align = "center"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type ="submit" name ="sinsertall" value= "Insert All Student" onclick = "return confirm('Are you sure to Insert All Data!')"/></td></tr>
              </table><hr/>




              <table border= "0" align= "center" width = "100%" cellspacing="0" cellpadding="5" background-color="white">
            <caption align ="center"><strong>Insert To Third Year Result Table</caption>
            <tr><td><strong style = "text-align:center">Insert One Student</strong></td></tr>
            <tr><th>ID</th><th>Name</th><th>E3001</th><th>3011</th><th>3021</th><th>3031</th><th>3041</th><th>3051</th><th>Major</th></tr>
            <tr align = "center"><th><input type="text" name="ptid" placeholder="0000" maxlength="4" size = "4"></td><td>
            <input type="text" name="ptname" placeholder="Student name" maxlength="30" max="30" size = "15"></td>
            <td><select name ="et">
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
</select></td>
            <td><select name = "st01">
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
</select></td>
            <td><select name = "st02">
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
</select></td>
            <td><select name = "st03">
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
</select></td>
            <td><select name = "st04">
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
</select></td>
            <td><select name = "st05">
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
</select></td>
            <td><select name = "mjt">
            <option selected = "selected">CS</option>
            <option>CT</option>
                </select>
            </td><td><input type ="submit" name ="tinsertonce" value= "Insert One Student"  onclick = "return confirm('Are you sure to Insert  Data!')"/></td><tr>
           <tr align = "center"><td><strong style = "text-align:center">Insert Multiple Rows</strong></td><td>Number Of Student</td><td><input type = "text" name = "number3" size = "2" placeholder = "30<="/></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type ="submit" name="choose3" value ="Start Inserting"></td></tr>
           <?php 
            if(isset($_POST['choose3'])){
                $time = $_POST['number3'];
                if($time < 31 && $time > 1){
                    $nos = $time;
                    for($i = 0;$i<$time;$i++){  ?>
            <tr align = "center"><th><input type="text" name="tid<?php echo $i;?>" placeholder = "1111" maxlength="4" size = "4" ></td><td>
            <input type="text" name="tname<?php echo $i;?>" placeholder="Student name" maxlength="30" max="30" size = "15"></td>
            <td><select name = "te<?php echo $i;?>">
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
</select></td>
            <td><select name = "ts01<?php echo $i;?>">
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
</select></td>
            <td><select name = "ts02<?php echo $i;?>">
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
</select></td>
<td><select name = "ts03<?php echo $i;?>">
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
</select></td>
            <td><select name = "ts04<?php echo $i;?>">
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
</select></td>
            <td><select name = "ts05<?php echo $i;?>">
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
</select></td>
           
            <td><select name = "tmajor<?php echo $i;?>">
            <option selected = "selected">CS</option>
            <option>CT</option>
              </select></td></tr>
              <?php 
                    }
                }else{
                    $insertinfo = 'Number of Students is greater than limit';
                }
            }
              ?>
              <tr align="center"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type ="submit" name ="tinsertall" value= "Insert All Student" onclick = "return confirm('Are you sure to Insert All Data!')"/></td></tr>
              </table>
              </form>
            </div>
        </div>
                </div>
        </div>  
        
            </div>
</body>
</html>
