<?php
require_once "functions.php";
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
require_once "../Model/FavroiteDatabase.php";
session_start();

if (!isset($_POST["Submit"])) {
    header('Location: ../View/login.php?copyerror');
}

$userEmail=$_SESSION['userEmail'];
$count=0;
$allUserValuess = array("AboutUser"=>"", "city" => "", "age" => "", "firstname" => "", "lastname" => "", "sex" => "", "dob" => "");


$age = validate_input($_POST['age']);
$firstName = validate_input($_POST['fname']);
$lastName = validate_input($_POST['lname']);
$sex = validate_input($_POST['radio']);
$dob = validate_input($_POST['dob']);
$city = validate_input($_POST['city']);
$aboutUser=$_POST['AboutUser'];
$allUserValuess["AboutUser"]=$aboutUser;
$allUserValuess["email"] = $userEmail;
$allUserValuess["sex"] = $sex;

$cityCheck = String_Has_number($city);
if ($cityCheck == false) {
    $count=$count+1;
    $allUserValuess["city"] = $city;
} else {
    header('Location: ../View/login.php?city');
}

$imageFile = $_FILES['fileToUploads'];
$checkFName = Check_Character($firstName);
$checkLName = Check_Character($lastName);

if ($checkFName == true && $checkLName == true) {
    $allUserValuess["firstname"] = $firstName;
    $allUserValuess["lastname"] = $lastName;
    $count = $count + 2;

} else {
    header('Location: ../View/register.php?nameerror');
}


$checkAge = Check_Age($age);
if ($checkAge == true) {
    $result = Check_Date_Of_Birth($dob);

    if ($result == $age) {
        $allUserValuess["age"] = $age;
        $allUserValuess["dob"] = $dob;
        $count = $count + 2;
    } else {
        header('Location: ../View/login.php?ageerror');
    }

} else {
    header('Location: ../View/login.php?ageerror');
}

if ($count == 5) {
    if ($imageFile['size'] <= 300000)
    {
        $allowedTypes = array(IMAGETYPE_JPEG,IMAGETYPE_PNG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($imageFile['tmp_name']);
        $error = !in_array($detectedType, $allowedTypes);
        if (!$error) {
            //Normally: Rename file to something that will not conflict.

            $filename = $userEmail;
            var_dump($filename);

            $extension = pathinfo($_FILES['fileToUploads']["name"], PATHINFO_EXTENSION);

            $basename = $filename . "." . $extension;
            move_uploaded_file($_FILES['fileToUploads']['tmp_name'], "../View/images/{$basename}");
            $_SESSION["ImageExtension"]=$basename;
            $_SESSION["ModifyUser"]=$allUserValuess;
            CustomerTable::UpdateUser();
            header('Location: ../View/userHome.php?suc');
            exit();
        } else {
            header('Location: ../View/register.php?imgtype');
        }
    }
    else {
        header('Location: ../View/register.php?imgtypes');
    }
}