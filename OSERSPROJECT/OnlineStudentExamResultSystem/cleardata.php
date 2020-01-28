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
$noti ='';
$tablename = '';
$filename = '';
$name = '';
date_default_timezone_set("Asia/Yangon");

    $date = date('Y');

    $date2 = "$date".'-12-1';
    

if(isset($_POST['clearst'])){

    if($date2 < date('Y-m-d')){
        /* logic to do*/
        if(isset($_POST['student1'])){

            $sql = "DELETE FROM `student1`";
            $result = mysqli_query($con,$sql);
            if($result){
                $noti = 'You Data  To First Year Student Have Clear All';
            }
            else{
                $noti = 'error';
            }
        }
        if(isset($_POST['student2'])){
            $sql = "DELETE FROM `student2`";
            $result = mysqli_query($con,$sql);
            if($result){
                $noti = 'You Data  To Second Year Student Have Clear All';
            }
            else{
                $noti = 'error';
            }
        }
        if(isset($_POST['student3'])){
            
                        $sql = "DELETE FROM `student3`";
                        $result = mysqli_query($con,$sql);
                        if($result){
                            $noti = 'You Data  To Third Year Student Have Cleaned Up All';
                        }
                        else{
                            $noti = 'error';
                        }
        
    }
    
    }
    else{
                $noti ='You Are Not Allowed To Clear All Data At The Moment'.'You Can Only Clear until '.$date2;
    }

}
if(isset($_POST['clearrt'])){
    
        if($date2 < date('Y-m-d') ){
    
            /* logic to do*/
            if(isset($_POST['first_rt'])){
                $sql = "DELETE FROM `first_year_rt`";
                $result = mysqli_query($con,$sql);
                if($result){
                    $noti = 'You Data To First Year Result (Semester I) have clean up all';
                }
                else {
                    $noti = 'error';
                }
            }
            if(isset($_POST['second_rt'])){
                $sql = "DELETE FROM `second_year_rt`";
                $result = mysqli_query($con,$sql);
                if($result){
                    $noti = 'You Data To Second Year Result (Semester I) have clean up all';
                }
                else {
                    $noti = 'error';
                }
            }
            if(isset($_POST['third_rt'])){
                $sql = "DELETE FROM `third_year_rt`";
                $result = mysqli_query($con,$sql);
                if($result){
                    $noti = 'You Data To Third Year Result (Semester I) have clean up all';
                }
                else {
                    $noti = 'error';
                }
            }
            if(isset($_POST['first_ii'])){
                $sql = "DELETE FROM `first_year_ii` ";
                $result = mysqli_query($con,$sql);
                if($result){
                    $noti = 'Your Data To First Year Result Table(Semester II) have cleaned up all';

                }
                else{
                    $noti = 'error';
                }
            }
            if(isset($_POST['second_ii'])){
                $sql = "DELETE FROM `second_year_ii` ";
                $result = mysqli_query($con,$sql);
                if($result){
                    $noti = 'Your Data To Second Year Result Table(Semester II) have cleaned up all';

                }
                else{
                    $noti = 'error';
                }
            }
            if(isset($_POST['third_ii'])){
                $sql = "DELETE FROM `third_year_ii` ";
                $result = mysqli_query($con,$sql);
                if($result){
                    $noti = 'Your Data To Third Year Result Table(Semester II) have cleaned up all';

                }
                else{
                    $noti = 'error';
                }
            }
        }
        else{
    
            $noti ='You Are Not Allowed To Clear All Data At The Moment'.'You Can Only Clear until '.$date2;
        }
    
    
    }
    if(isset($_POST['clearsm'])){
        
            if($date2 < date('Y-m-d')){
        
                /* logic to do*/
                if(isset($_POST['first_sm'])){
                    $sql = 'DELETE FROM `first_sm`';
                    $result = mysqli_query($con,$sql);
                    if($result){
                        $noti = 'Your Data To First Year Special Semester Exam Result have cleaned up all';
                    }
                    else{
                        $noti = 'error';
                    }
                }
                if(isset($_POST['second_sm'])){
                    $sql = 'DELETE FROM `second_sm`';
                    $result = mysqli_query($con,$sql);
                    if($result){
                        $noti = 'Your Data To Second Year Special Semester Exam Result have cleaned up all';
                    }
                    else{
                        $noti = 'error';
                    }
                }
                if(isset($_POST['third_sm'])){
                    $sql = 'DELETE FROM `third_sm`';
                    $result = mysqli_query($con,$sql);
                    if($result){
                        $noti = 'Your Data To Third Year Special Semester Exam Result have cleaned up all';
                    }
                    else{
                        $noti = 'error';
                    }
                }
            }
            else{
        
                $noti ='You Are Not Allowed To Clear All Data At The Moment'.'You Can Only Clear until '.$date2;
            }
        
        
        }
        if(isset($_POST['clearinfo'])){
            
                if($date2 < date('Y-m-d') ){
                        
                    /* logic to do*/
                        if(isset($_POST['post'])){
                            $sql = "DELETE FROM `post`";
                            $result = mysqli_query($con,$sql);
                            if($result){
                                $noti = 'Your Data To  Post Table Have Cleaned up All';
                            }
                            else{
                                $noti = 'error';
                            }
                        }
                        if(isset($_POST['semesterexam'])){
                            $sql = "DELETE FROM `semesterexam`";
                            $result = mysqli_query($con,$sql);
                            if($result){
                                $noti = 'Your Data To Special Exam Submittion  Table Have Cleaned up All';
                            }
                            else{
                                $noti = 'error';
                            }
                        }



                }
                else{
                    $noti ='You Are Not Allowed To Clear All Data At The Moment!'.'You Can Only Clear until '.$date2;
                }
            
            
            }
if(isset($_POST['back'])){
    direct('OSERSBACKEND.php');
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
</style> 
</head>
<body>
        <div id = "wrapper">
            <div id = "osers">
                <div id = "oserbackend"><h1 style = "text-align:center">WELCOME FROM OSERS DATA CLEANING PANEL</h2></div>
        <div id = "iconchoicepane2">
        <form action = "cleardata.php" method = "post">
            <h2>Select Your Table You Want To Clear: <input type="submit" name ="back" value = "BackToHome"/></h2> <div id = "clearpanel"><?php echo '<h3>'.$noti.'</h3>';?></div>
        </div>
        <div id="showActionPane"> 
         
            <div id = "deletetable">
            
            <table border = "0" cellspacing = "0" cellpadding= "10" align = "center"  width = "60%">
                <tr align = "center">
                  <th> Student Table Selection:</th>
                    <td><select name="student" id="year_choice" size = "1">
                    <option  value="student1" selected = "selected" >first year: </option>
					<option value = "student2" >second year: </option>
                    <option  value="student3" >third year: </option>
                    
                    </select></td>
                    <td><input type="submit" name ="clearst" onclick = "return confirm('Are you sure you want to delet this table')" width = "50" value = "Clear The Table You Choose"/></td></tr>
                    
                    <tr align = "center"><th>Result Table Selection:</th>
                    <td><select name="result" size = "1">
                    <option value="first_rt" >First_Year_Result_I</option>
                     <option value="second_rt">Second_Year_Result_I</option>
                     <option value="third_rt">Third_Year_Result_I</option>
                     <option value="first_ii" >First_Year_Result_II</option>
                    <option value="second_ii">Second_Year_Result_II</option>
                     <option value="third_ii">Third_Year_Result_II</option>
</select> </td>
<td><input type="submit" name ="clearrt" width = "50" onclick = "return confirm('Are you sure you want to delet this table')"  value = "Clear The Table You Choose"/></td></tr>

                    <tr align = "center"><th>Special_Semester Result Selection:</th>
                    <td><select name = "sm" size = "1">
                        <option value = "first_sm">First Year Special Semester</option>
                        <option value = "second_sm">Second Year Special Semester</option>
                        <option value = "third_sm">Third Year Special Semester</option>
</select></td>
<td><input type="submit" name ="clearsm"  onclick = "return confirm('Are you sure you want to delet this table')" width = "50" value = "Clear The Table You Choose"/></td></tr>
<tr align = "center"><th>Information Table Selection:</th>
<td><select name = "info" size = "1">
    <option value = "post">Post</option>
    <option value = "semesterexam">Special Exam</option>
</select></td>
<td><input type="submit" onclick = "return confirm('Are you sure you want to delet this table')" name ="clearinfo" width = "50" value = "Clear The Table You Choose"/></td></tr>
</div>

</form>

        </div>
     
                </div>
        </div>  
        
            </div>
</body>
</html>