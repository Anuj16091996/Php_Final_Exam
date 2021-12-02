<?php
require_once "functions.php";
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
require_once "../Model/FavroiteDatabase.php";
session_start();
if (!isset($_SESSION['userEmail'])) {
    header('Location: ../View/login.php?error');
}

$ID=$_GET["id"];
$partnerID=json_decode($ID);
$customerID=$_SESSION["CustomerID"];
var_dump($partnerID);
var_dump($customerID);

$DeleteFromFav=FavroiteDatabase::DeleteToFavroiteThroughProfile($customerID,$partnerID);
var_dump($DeleteFromFav);

if($DeleteFromFav==false){

    header('Location: ../View/userHome.php?SucessFavR');
}