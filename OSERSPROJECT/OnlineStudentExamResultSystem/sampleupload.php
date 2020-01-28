<?php 
$target_dir = "uploads/";
$target_file = '';
$uploadOK= 1;

if(isset($_POST['upload'])){
$target_file = $target_dir.basename($_FILES["filetoupload"]['name']);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["filetoupload"]['tmp_name']);
        if($check!== false){
            echo "File is an image-".$check["mime"];
            $uploadOK = 1;
        }else{
            $uploadOK = 0;
        }
        if(file_exists($target_file)){
            echo "sorry,file already exists.";
            $uploadOK = 0 ;
        }
        if($_FILES["filetoupload"]['size'] > 500000){
        echo  "Sorry ,your file is too large.";
        $uploadOK = 0;
    }
       /* if($imageFileType != "JPG" && $imageFileType != "PNG"
        && $imageFileType != "JPEG"  && $imageFileType != "GIF" ){
        
            echo "sorry,only jpg,jpeg,png $ gif files are allowede.";
            $uploadOK = 0;
            
         }*/
         
         if($uploadOK == 0){
        
            echo "sorry,your file was not uploaded";
         }
         else {
            if(move_uploaded_file($_FILES["filetoupload"]['tmp_name'],$target_file)){
       
               echo "The file".basename($_FILES["filetoupload"]['name']).'has been uploaded';
       
            }
            else{
                echo 'sorry there was an error uploading your file';
            }
}


 }
 ?>
<!DOCTYPE html>
<html>
<head><title>file upload</title>
</head>
<body>
<form action = "sampleupload.php" method = "post" enctype = "multipart/form-data">
Select image to upload:
<input type="file" name="filetoupload" id="fileToupload">
<input type ="submit" name = "upload" value="upload file">
</form>
</body>
</html>
