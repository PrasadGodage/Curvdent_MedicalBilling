<?php 
include "config.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
//     // Check if a file was selected for upload
//     if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
//         $uploadDir = 'uploads/'; // Directory where uploaded images will be stored
//         $uploadFile = $uploadDir . basename($_FILES['image']['name']);

//         if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
//             if (isset($_GET['firmId'])) {
//                 $firmId = $_GET['firmId'];
//                 // $sql = "UPDATE firmmaster SET LogoAddress = '$uploadFile' WHERE FirmId = '$firmId'";
//                 $sql = "UPDATE `firmmaster` SET `LogoAddress`='$uploadFile' WHERE `FirmId`='$firmId'";
//                     // echo $sql;
//                 if (mysqli_query($con, $sql)) {
//                     echo "Image uploaded and database updated successfully.";
//                     $newURL='firmmaster.php';
//                     header('Location: '.$newURL);
//                 } else {
//                     echo "Error updating the database: " . mysqli_error($con);
//                 }
//             } else {
//                 echo "Invalid or missing FirmId.";
//             }
//         } else {
//             echo "Error uploading image.";
//         }
//     } else {
//         echo "Invalid file or no file uploaded.";
//     }
// }

// // Close the database connection (if you open it in config.php)
// mysqli_close($con);

$targetDir = "uploads/"; // Specify the directory where you want to store the uploaded files
$targetFile = $targetDir . basename($_FILES["uploadFile"]["name"]);
$uploadOk = 1;
$firmId=1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
print_r($_POST);
$firmId=$_POST["FirmId"];
// echo "updated firm ID is :".$firmId;
if(isset($_POST["submit"])) {
  
    // echo "updated firm ID is :".$firmId;
    $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size (adjust as needed)
if ($_FILES["uploadFile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats (you can add more formats if needed)
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $targetFile)) {
        // Update database with file location
        $firmid=$_POST["FirmId"];
        $sql = "UPDATE `firmmaster` SET `LogoAddress`='$targetFile' WHERE `FirmId`='$firmId'";
                            echo $sql;
        if (mysqli_query($con, $sql)) {
            echo "Image uploaded and database updated successfully.";
            // $newURL='firmmaster.php';
            // header('Location: '.$newURL);
        } else {
            echo "Error updating the database: " . mysqli_error($con);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
