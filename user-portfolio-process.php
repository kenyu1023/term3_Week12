<?php
session_start();
if (isset($_POST["submit"])) {
    $targetDirectoryMainImage = "img/";
    $targetFileMainImage = $targetDirectoryMainImage . basename($_FILES['mainImgUploaded']['name']);
    $targetDirectorySubImage = "img/";
    $targetFileSubImage = $targetDirectorySubImage . basename($_FILES['subImgUploaded']['name']);
    $uploadOk = true;
    include "db.php";
    

//    if (!db_connect()) {
//
//    } 
    if(db_connect()) {
        $title = mysqli_real_escape_string(db_connect(), $_POST["title"]);
        $description = mysqli_real_escape_string(db_connect(), $_POST["description"]);
        $mainImage = mysqli_real_escape_string(db_connect(), $targetFileMainImage);
        $subImage = mysqli_real_escape_string(db_connect(), $targetFileSubImage);
            
        if ($uploadOk == true) {
            move_uploaded_file($_FILES['mainImgUploaded']['tmp_name'], $targetFileMainImage) && (move_uploaded_file($_FILES['subImgUploaded']['tmp_name'], $targetFileSubImage));
            $insert = "INSERT INTO portfolio_tb (title,description,main_img,sub_img) VALUES ('" . $title . "','" . $description . "','" . $mainImage . "','" . $subImage . "')";
            $resultInsert = mysqli_query(db_connect(), $insert);
            echo $insert;
            if ($resultInsert == true) {
                header("location:user-page.php");
            }
            else {
                echo "false";
            }
        } 
        else {
            echo "Sorry your file upload fell at the last fence.";
        }

    }
}

?>