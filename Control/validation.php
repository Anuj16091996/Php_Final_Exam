<?php
require_once "functions.php";
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
require_once "../Model/FavroiteDatabase.php";
session_start();
$allUserValues = array("email" => "", "password" => "", "city" => "", "age" => "", "firstname" => "", "lastname" => "", "sex" => "", "dob" => "");
if (!isset($_POST["Submit"])) {
    header('Location: ../View/register.php?error');
}
$count = 0;
$email = validate_input($_POST['email']);
$password = validate_input($_POST['pass']);
$confirmPassword = validate_input($_POST['cpass']);
$age = validate_input($_POST['age']);
$firstName = validate_input($_POST['fname']);
$lastName = validate_input($_POST['lname']);
$sex = validate_input($_POST['radio']);
$dob = validate_input($_POST['dob']);
$city = validate_input($_POST['city']);
$allUserValues["email"] = $email;
$allUserValues["sex"] = $sex;

$cityCheck = String_Has_number($city);
if ($cityCheck == false) {
    $allUserValues["city"] = $city;
} else {
    header('Location: ../View/register.php?city');
}


$imageFile = $_FILES['fileToUploads'];


$checkPassword = Check_Password($password);
if ($checkPassword == true) {
    if ($password == $confirmPassword) {
        $allUserValues["password"] = $password;
        $count = $count + 1;
    } else {
        header('Location: ../View/register.php?passworderror');
    }
}

$checkFName = Check_Character($firstName);
$checkLName = Check_Character($lastName);

if ($checkFName == true && $checkLName == true) {
    $allUserValues["firstname"] = $firstName;
    $allUserValues["lastname"] = $lastName;
    $count = $count + 2;

} else {
    header('Location: ../View/register.php?nameerror');
}


$checkAge = Check_Age($age);
if ($checkAge == true) {
    $result = Check_Date_Of_Birth($dob);

    if ($result == $age) {
        $allUserValues["age"] = $age;
        $allUserValues["dob"] = $dob;
        $count = $count + 2;
    } else {
        header('Location: ../View/register.php?ageerror');
    }

} else {
    header('Location: ../View/register.php?ageerror');
}

if ($count == 5) {
    var_dump($imageFile);
    $_SESSION["UserData"] = $allUserValues;
    $emailToInsert = $allUserValues["email"];

    $customer = new CustomerTable();
    $images = new Images();
    $prefrence = new CustomerPrefrence();

    $checkEmailFromdata = $customer->CheckEmail();
    if ($checkEmailFromdata == true) {
        header('Location: ../View/register.php?emailExits');
    } else {
        if ($imageFile['size'] <= 300000)
        {
            $allowedTypes = array(IMAGETYPE_JPEG,IMAGETYPE_PNG, IMAGETYPE_GIF);
            $detectedType = exif_imagetype($imageFile['tmp_name']);
            $error = !in_array($detectedType, $allowedTypes);
            if (!$error) {
                //Normally: Rename file to something that will not conflict.

                $filename = $email;
                var_dump($filename);

                $extension = pathinfo($_FILES['fileToUploads']["name"], PATHINFO_EXTENSION);

                $basename = $filename . "." . $extension;
                move_uploaded_file($_FILES['fileToUploads']['tmp_name'], "../View/images/{$basename}");
                $_SESSION["ImageExtension"]=$basename;
                $customer->InsertIntoCustomer();
                $Customer_Id = $images->GetImageId($emailToInsert);
                $_SESSION["CustForIns"]=$Customer_Id;
                $images->InsertIntoImage($Customer_Id);
                FavroiteDatabase::InsertIntoFav($Customer_Id);
                header('Location: ../View/prefrence.php');
                exit();
            } else {
                header('Location: ../View/register.php?imgtype');
            }
        }
        else {
            header('Location: ../View/register.php?imgtypes');
        }




    }

}





