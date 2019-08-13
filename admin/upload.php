<?php
//file, image variables to upload
$image=$_FILES['image'];
$imageName=$_FILES['image']['name'];
$imageTmpName=$_FILES['image']['tmp_name'];
$imageSize=$_FILES['image']['size'];
$imageError=$_FILES['image']['error'];
$imageType=$_FILES['image']['type'];

$imageExt = explode('.',$imageName);

$imageActualExt = strtolower(end($imageExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

if (in_array($imageActualExt, $allowed)) {

  if ($imageError===0) {

    if ($imageSize<1000000) {

      //$imageNameNew= uniqid('',true).".".$imageActualExt;

      //$imageDestination="../images/".$imageNameNew;

      $imageDestination="../images/".$imageName; //

      move_uploaded_file($imageTmpName,$imageDestination);

      $success .= "image loaded successfully <br>";

    }//if
    else {

      $error.="Image is to big <br>";

      }//else

    }//if

    else {

      $error.="Couldnt upload the image <br>";

    }//else

  }//if

 ?>
