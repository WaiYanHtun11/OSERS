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
$time1 = mysqli_query($con,"SELECT * FROM resulttime Where id = '1'");
while($row = mysqli_fetch_array($time1)){
    $date = $row['Date'];
    $time = date('H-i-sa',strtotime($row['Time']));
    $realtime1 = $date.''.$time;
}
if(isset($_POST['back'])){
    direct('OSERSBACKEND.php');
}
if(isset($_POST['insertonce'])){
    if(date('Y-m-d h-i-sa') < $realtime1){
    $inset = true;
    $tablename = $_POST['year'];
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $major= $_POST['major'];
    if(empty($pid) || empty($pname)){
        $insertinfo = 'You can\' insert an empty row';
        $inset = false;
    }
    elseif(!preg_match("/[0-9]/",$pid) || !preg_match("/[a-zA-Z]/",$pname)){
        $insertinfo = 'Invalid Input Data Type!';
        $inset = false;
    }
    else{
        $search = "SELECT * FROM `$tablename`";
        $result = mysqli_query($con,$search);
        while($row = mysqli_fetch_array($result)){
            if($pid == $row['St_ID']){
                $inset = false;
                $insertinfo = 'Sorry Data alreay exist';
            }
        }
       if($inset){
        $sql = "INSERT INTO `$tablename`(`St_ID`, `St_Name`, `deptID`) VALUES ('$pid','$pname','$major')";
        $result = mysqli_query($con,$sql);
        if($result){
            $tname = '';
            switch($tablename){
                case 'student1':$tname = 'First Year Student Table';break;
                case 'student2':$tname = 'Second Year Student Table';break;
                case 'student3':$tname = 'Third Year Student Table';break;
                default:break;
            }
            $insertinfo = 'Your Data to '.$tname.' Have inserted';
        }
        else{
            $insertinfo = "error";
        }
       }
    }
}else{
    $insertinfo = 'You don\'t have permission To Insert Students';
}
}
if(isset($_POST['insertall'])){
    if(date('Y-m-d h-i-sa') < $realtime1){
    $insertok = true;
    $tablename = $_POST['year'];
   $id1 = $_POST['id1'];
   if(!preg_match("/[0-9]/",$id1)){
    $insertok = false;
   }
   $search1 = "SELECT * FROM `$tablename`";
   $result1 = mysqli_query($con,$search1);
   while ($row1 = mysqli_fetch_array($result1)){
       if($id1 == $row['St_ID']){
           $insertok = false;
           $insertinfo = "Sorry Data already exist!";
           
       }
   }
   $n1 = $_POST['n1'];
   if(!preg_match("/[a-z A-Z]/",$n1)){
    
        $insertok = false;
   }
   $m1 = $_POST['m1'];
   $id2 = $_POST['id2'];
   while ($row1 = mysqli_fetch_array($result1)){
       if($id2 == $row['St_ID']){
           $insertok = false;
           $insertinfo = "Sorry Data already exist!";
       }
   }
   if(!preg_match("/[0-9]/",$id2)){
    $insertok = false;
   }
   $n2 = $_POST['n2'];
   if(!preg_match("/[a-z A-Z]/",$n2)){
    
        $insertok = false;
   }
   $m2 = $_POST['m2'];
   $id3 = $_POST['id3'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id3 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   if(!preg_match("/[0-9]/",$id3)){
    $insertok = false;
   }
   $n3 = $_POST['n3'];
   if(!preg_match("/[a-z A-Z]/",$n3)){
    
        $insertok = false;
   }
   $m3 = $_POST['m3'];
   $id4 = $_POST['id4'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id4 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   if(!preg_match("/[0-9]/",$id4)){
    $insertok = false;
   }
   $n4 = $_POST['n4'];
   if(!preg_match("/[a-z A-Z]/",$n4)){
    
        $insertok = false;
   }
   $m4 = $_POST['m4'];
   $id5 = $_POST['id5'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id5 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   if(!preg_match("/[0-9]/",$id5)){
    $insertok = false;
   }
   $n5 = $_POST['n5'];
   if(!preg_match("/[a-z A-Z]/",$n5)){
    
        $insertok = false;
   }
   $m5 = $_POST['m5'];
   $id6 = $_POST['id6'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id6 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   if(!preg_match("/[0-9]/",$id6)){
    $insertok = false;
   }
   $n6 = $_POST['n6'];
   if(!preg_match("/[a-z A-Z]/",$n6)){
    
        $insertok = false;
   }
   $m6 = $_POST['m6'];
   $id7 = $_POST['id7'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id7 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   if(!preg_match("/[0-9]/",$id7)){
    $insertok = false;
   }
   $n7 = $_POST['n7'];
   if(!preg_match("/[a-z A-Z]/",$n7)){
    
        $insertok = false;
   }
   $m7 = $_POST['m7'];
   $id8 = $_POST['id8'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id8 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   
   if(!preg_match("/[0-9]/",$id8)){
    $insertok = false;
   }
   $n8 = $_POST['n8'];
   if(!preg_match("/[a-z A-Z]/",$n8)){
    
        $insertok = false;
   }
   $m8 = $_POST['m8'];
   $id9 = $_POST['id9'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id9 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
   if(!preg_match("/[0-9]/",$id9)){
    $insertok = false;
   }
   $n9 = $_POST['n9'];
   if(!preg_match("/[a-z A-Z]/",$n9)){
    
        $insertok = false;
   }
   $m9 = $_POST['m9'];
   $id10 = $_POST['id10'];
   while ($row1 = mysqli_fetch_array($result1)){
    if($id10 == $row['St_ID']){
        $insertok = false;
         while ($row1 = mysqli_fetch_array($result1)){
    if($id10 == $row['St_ID']){
        $insertok = false;
        $insertinfo = "Sorry Data already exist!";
    }
}
    }
}
   if(!preg_match("/[0-9]/",$id10)){
    $insertok = false;
   }
   $n10 = $_POST['n10'];
   if(!preg_match("/[a-z A-Z]/",$n10)){
    
        $insertok = false;
   }
   $m10 = $_POST['m10'];
   $student = array($id1,$n1,$id2,$n2,$id3,$n3,$id4,$n4,$id5,$n5,$id6,$n6,$id7,$n7,$id8,$n8,$id9,$n9,$id10,$n10);
   for($i = 0;$i<20;$i++){
    if(empty($student[$i])){
        $insertok = false;
        break;
    }

   }
    if($insertok){
        $sql = "INSERT INTO `$tablename`(`St_ID`, `St_Name`, `deptID`) VALUES ('$id1','$n1','$m1'),
        ('$id2','$n2','$m2'),('$id3','$n3','$m3'),
            ('$id4','$n4','$m4'),('$id5','$n5','$m5'),
    ('$id6','$n6','$m6'),('$id7','$n7','$m7'),
('$id8','$n8','$m8'),('$id9','$n9','$m9'),
('$id10','$n10','$m10')";
$result = mysqli_query($con,$sql);
if($result){
    $tname = '';
    switch($tablename){
        case 'student1':$tname = 'First Year Student Table';break;
        case 'student2':$tname = 'Second Year Student Table';break;
        case 'student3':$tname = 'Third Year Student Table';break;
        default:break;
    }
    $insertinfo = 'Your Data to '.$tname.' Have inserted 10 Students';
}
else{
    $insertinfo = "error";
}
    }else{

        $insertinfo = 'You forget something to fill! or Invalid Input(like Id = 0-9 name = a-z/A-Z)';
    }
}else{
    $insertinfo = 'You Don\'t have permission To Insert Students';
}
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
                    <div id="insertinfo"><h3><?php echo $insertinfo;?><h3></div>
        
</form>

        </div><hr/>
        <div id="showinsertpane">   
            <div id="studentchoice">
                <form action="studentinsert.php" method="post">
                <label><strong>Choose The Student Table</strong></label>
                <?php if(isset($_POST['year']) == 'student1'){
                echo '<input type="Radio" name="year" value="student1" checked>first year:';
				echo '<input type="Radio" name="year" value = "student2" >second year:';
				echo '<input type="Radio" name="year" value="student3" >third year:';
                }elseif(isset($_POST['year']) == 'student2'){ 
                         echo '<input type="Radio" name="year" value="student1" >first year:';
                         echo '<input type="Radio" name="year" value = "student2" checked>second year:';
                         echo '<input type="Radio" name="year" value="student3" >third year:';

               }elseif(isset($_POST['year']) == 'student3'){ 
                echo '<input type="Radio" name="year" value="student1" >first year:';
                      echo    '<input type="Radio" name="year" value = "student2" checked>second year:';
                        echo  '<input type="Radio" name="year" value="student3" >third year:';
                }else{
                echo '<input type="Radio" name="year" value="student1" checked>first year:';
                      echo  '<input type="Radio" name="year" value = "student2" >second year:';
                         echo '<input type="Radio" name="year" value="student3" >third year:';
               }?>
            </div>
            <div id="studetinsertpane">
            <table border= "0" align= "center" width = "60%" cellspacing="0" cellpadding="10" background-color="white">
            <caption align ="center"><strong>Insert You Data here</caption>
            <tr><th>ID</th><th>Name</th><th>Major</th></tr>
            <tr align = "center"><th><input type = "text"  name="pid" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"   name="pname" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "major">
           
                <option selected = "selected">CST</option>
                <option>CS</option>
                <option>CT</option>
              </select>

            </td><td><input type ="submit" name ="insertonce" value= "Insert One Student"  onclick = "return confirm('Are you sure to Insert  Data!')"/></td><tr>
            <tr align = "center"><td></td><th>Insert Multiple Row</th><td></td></tr>
            <tr align = "center"><th><input type = "text"  name="id1" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n1" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m1">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>

              <tr align = "center"><th><input type = "text" name="id2" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n2" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m2">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>
              <tr align = "center"><th><input type = "text"  name="id3" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n3" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m3">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>
              <tr align = "center"><th><input type = "text"  name="id4" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n4" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m4">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>

              <tr align = "center"><th><input type = "text"  name="id5" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n5" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m5">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>

              <tr align = "center"><th><input type = "text" name="id6" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n6" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m6">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>

              <tr align = "center"><th><input type = "text"  name="id7" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n7" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m7">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>

              <tr align = "center"><th><input type = "text" name="id8" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n8" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m8">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>
              <tr align = "center"><th><input type = "text" name="id9" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n9" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m9">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>

              <tr align = "center"><th><input type = "text" name="id10" placeholder="0000" maxlength="4" ></td><td>
            <input type = "text"  name="n10" placeholder="Student name" maxlength="30" max="30"></td>
            <td><select name = "m10">
            <option selected = "selected">CST</option>
            <option>CS</option>
            <option>CT</option>
          </select>
              </td><td><input type ="submit" name ="insertall" value= "Insert 10 Student" onclick = "return confirm('Are you sure to Insert All Data!')"/></td></tr>
              </form>
            </div>
        </div>
                </div>
        </div>  
        
            </div>
</body>
</html>
