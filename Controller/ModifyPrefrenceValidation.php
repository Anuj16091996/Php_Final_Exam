<?php

require_once "functions.php";
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
require_once "../Model/FavroiteDatabase.php";
session_start();

if (!isset($_POST["SubmitPrefer"])) {
    header('Location: ../View/login.php?copyerror');
}

$like1 = $_POST["radio2"];
$like2 = $_POST["radio3"];
$like3 = $_POST["radio4"];
$IntrestedIn = $_POST["radio1"];
$CustomerID = $_SESSION["CustomerID"];


CustomerPrefrence::UpdateIntoPrefrence($CustomerID, $like1, $like2, $like3, $IntrestedIn);
header('Location: ../View/userHome.php?suc');