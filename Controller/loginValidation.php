<?php
require_once "functions.php";
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
session_start();

if (!isset($_POST["Submit"])) {
    header('Location: ../View/login.php?error');
}

$userEmail = $_POST['username'];
$userPassword = $_POST['userPass'];
$customer = new CustomerTable();
$check = $customer->CheckIDPassword($userEmail, $userPassword);
if ($check == true) {
    $_SESSION["userEmail"] = $userEmail;
    header('Location: ../View/userhome.php?');
} else {
    header('Location: ../View/login.php?error');
}
