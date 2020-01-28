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
$fileoldname = '';
$name = '';
date_default_timezone_set("Asia/Yangon");
if(isset($_POST['clear'])){
    direct('cleardata.php');
}
if(isset($_POST['modify'])){
    direct('modify.php');
}
if(isset($_POST['insert'])){    
    direct("studentinsert.php");
        }
if(isset($_POST['clear'])){
            direct('cleardata.php');
     }
     
$uploadok = 1;
     if(isset($_POST['upload'])){
         $fileoldname = $_POST['fileoname'];
         if(empty($fileoldname)){
             $noti = 'You Havn\'t Set Any Suitable Name for the file';
         }
         else{
            $YEAR =  date('Y');
         $oname = $_FILES['resultfile']['name'];
         $fileuptype = $_FILES['resultfile']['type'];
         $target = "./uploads/oldresult/".$oname;
         $FileType = pathinfo($oname,PATHINFO_EXTENSION);
         $allowed = array('zip','pdf','docx','xlsx');
         if(!in_array($FileType,$allowed)){
             $insertnoti =   "zip/pdf/docx/xlsh file types only allowed ";
         $uploadok = 0;
         }
         elseif(file_exists($target)){
            $insertnoti =  "sorry file already exist!";
            $uploadok = 0;
         }
         else{
             if($uploadok == 1){
         $sql = "INSERT INTO `oldresult`(`filename`, `file`, `YEAR`) VALUES ('$fileoldname','$oname','$YEAR')";
         $result = mysqli_query($con,$sql);
         move_uploaded_file($_FILES['resultfile']['tmp_name'],$target);
         if($result){
             $insertnoti = 'Your Result File Have Uploaded!';
         }
     }
     }
     }
            
     }
     
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>                                        
<title>Online Student Exam Result System</title> 
<link rel = "stylesheet" href="mypage.css">  
<style>
table{
    background-color:white;
}</style>
</head>
<body>
<form action = "OSERSBACKEND.php" method = "post">
        <div id = "wrapper">
            <div id = "osers">
                <div id = "oserbackend"><h1 style = "text-align:center">WELCOME FROM OSERS PANEL</h2></div>
                <div id = "iconchoicepane2">
 
                    Table Selection:
                    <select name="year_result" id="year_choice" size = "1">
                    <option  value="student1" selected = "selected" >first year: </option>
					<option value = "student2" >second year: </option>
                    <option  value="student3" >third year: </option>
                     <option value="first_rt" >First_Year_Result_I</option>
                     <option value="second_rt">Second_Year_Result_I</option>
                     <option value="third_rt">Third_Year_Result_I</option>
                     <option value="first_rt_II" >First_Year_Result_II</option>
                    <option value="second_rt_II">Second_Year_Result_II</option>
                     <option value="third_rt_II">Third_Year_Result_II</option>
            
                    
                    </select>
                    <input type="submit" name ="selectall" value = "View Table"/><?php echo ' '.' ';?><input type ="submit" name = "viewsm" value = "View Special Semester Result Table"/><input type = "submit" name="viewcredit" value="view credit table"/><div id="inserterror2"><?php echo $insertnoti;?></div><div id = "homeb"><a href = "logout.php" style="color:black;">Log Out!</a></div>

                    <br><hr/>
                    <div id = "ActionChoice">
                    <input type="submit" name ="insert" value = "INSERT DATA"/>
                    <input type="submit" name ="modify" value = "MODIFY TABLE"/>
                    <input type="submit" name ="clear" value = "CLEAN DATA"/>
                    <input type="submit" name ="download" value = "DOWNLOAD RESULT FILE"/>
                    <input type="submit" name ="uploadold" value = "Upload To Old Result!"/>

<form action = "OSERSBACKEND.php" method = "post">
                    <input type="text" name = "search" placeholder = "Search CGBA.......">
                    <input type = "submit" name = "searched" value = "search">
                    </div>
</div>
        
</form>
</form>
        <div id="showActionPane"> 
        <?php 
        if(isset($_POST['download'])){ ?>
<div id = "downloadpane">
<h4 style ="text-align:center;font-size:20;">Download File Lists</h4>
<?php 
 $sql = "SELECT * FROM `resultblob`";
     $result= mysqli_query($con,$sql);
            echo '<ul type = "square">';
            while($row = mysqli_fetch_array($result)){
                $filename = $row['fname'];
            $name = $row['name'];

?>  

<li><a href = "uploads/<?php echo $name;?>">download<?php echo ' '.$filename;?></a></li>


<?php } 
echo '</ul>';
echo '</div>';


        }
        if(isset($_POST['selectall'])){
            echo '<div id = "selectall">';
            
            if($_POST['year_result'] ==  'first_rt'){
                
                                     echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                                    echo '<caption>First Year Result Semester_I Table</caption>';
                                    echo '<tr><th>No</th><th>ID</th><th>Name</th><th>Myanmar</th><th>English</th><th>Physics</th><th>1011</th><th>1021</th><th>1031</th><th>GPA</th><th>Major</th></tr>';
                                    $sql = "SELECT * FROM `first_year_rt` ";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)){
                
                                        echo '<tr><td>'.$row['ID'].'</td><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['M-100'].'</td><td>'.$row['E-100'].'</td><td>'.$row['P-100'].'</td><td>'.$row['CST-101'].'</td><td>'.$row['CST-102'].'</td><td>'.$row['CST-103'].'</td><td>'.$row['GPA'].'</td><td>'.$row['Major'].'</td></tr>';
                                    }
                
                
                                 }
                                 elseif($_POST['year_result'] ==  'second_rt'){
                                    echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                                    echo '<caption>Second Year Result Semester_I Table</caption>';
                                    echo '<tr><th>No</th><th>ID</th><th>Name</th><th>E_2001</th><th>2011</th><th>2021</th><th>2031</th><th>2041</th><th>2051</th><th>GPA</th><th>Major</th></tr>';
                                    $sql = "SELECT * FROM `second_year_rt` ";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)){
                
                                        echo '<tr><td>'.$row['ID'].'</td><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['E-200'].'</td><td>'.$row['CST-201'].'</td><td>'.$row['CST-202'].'</td><td>'.$row['CST-203'].'</td><td>'.$row['CST-204'].'</td><td>'.$row['CST-205'].'</td><td>'.$row['GPA'].'</td><td>'.$row['Major'].'</td></tr>';
                                    }


                                 }elseif($_POST['year_result'] ==  'third_rt'){
                                    echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                                    echo '<caption>Third Year Result Semester_I Table</caption>';
                                    echo '<tr><th>No</th><th>ID</th><th>Name</th><th>E_3001</th><th>3011</th><th>3021</th><th>3031</th><th>3041</th><th>3051</th><th>GPA</th><th>Major</th></tr>';
                                    $sql = "SELECT * FROM `third_year_rt` ";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)){
                
                                        echo '<tr><td>'.$row['ID'].'</td><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['E-300'].'</td><td>'.$row['CST-301'].'</td><td>'.$row['CST-302'].'</td><td>'.$row['CST-303'].'</td><td>'.$row['CST-304'].'</td><td>'.$row['CST-305'].'</td><td>'.$row['GPA'].'</td><td>'.$row['Major'].'</td></tr>';
                                    }


                                 }
                                 elseif($_POST['year_result'] ==  'first_rt_II'){
                                    echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                                    echo '<caption>First Year Result Semester_II Table</caption>';
                                    echo '<tr><th>No</th><th>ID</th><th>Name</th><th>Myanmar</th><th>English</th><th>Physics</th><th>1012</th><th>1022</th><th>1032</th><th>GPA</th><th>Major</th></tr>';
                                    $sql = "SELECT * FROM `first_year_ii` ";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)){
                
                                        echo '<tr><td>'.$row['ID'].'</td><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['M-1002'].'</td><td>'.$row['E-1002'].'</td><td>'.$row['P-1002'].'</td><td>'.$row['CST-1012'].'</td><td>'.$row['CST-1022'].'</td><td>'.$row['CST-1032'].'</td><td>'.$row['GPA'].'</td><td>'.$row['Major'].'</td></tr>';
                                    }


                                 }elseif($_POST['year_result'] ==  'second_rt_II'){
                                    echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                                    echo '<caption>Second Year Result Semester_II Table</caption>';
                                    echo '<tr><th>No</th><th>ID</th><th>Name</th><th>E_2002</th><th>2012</th><th>2022</th><th>2032</th><th>2042</th><th>2052</th><th>GPA</th><th>Major</th></tr>';
                                    $sql = "SELECT * FROM `second_year_ii` ";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)){
                
                                        echo '<tr><td>'.$row['ID'].'</td><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['E-2002'].'</td><td>'.$row['CST-2012'].'</td><td>'.$row['CST-2022'].'</td><td>'.$row['CST-2032'].'</td><td>'.$row['CST-2042'].'</td><td>'.$row['CST-2052'].'</td><td>'.$row['GPA'].'</td><td>'.$row['Major'].'</td></tr>';
                                    }



                                 }elseif($_POST['year_result'] ==  'third_rt_II'){

                                    echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                                    echo '<caption>Third Year Result Semester_II Table</caption>';
                                    echo '<tr><th>No</th><th>ID</th><th>Name</th><th>E_3002</th><th>3012</th><th>3021</th><th>3032</th><th>3042</th><th>3052</th><th>GPA</th><th>Major</th></tr>';
                                    $sql = "SELECT * FROM `third_year_ii` ";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)){
                
                                        echo '<tr><td>'.$row['ID'].'</td><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['E-3002'].'</td><td>'.$row['CST-3012'].'</td><td>'.$row['CST-3022'].'</td><td>'.$row['CST-3032'].'</td><td>'.$row['CST-3042'].'</td><td>'.$row['CST-3052'].'</td><td>'.$row['GPA'].'</td><td>'.$row['Major'].'</td></tr>';
                                    }
                                 }

                            elseif($_POST['year_result'] == 'student1'){
                            echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                            echo '<caption>First Year Students</caption>';
                            echo '<tr><th>ID</th><th>Name</th><th>DeptID</th></tr>';
                            $sql = "SELECT * FROM `student1`";
                            $result = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result)){

                                echo '<tr><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['deptID'].'</td></tr>';
                            }


                            }elseif($_POST['year_result'] == 'student2'){
                             
                            echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                            echo '<caption>Second Year Students</caption>';
                            echo '<tr><th>ID</th><th>Name</th><th>DeptID</th></tr>';
                            $sql = "SELECT * FROM `student2`";
                            $result = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result)){

                                echo '<tr><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['deptID'].'</td></tr>';


                             }
            
            
                             }elseif($_POST['year_result'] == 'student3'){

                            echo '<table border = "1" cellspacing = "0" cellpadding = "10" width = "80%" align = "center">';
                            echo '<caption>Third Year Students</caption>';
                            echo '<tr><th>ID</th><th>Name</th><th>DeptID</th></tr>';
                            $sql = "SELECT * FROM `student3`";
                            $result = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result)){

                                echo '<tr><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['deptID'].'</td></tr>';


                             }
                         

                             }
                            
                             
                    }
                    if(isset($_POST['uploadold'])){ ?>
            <div id = "fileuploadpane2">
            <form method = "post" action = "OSERSBACKEND.php" enctype = "multipart/form-data">
            <p style = "text-align:center"><strong>Text Your Suitable File Name</strong></p><hr/>
            <div id = "alignmentforuploadtext"><?php echo ' '.' '.' ';?><input type = "text" name = "fileoname"  cols = "20" placeholder = "Semester-I/firstyearresult"/></div><hr/>
            <div id = "padforbrowse"><?php echo ' '.' '.' ';?><input type = "file" name = "resultfile"/></div>
            <hr/>
            <div id="btuploadpane"><?php echo ' ';?><button name = "upload" align = "center">Upload </button></div>
        
            <hr/>
        
           
            </div>
                        
                  <?php  }
                  if(isset($_POST['viewsm'])){
                    $result1 = mysqli_query($con,"SELECT * FROM `first_sm`");
                    echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "5" align = "center">';
                    echo '<caption><h2>First Year Special_Semester Result!</h2></caption>';
                    echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>M-1001</h2></th><th><h2>E-1001</h2></th><th><h2>P-1001</h2></th><th><h2>1011</h2></th><th><h2>1021</h2></th><th><h2>1031</h2></th><th><h2>M-1002</h2></th><th><h2>E-1002</h2></th><th><h2>P-1002</h2></th><th><h2>1012</h2></th><th><h2>1022</h2></th><th><h2>1032</h2></th><th><h2>GPA</h2></th></tr>';
                    while($row = mysqli_fetch_array($result1)){
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

                 echo '<td>'.$row['GPA'].'</td>'.'</tr>';
                    }
                    
                 echo '</table>';
                 echo '<hr/>';
                 $result2 = mysqli_query($con,"SELECT * FROM `second_sm`");
                 echo '<table border = "1" width = "95%" cellspacing = "0" cellpadding = "5" align = "center">';
                 echo '<caption><h2>Second Year Special_Semester Result!</h2></caption>';
                 echo '<tr style = "background-color:#BAE4EF;"><th><h2>ID</h2></th><th><h2>Name</h2></th><th><h2>E_2001</h2></th><th><h2>2011</h2></th><th><h2>2021</h2></th><th><h2>2031</h2></th><th><h2>2041</h2></th><th><h2>2051</h2></th><th><h2>E_2002</h2></th><th><h2>2012</h2></th><th><h2>2022</h2></th><th><h2>2032</h2></th><th><h2>2042</h2></th><th><h2>2052</h2></th><th><h2>GPA</h2></th></tr>';
                 while($row = mysqli_fetch_array($result2)){
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

              echo '<td>'.$row['GPA'].'</td>'.'</tr>';
                 }
                 
              echo '</table>';
              echo '<hr/>';
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
                  echo '<td>'.$row['GPA'].'</td>'.'</tr>';
              }
              
           echo '</table>';
           echo '<hr/>';
                  }
                  if(isset($_POST['viewcredit'])){  ?>
                  <table border = "1" cellspacing= "0" width= "70%" cellpadding= "5px" align = "center">
                  <caption><h2>First Year Subjects Credit Table</h2></caption>
                  <tr align = "center" style = "background-color:#CFE5ED"><th>M-1001</th><th>E-1001</th><th>P-1001</th><th>1011</th><th>1021</th><th>1031</th><th>M-1001</th><th>E-1002</th><th>P-1002</th><th>1012</th><th>1022</th><th>1032</th><th>Major</th></tr>
                    
             <?php     
                    $fq = "SELECT * FROM `firstcredit`";
                    $res1 = mysqli_query($con,$fq);
                    while($row = mysqli_fetch_array($res1)){
                        echo '<tr align = "center"><td>'.$row['M-1001'].'</td><td>'.$row['E-1001'].'</td><td>'.$row['P-1001'].'</td><td>'.$row['CST-1011'].'</td><td>'.$row['CST-1021'].'</td><td>'.$row['CST-1031'].'</td><td>'. $row['M-1002'].'</td><td>'.$row['E-1002'].'</td><td>'.$row['P-1002'].'</td><td>'.$row['CST-1012'].'</td><td>'.$row['CST-1022'].'</td><td>'.$row['CST-1032'].'</td><td>'.$row['Major'].'</td></tr>';
                    }
                    echo '</table>';
                    echo '<hr/>';
                    ?>
                     <table border = "1" width= "70%"  cellspacing= "0" cellpadding= "5px" align = "center">
                  <caption><h2>Second Year Subjects Credit Table</h2></caption>
                  <tr align = "center" style = "background-color:#CFE5ED"><th>E-2001</th><th>2011</th><th>2021</th><th>2031</th><th>2041</th><th>2051</th><th>E-2002</th><th>2012</th><th>2022</th><th>2032</th><th>2042</th><th>2052</th><th>Major</th></tr>

          <?php 
           $fq2 = "SELECT * FROM `secondcredit`";
           $res2 = mysqli_query($con,$fq2);
           while($row = mysqli_fetch_array($res2)){
               echo '<tr align = "center"><td>'.$row['E-2001'].'</td><td>'.$row['CST-2011'].'</td><td>'.$row['CST-2021'].'</td><td>'.$row['CST-2031'].'</td><td>'.$row['CST-2041'].'</td><td>'.$row['CST-2041'].'</td><td>'. $row['E-2002'].'</td><td>'.$row['CST-2012'].'</td><td>'.$row['CST-2022'].'</td><td>'.$row['CST-2032'].'</td><td>'.$row['CST-2042'].'</td><td>'.$row['CST-2052'].'</td><td>'.$row['Major'].'</td></tr>';
           }
           echo '</table>';
           echo '<hr/>';

           ?>

>
                     <table border = "1" width= "70%"  cellspacing= "0" cellpadding= "5px" align = "center">
                  <caption><h2>Third Year Subjects Credit Table</h2></caption>
                  <tr align = "center" style = "background-color:#CFE5ED"><th>E-3001</th><th>3011</th><th>3021</th><th>3031</th><th>3041</th><th>3051</th><th>E-3002</th><th>3012</th><th>3022</th><th>3032</th><th>3042</th><th>3052</th><th>Major</th></tr>
          
         <?php  
         
         $fq2 = "SELECT * FROM `thirdcredit`";
         $res2 = mysqli_query($con,$fq2);
         while($row = mysqli_fetch_array($res2)){
             echo '<tr align = "center"><td>'.$row['E-3001'].'</td><td>'.$row['CST-3011'].'</td><td>'.$row['CST-3021'].'</td><td>'.$row['CST-3031'].'</td><td>'.$row['CST-3041'].'</td><td>'.$row['CST-3041'].'</td><td>'. $row['E-3002'].'</td><td>'.$row['CST-3012'].'</td><td>'.$row['CST-3022'].'</td><td>'.$row['CST-3032'].'</td><td>'.$row['CST-3042'].'</td><td>'.$row['CST-3052'].'</td><td>'.$row['Major'].'</td></tr>';
         }
         echo '</table>';
         echo '<hr/>';
        }
           
        if(isset($_POST['searched'])){
           echo  '<div id = "fileuploadpane3">';
           $key = '';
           $id = 0;
           $gpa = 0;
           $text = '';
           $year = '';
           $key = $_POST['search'];
           /*if(preg_match("/[0-9]/",$key)){
               $id = $key;
           }
           elseif(preg_match("/[0-9-]/",$key)){
               $year = '';
           }
           elseif(preg_match("/[a-zA-Z-]/",$key)){
                $text = $key;
           }
           elseif(preg_match("/[0-9.]/",$key)){
               $gpa = $key;
           }*/
           
           if(empty($key)){
               echo 'Cannot Find Any Related Data';
           }else{
                $sql = "SELECT * FROM `cumulative` WHERE St_ID LIKE '$key%' OR Year LIKe '$key%' OR CGBAGRADE LIKE '$key%' OR AcdYear LIKE '$key%'";
                $result = mysqli_query($con,$sql);
                if(empty($result)){
                    echo 'Cannot find related data';
                }else{
                    echo '<table border = "0" width = "80%" align = "center" cellspacing = "0" cellpadding = "5">';
                    echo '<caption><h2>Your Search Result</h2></caption>';
                    echo '<tr align="center"><th>ID</th><th>Name</th><th>Acadamic Year</th><th>Year</th><th>CGBA</th></tr>';
                    while($row = mysqli_fetch_array($result)){
                        echo '<tr align ="center"><td>'.$row['St_ID'].'</td><td>'.$row['St_Name'].'</td><td>'.$row['AcdYear'].'</td><td>'.$row['Year'].'</td><td>'.$row['CGBAGRADE'].'</td><td>';
                    }

                    echo '</table>';
                }

           }

           echo  '</div>';
        }
       ?>
        
        
        </div>
                </div>
        </div>  
        
            </div>
</body>
</html>