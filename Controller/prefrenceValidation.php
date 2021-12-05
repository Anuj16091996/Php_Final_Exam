<?php
require_once "../Model/CustomerPrefrence.php";
session_start();
if (!isset($_POST["SubmitPrefer"])) {
    header('Location: ../View/register.php?error');
}


$like1 = $_POST["radio2"];
$like2 = $_POST["radio3"];
$like3 = $_POST["radio4"];
$IntrestIN = $_POST["radio1"];
$CustomerID = $_SESSION["CustForIns"];


CustomerPrefrence::InsertIntoCustomerPrefrence($CustomerID, $like1, $like2, $like3, $IntrestIN);

header("Location: ../View/login.php?userlog");

