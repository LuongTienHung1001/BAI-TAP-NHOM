
<?php 
// Include the database configuration file 
// include_once 'dbConfig.php'; 
     
// if(isset($_POST['submit'])){ 
//     // File upload configuration 
//     $targetDir = "uploads/"; 
//     $allowTypes = array('jpg','png','jpeg','gif','PNG','JPG'); 
     
//     $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
//     $fileNames = array_filter($_FILES['files']['name']); 
//     if(!empty($fileNames))
//     { 
//         foreach($_FILES['files']['name'] as $key=>$val){ 
//             // File upload path 
//             $fileName = basename($_FILES['files']['name'][$key]); 
//             $targetFilePath = $targetDir . $fileName; 
             
//             // Check whether file type is valid 
//             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
//             if(in_array($fileType, $allowTypes)){ 
//                 // Upload file to server 
//                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
//                     // Image db insert sql 
//                     $insertValuesSQL .= "('".$fileName."', NOW()),"; 
//                 }else{ 
//                     $errorUpload .= $_FILES['files']['name'][$key].' | '; 
//                 } 
//             }else{ 
//                 $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
//             } 
//         } 
         
//         // Error message 
//         $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
//         $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
//         $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
//         if(!empty($insertValuesSQL)){ 
//             $insertValuesSQL = trim($insertValuesSQL, ','); 
//             // Insert image file name into database 
//             $insert = $db->query("INSERT INTO db_images (file_name, uploaded_on) VALUES $insertValuesSQL"); 
//             if($insert){ 
//                 $statusMsg = "c??c file ???? ???????c t???i l??n th??nh c??ng .".$errorMsg; 
//                 header("location: form-add_tour.php?showTB= $statusMsg"); 
//             }else{ 
//                 echo mysqli_error();
//                 $statusMsg = "???? x???y ra l???i khi t???i file - Vui l??ng ki???m tra l???i"; 
//                 header("location: form-add_tour.php?showTB= $statusMsg"); 
//             } 
//         }else{ 
//             $statusMsg = "T???i l??n th???t b???i ! L???i : ".$errorMsg; 
//             header("location: form-add_tour.php?showTB= $statusMsg"); 
//         } 
//     }else{ 
//         $statusMsg = 'B???n ch??a ch???n file n??o !'; 
//         header("location: form-add_tour.php?showTB= $statusMsg"); 
//     } 
// } 
 

?>

<?php


// TR?????NG H???P L???A CH???N FILE TR??NG NHAU 
// Include the database configuration file 
include_once 'db.php'; 
     
if(isset($_POST['submit']))
{ 
     if(file_exists($targetFilePath))
            {   
                $statusMsg =  "???? t???n t???i t???p tin ( " . $fileName  . " ) vui l??ng ki???m tra l???i";
                header("location: form_post.php.php?showTB= $statusMsg"); 
            }
            else
            {
                    // File upload configuration 
                    $targetDir = "uploads/"; 
                    $allowTypes = array('jpg','png','jpeg','gif','PNG','JPG','webp'); 
                    
                    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                    $fileNames = array_filter($_FILES['files']['name']); 
                    if(!empty($fileNames)){ 
                        foreach($_FILES['files']['name'] as $key=>$val){ 
                            // File upload path 
                            $fileName = basename($_FILES['files']['name'][$key]); 
                            $targetFilePath = $targetDir . $fileName; 
                            
                            // Check whether file type is valid 
                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                            if(in_array($fileType, $allowTypes)){ 
                                // Upload file to server 
                                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                                    // Image db insert sql 
                                    $ma_tour = $_POST['txtText'];
                                    $insertValuesSQL .= "('".$fileName."', NOW() ,'".$ma_tour."'  ),"; // CH??? TH??M GI?? TR??? C???A MA_TOUR ($matour = $_POST['ma_tour'];)
                                }else{ 
                                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                                } 
                            }else{ 
                                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                            } 
                        } 
                        
                        // Error message 
                        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                        
                        if(!empty($insertValuesSQL)){ 
                            $insertValuesSQL = trim($insertValuesSQL, ','); 
                            
                            // Insert image file name into database 
                            $insert = $db->query("INSERT INTO dangbai (file_name, upload_on,Content) VALUES $insertValuesSQL"); 
                            if($insert){ 
                                $statusMsg = "c??c file ???? ???????c t???i l??n th??nh c??ng .".$errorMsg; 
                                header("location: form_post.php?showTB= $statusMsg"); 
                            }else{ 
                                $statusMsg = "???? x???y ra l???i khi t???i file - Vui l??ng ki???m tra l???i"; 
                                header("location: form_post.php?showTB= $statusMsg"); 
                            } 
                        }else{ 
                            $statusMsg = "T???i l??n th???t b???i ! L???i : ".$errorMsg; 
                            header("location: form_post.php?showTB= $statusMsg"); 
                        } 
                    }else{ 
                        $statusMsg = 'B???n ch??a ch???n file n??o !'; 
                        header("location: form_post.php?showTB= $statusMsg"); 
                    } 

            }
    
} 

?>


<?php
/* 
// L???A CH???N UPLOAD 1 FILE
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))
        {
            if(file_exists($targetFilePath))
            {   
                $statusMsg =  "???? t???n t???i t???p tin ( " . $fileName  . " ) vui l??ng ki???m tra l???i";
                header("location: form-add_tour.php?showTB= $statusMsg"); 
            }
            else
            {
                // Allow certain file formats
                $allowTypes = array('jpg','png', 'JPG','PNG','jpeg','gif');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $insert = $db->query("INSERT into db_images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                        if($insert){
                            $statusMsg = "T???p tin ( ".$fileName. " ) ???? t???i l??n th??nh c??ng";
                            header("location: show.php?showTB= $statusMsg");                              
                        }else{
                            $statusMsg = "T???p t???i l??n kh??ng th??nh c??ng, vui l??ng th??? l???i.";
                            header("location: form-add_tour.php?showTB= $statusMsg"); 
                        } 
                    }else{
                        $statusMsg = "???? x???y ra l???i khi t???i l??n t???p tin c???a b???n - Vui l??ng th??? l???i.";
                        header("location: form-add_tour.php?showTB= $statusMsg"); 
                    }
                }else{
                    $statusMsg = '???? x???y ra l???i - ch??? c??c t???p JPG, PNG v?? GIF  m???i ???????c ph??p t???i l??n.';
                    header("location: form-add_tour.php?showTB= $statusMsg"); 
                }
            }

        }else{
            $statusMsg = '???? x???y ra l???i - B???n ch??a l???a ch???n, vui l??ng ch???n m???t t???p ????? th???c hi???n t???i l??n';
            header("location: form-add_tour.php?showTB= $statusMsg"); 
        }

*/
?>


