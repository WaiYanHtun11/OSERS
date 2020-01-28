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
$tablename = '';
$filename = '';
$name = '';
date_default_timezone_set("Asia/Yangon");
$rest = mysqli_query($con,"SELECT * FROM resulttime Where id = '1'");
while($row = mysqli_fetch_array($rest)){
    $date0 = $row['Date'];
    $time0 = date('H-i-sa',strtotime($row['Time']));
    $realtime1 = $date0.''.$time0;
}
$resut = mysqli_query($con,"SELECT * FROM resulttime Where id = '2'");
while($row = mysqli_fetch_array($resut)){
    $date1 = $row['Date'];
    $time1 = date('H-i-sa',strtotime($row['Time']));
    $realtime2 = $date1.''.$time1;
}
$rest2 = mysqli_query($con,"SELECT * FROM resulttime Where id = '3'");
while($row = mysqli_fetch_array($rest2)){
    $date2 = $row['Date'];
    $time2 = date('H-i-sa',strtotime($row['Time']));
    $realtime3 = $date2.''.$time2;
 }
if(isset($_POST['back'])){
    direct('OSERSBACKEND.php');
}
if(isset($_POST['sdelete'])){
    if(date('Y-m-d h-i-sa') <= $realtime1){
    $sid = $_POST['SID'];
    if($_POST['year'] == 'student1'){
        $sql = "DELETE FROM `student1` WHERE St_ID = '$sid'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti='Student with ID '.$sid.' have deleted';
        }
        else{
            $insertnoti= 'error';
        }

    }
    if($_POST['year'] == 'student2'){
        $sql = "DELETE FROM `student2` WHERE St_ID = '$sid'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti='Student with ID '.$sid.' have deleted';
        }
        else{
            $insertnoti= 'error';
        }

    }
    if($_POST['year'] == 'student3'){
        $sql = "DELETE FROM `student3` WHERE St_ID = '$sid'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti='Student with ID '.$sid.' have deleted';
        }
        else{
            $insertnoti= 'error';
        }

    }
    }else{
        $insertnoti = 'You Don\'t permission to delete this';
    }
}
if(isset($_POST['supdate'])){
    if(date('Y-m-d h-i-sa') <= $realtime1){
    $sid = $_POST['SID'];
    $sfiled = $_POST['sfield'];
    $newvalue = $_POST['newsvalue'];
    if($_POST['year'] == 'student1'){
        $sql = "UPDATE `student1` SET `$sfiled` = '$newvalue' WHERE St_ID = '$sid'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti='Student with ID '.$sid.' have Updated';
        }
        else{
            $insertnoti= 'error';
        }

    }
    if($_POST['year'] == 'student2'){
        $sql = "UPDATE `student2` SET `$sfiled` = '$newvalue' WHERE St_ID = '$sid'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti='Student with ID '.$sid.' have updated';
        }
        else{
            $insertnoti= 'error';
        }

    }
    if($_POST['year'] == 'student3'){
        $sql = "UPDATE `student3` SET `$sfiled` = '$newvalue' WHERE St_ID = '$sid'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti='Student with ID '.$sid.' have updated';
        }
        else{
            $insertnoti= 'error';
        }

    }
    
    }else{
        $insertnoti = 'You don\'t have permission to update this';
    }

}
if(isset($_POST['r01delete'])){
    if(date('Y-m-d h-i-sa') <= $realtime1){
$s01id = $_POST['s01ID'];
$sql = "DELETE FROM `first_year_rt` WHERE St_ID = '$s01id'";
$result = mysqli_query($con,$sql);
if($result){
    $insertnoti = "Student With ID ".$s01id." have deleted from First Year Semester I ";
}else{
    $insertnoti = "error";
}
}else{
    $insertnoti = 'You don\'t have permission to delete this';
}
}
if(isset($_POST['r11delete'])){
    if(date('Y-m-d h-i-sa') <= $realtime2){
    $s11id = $_POST['s11ID'];
    $sql = "DELETE FROM `first_year_ii` WHERE St_ID = '$s11id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = "Student With ID ".$s11id." have deleted from Second Year Semester II ";
    }else{
        $insertnoti = "error";
    }
}else{
    $insertnoti = 'You don\'t have permission to delete this';
}
    }
    if(isset($_POST['r02delete'])){
        if(date('Y-m-d h-i-sa') <= $realtime1){
        $s02id = $_POST['S02ID'];
        $sql = "DELETE FROM  `second_year_rt` WHERE St_ID = '$s02id'";
        $result = mysqli_query($con,$sql);
        if($result){
            $insertnoti = "Student With ID ".$s02id." have deleted from Second Year Semester I ";
        }else{
            $insertnoti = "error";
        }
    }else{
        $insertnoti = 'You don\'t have permission to delete this';
    }
        }
        if(isset($_POST['r12delete'])){
            if(date('Y-m-d h-i-sa') <= $realtime2){
            $s12id = $_POST['s12ID'];
            $sql = "DELETE FROM  `second_year_ii` WHERE St_ID = '$s12id'";
            $result = mysqli_query($con,$sql);
            if($result){
                $insertnoti = "Student With ID ".$s12id." have deleted from Second Year Semester II ";
            }else{
                $insertnoti = "error";
            }
        }else{
            $insertnoti = 'You don\'t have permission to delete this';
        }
            }

            if(isset($_POST['r03delete'])){
                if(date('Y-m-d h-i-sa') <= $realtime1){
                $s03id = $_POST['s03ID'];
                $sql = "DELETE FROM `third_year_rt` WHERE St_ID = '$s03id'";
                $result = mysqli_query($con,$sql);
                if($result){
                    $insertnoti = "Student With ID ".$s03id." have deleted from Third Year Semester I ";
                }else{
                    $insertnoti = "error";
                }
            }else{
                $insertnoti = 'You don\'t have permission to delete this';
            }
                }
                if(isset($_POST['r13delete'])){
                    if(date('Y-m-d h-i-sa') <= $realtime2){
                    $s13id = $_POST['s13ID'];
                    $sql = "DELETE FROM `third_year_ii` WHERE St_ID = '$s13id'";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        $insertnoti = "Student With ID ".$s13id." have deleted from Third Year Semester II ";
                    }else{
                        $insertnoti = "error";
                    }
                }else{
                    $insertnoti = 'You don\'t have permission to delete this';
                }   
       }

if(isset($_POST['r01update'])){
    if(date('Y-m-d h-i-sa') <= $realtime1){
    $s01id = $_POST['s01ID'];
    $s01filed = $_POST['r01field'];
    $newr01value = $_POST['newr01value'];
    $sql = "UPDATE `first_year_rt` SET `$s01filed` = '$newr01value' WHERE St_ID = '$s01id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$s01id.' have updated at First Year Semster I table';
    }
    else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You don\'t have permission to update this';
}
}
if(isset($_POST['r11update'])){
    if(date('Y-m-d h-i-sa') <= $realtime2){
    $s11id = $_POST['s11ID'];
    $s11filed = $_POST['r11field'];
    $newr11value = $_POST['newr11value'];
    $sql = "UPDATE `first_year_ii` SET `$s11filed` = '$newr11value' WHERE St_ID = '$s11id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$s11id.' have updated at First Year Semster II table';
    }
    else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You don\'t have permission to update this';
}
}
if(isset($_POST['r02update'])){
    if(date('Y-m-d h-i-sa') <= $realtime1){
    $s02id = $_POST['S02ID'];
    $s02filed = $_POST['r02field'];
    $newr02value = $_POST['newr02value'];
    $sql = "UPDATE `second_year_rt` SET `$s02filed` = '$newr02value' WHERE St_ID = '$s02id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$s02id.' have updated at Second Year Semster I table';
    }
    else{
        $insertnoti = 'error';
    }
    }else{
        $insertnoti = 'You don\'t have permission to update this'; 
    }
}
if(isset($_POST['r12update'])){
    if(date('Y-m-d h-i-sa') <= $realtime2){
    $s12id = $_POST['s12ID'];
    $s12filed = $_POST['r11field'];
    $newr12value = $_POST['newr12value'];
    $sql = "UPDATE `second_year_ii` SET `$s12filed` = '$newr12value' WHERE St_ID = '$s12id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$s12id.' have updated at Second Year Semster II table';
    }
    else{
        $insertnoti = 'error';
    }
    }else{
        $insertnoti = 'You don\'t have permission to update this'; 
    
    }
}
if(isset($_POST['r03update'])){
    if(date('Y-m-d h-i-sa') <= $realtime1){
    $s03id = $_POST['s03ID'];
    $s03filed = $_POST['r03field'];
    $newr03value = $_POST['newr03value'];
    $sql = "UPDATE `third_year_rt` SET `$s03filed` = '$newr03value' WHERE St_ID = '$s03id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$s03id.' have updated at Third Year Semster I table';
    }
    else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You don\'t permission to update this';
}
}
if(isset($_POST['r13update'])){
    if(date('Y-m-d h-i-sa') <= $realtime2){
    $s13id = $_POST['s13ID'];
    $s13filed = $_POST['r13field'];
    $newr13value = $_POST['newr13value'];
    $sql = "UPDATE `third_year_ii` SET `$s13filed` = '$newr13value' WHERE St_ID = '$s13id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$s13id.' have updated at Third Year Semster II table';
    }
    else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You don\'t permission to update this';
}
}
if(isset($_POST['sm1delete'])){
    if(date('Y-m-d h-i-sa') >=  $realtime2 && date('Y-m-d h-i-sa') <= $realtime3){
    $sm1id = $_POST['sm1ID'];

    $sql = "DELETE FROM `first_sm` WHERE St_ID = '$sm1id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$sm1id.' have deleted From first Year Special Semester';
    }
    else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You are not allowed to delete this';
}
}
if(isset($_POST['sm2delete'])){
    if(date('Y-m-d h-i-sa') >=  $realtime2 && date('Y-m-d h-i-sa') <= $realtime3){
    $sm2id = $_POST['sm2ID'];
    $sql = "DELETE FROM `second_sm` WHERE St_ID = '$sm2id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$sm2id.' have deleted From Second Year Special Semester';
    }else{
        $insertnoti = 'error';
    }
    }else{
        $insertnoti = 'You are not allowed to delete this';
    }
}
if(isset($_POST['sm3delete'])){
    if(date('Y-m-d h-i-sa') >=  $realtime2 && date('Y-m-d h-i-sa') <= $realtime3){
    $sm3id = $_POST['sm3ID'];
    $sql = "DELETE FROM `third_sm` WHERE St_ID = '$sm3id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$sm3id.' have deleted From Third Year Special Semester';
    }else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You are not allowed to delete this';

}
}
if(isset($_POST['sm1update'])){
    if(date('Y-m-d h-i-sa') >=  $realtime2 && date('Y-m-d h-i-sa') <= $realtime3){
    $sm1id = $_POST['sm1ID'];
    $sm1field = $_POST['sm1field'];
    $sm1value = $_POST['sm1value'];

    $sql = "UPDATE `first_sm` SET `$sm1field` = '$sm1value' WHERE St_ID = '$sm1id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$sm1id.' have updated From First Year Special Semester';
    }else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You are not allowed to update this';
}
}
if(isset($_POST['sm2update'])){
    if(date('Y-m-d h-i-sa') >=  $realtime2 && date('Y-m-d h-i-sa') <= $realtime3){
    $sm2id = $_POST['sm2ID'];
    $sm2field = $_POST['sm2field'];
    $sm2value = $_POST['sm2value'];

    $sql = "UPDATE `second_sm` SET `$sm2field` = '$sm2value' WHERE St_ID = '$sm2id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$sm2id.' have updated From Second Year Special Semester';
    }else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You are not allowed to update this';
}
}
if(isset($_POST['sm3update'])){
    if(date('Y-m-d h-i-sa') >=  $realtime2 && date('Y-m-d h-i-sa') <= $realtime3){
    $sm3id = $_POST['sm3ID'];
    $sm3field = $_POST['sm3field'];
    $sm3value = $_POST['sm3value'];

    $sql = "UPDATE `third_sm` SET `$sm3field` = '$sm3value' WHERE St_ID = '$sm3id'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'Student With ID '.$sm3id.' have updated From Third Year Special Semester';
    }else{
        $insertnoti = 'error';
    }
}else{
    $insertnoti = 'You are not allowed to update this';
}
}
if(isset($_POST['crd1update'])){
    $major = $_POST['crd1major'];
    $field = $_POST['crd1field'];
    $newvalue = $_POST['crd1value'];
    $sql = "UPDATE  `firstcredit` SET `$field`='$newvalue' WHERE `Major` = '$major'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'First Year Credit Table have updated';
    }else{
        $insertnoti = 'error';
    }


}
if(isset($_POST['crd2update'])){
    $major = $_POST['crd2major'];
    $field = $_POST['crd2field'];
    $newvalue = $_POST['crd2value'];
    $sql = "UPDATE  `secondcredit` SET `$field`='$newvalue' WHERE `Major` = '$major'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'First Year Credit Table have updated';
    }else{
        $insertnoti = 'error';
    }


}
if(isset($_POST['crd3update'])){
    $major = $_POST['crd3major'];
    $field = $_POST['crd3field'];
    $newvalue = $_POST['crd3value'];
    $sql = "UPDATE  `secondcredit` SET `$field`='$newvalue' WHERE `Major` = '$major'";
    $result = mysqli_query($con,$sql);
    if($result){
        $insertnoti = 'First Year Credit Table have updated';
    }else{
        $insertnoti = 'error';
    }


}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>                                        
<title>Online Student Exam Result System</title> 
<link rel = "stylesheet" href="mypage.css">  
<style type = "text/css">
select{
    width:150px;
}
body{
    
       background-image:url(h4.jpg);
      background-repeat: no-repeat;
        background-size:100% 500%;
        }
</style> 
</head>
<body>
        <div id = "wrapper">
            <div id = "osers">
                <div id = "oserbackend"><h1 style = "text-align:center">WELCOME FROM OSERS DATA MODIFYING PANEL</h2></div>
            <div id = "modify">
        <form action = "modify.php" method = "post">
            <h2>Select Your Table You Want To Modify: <input type="submit" name ="back" value = "BackToHome"/></h2> <div id = "clearpanel"><?php echo '<h3>'.$insertnoti.'</h3>';?></div>
        </div>
        <div id="showActionPane3"> 
        <div id="studentchoice2">
                <label><strong>Choose The Student Table</strong></label>
                <input type="Radio" name="year" value="student1" checked>first year: 
				<input type="Radio" name="year" value = "student2" >second year: 
                <input type="Radio" name="year" value="student3" >third year: 
                <hr/>
            </div>
                <table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="sfield"><option value="St_Name">Student Name</option>
                        <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newsvalue" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "SID" placeholder = "0000"/></td><td><input type="submit" name = "supdate" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "sdelete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The First Year(Semester I)Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="r01field">
                    <option value="St_Name">Student Name</option>
                   
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newr01value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "s01ID" placeholder = "0000"/></td><td><input type="submit" name = "r01update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "r01delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Second Year(Semester I)Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="r02field">
                    <option value="St_Name">Student Name</option>
                   
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newr02value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = 'S02ID' placeholder = "0000"/></td><td><input type="submit" name = "r02update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "r02delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Third Year(Semester I)Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="r03field">
                    <option value="St_Name">Student Name</option>
                   
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newr03value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "s03ID" placeholder = "0000"/></td><td><input type="submit" name = "r03update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "r03delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The First Year(Semester II)Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="r11field">
                    <option value="St_Name">Student Name</option>
                    
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newr11value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "s11ID" placeholder = "0000"/></td><td><input type="submit" name = "r11update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "r11delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Second Year(Semester II)Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="r12field">
                    <option value="St_Name">Student Name</option>
                   
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newr12value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "s12ID" placeholder = "0000"/></td><td><input type="submit" name = "r12update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "r12delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Third Year(Semester II)Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="r13field">
                    <option value="St_Name">Student Name</option>
                    
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "newr13value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "s13ID" placeholder = "0000"/></td><td><input type="submit" name = "r13update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "r13delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The First Year(Special Semester) Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="sm1field">
                    <option value="St_Name">Student Name</option>
                   
                    
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "sm1value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "sm1ID" placeholder = "0000"/></td><td><input type="submit" name = "sm1update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "sm1delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Second Year(Special Semester) Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="sm2field">
                    <option value="St_Name">Student Name</option>
                    
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "sm2value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "sm2ID" placeholder = "0000"/></td><td><input type="submit" name = "sm2update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "sm2delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Third Year(Special Semester) Result Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr><td>Select Column Name</td><td><select name ="sm3field">
                    <option value="St_Name">Student Name</option>
                    
                    <option value ="Major">Major</option>
</select></td><td>Value</td><td><input type = "text" name = "sm3value" placeholder="new value"/></td>
<td>Where Student ID</td><td><input type = "text" name = "sm3ID" placeholder = "0000"/></td><td><input type="submit" name = "sm3update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td><td><input type = "submit" name = "sm3delete" value = "Delete Student" onclick = "return confirm('Are you sure you want to delete')"></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The First Year Credit Point Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr align = "center"><td>Select Column Name</td><td><select name ="crd1field">
                <option value="E-1001" selected = "selected">E-1001</option>
                <option value="P-1001">P-1001</option>
                <option value="CST-1011">1011</option>
                <option value="CST-1021">1021</option>
                <option value="CST-1031">1031</option>
                <option value="M-1002">M-1002</option>
                <option value="E-1002">E-1002</option>
                <option value="P-1002">P-1002</option>
                <option value="CST-1012">1012</option>
                <option value="CST-1022">1022</option>
                <option value="CST-1032">1032</option>
</select></td><td>Value</td><td><input type = "text" name = "crd1value" maxsize = "1" placeholder="new value"/></td><td>Where</td>
<td>Major</td><td><select name = "crd1major"><option selected = "selected">CST</option></seletct></td><td></td><td></td><td><input type="submit" name = "crd1update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Second Year Credit Point Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr align = "center"><td>Select Column Name</td><td><select name ="crd2field">
                <option value="E-2001" selected = "selected">E-2001</option>
                <option value="CST-2011">2011</option>
                <option value="CST-2021">2021</option>
                <option value="CST-2031">2031</option>
                <option value="CST-2041">2041</option>
                <option value="CST-2051">2051</option>
                <option value="E-2002">E-2002</option>
                <option value="CST-2012">2012</option>
                <option value="CST-2022">2022</option>
                <option value="CST-2032">2032</option>
                <option value="CST-2042">2042</option>
                <option value="CST-2052">2052</option>
</select></td><td>Value</td><td><input type = "text" name = "crd2value" maxsize = "1" placeholder="new value"/></td><td>Where</td>
<td>Major</td><td><select name = "crd2major"><option selected = "selected">CS</option><option>CT</option></seletct></td><td></td><td></td><td><input type="submit" name = "crd2update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td></tr>
</table>
<hr/>
<div id="studentchoice2"><h2>Modifying The Third Year Credit Point Table</h2></div>
<table border="0" cellpadding="10" cellspacing="0" align= "center">
                <tr align = "center"><td>Select Column Name</td><td><select name ="crd3field">
                <option value="E-2001" selected = "selected">E-2001</option>
                <option value="CST-2011">2011</option>
                <option value="CST-2021">2021</option>
                <option value="CST-2031">2031</option>
                <option value="CST-2041">2041</option>
                <option value="CST-2051">2051</option>
                <option value="E-2002">E-2002</option>
                <option value="CST-2012">2012</option>
                <option value="CST-2022">2022</option>
                <option value="CST-2032">2032</option>
                <option value="CST-2042">2042</option>
                <option value="CST-2052">2052</option>
</select></td><td>Value</td><td><input type = "text" name = "crd3value" maxsize = "1" placeholder="new value"/></td><td>Where</td>
<td>Major</td><td><select name = "crd3major"><option selected = "selected">CS</option><option>CT</option></seletct></td><td></td><td></td><td><input type="submit" name = "crd3update" value = "Update Student Info" onclick = "return confirm('Are you sure you want to update')" ></td></tr>
</table>
<hr/>
</form>
        </div>
     
                </div>
        </div>  
        
            </div>
</body>
</html>