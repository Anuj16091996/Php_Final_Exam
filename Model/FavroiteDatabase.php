<?php
require_once "DatabaseConnection.php";

 class FavroiteDatabase{
public static function InsertIntoFav($CustomerID){
    $stmt=new DatabaseConnection();
    $value=$stmt->GetConnect();

    $query="Insert into dating.favorite(CustomerID) values ('$CustomerID')";
    $value->exec($query);
}

public static function CheckFav($customerID,$partnerID):bool{
    $stmt=new DatabaseConnection();
    $value=$stmt->GetConnect();

    $checkQuery="select CustomerID,ParnerId from favorite where CustomerID='$customerID' and ParnerId='$partnerID'";
    $result= $value->prepare($checkQuery);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    if($result->fetchAll()==null){
        return true;
    }else{
        return false;
    }
}


public static function InsertToFavroiteThroughProfile($customerID,$partnerID):bool{
    $stmt=new DatabaseConnection();
    $value=$stmt->GetConnect();

    $checkQuery="select CustomerID,ParnerId from favorite where CustomerID='$customerID' and ParnerId='$partnerID'";
    $result= $value->prepare($checkQuery);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    if($result->fetchAll()==null){
        $query="Insert into dating.favorite(CustomerID,ParnerId) values ('$customerID','$partnerID')";
        $value->exec($query);
        return false;
    }else{
        return true;
    }
}


     public static function DeleteToFavroiteThroughProfile($customerID,$partnerID):bool
     {
         $stmt = new DatabaseConnection();
         $value = $stmt->GetConnect();

         $query = "Delete from dating.favorite where CustomerID='$customerID' and ParnerId='$partnerID'";
         $value->exec($query);
         return false;
     }


public static function LikeUser($UserID){
    $stmt=new DatabaseConnection();
    $value=$stmt->GetConnect();

    $checkQuery="select favorite.CustomerID, images.ImageName,customer.FirstName,customer.LastName from favorite join customer on favorite.CustomerID = customer.CustomerID  join images  on customer.CustomerID = images.CustomerID where ParnerId='$UserID'";
    $result= $value->prepare($checkQuery);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    return $result->fetchAll();
}

     public static function UserLike($UserID){
         $stmt=new DatabaseConnection();
         $value=$stmt->GetConnect();

         $checkQuery="select favorite.ParnerId, images.ImageName,customer.FirstName,customer.LastName
from favorite join customer on favorite.ParnerId = customer.CustomerID  join images
    on customer.CustomerID = images.CustomerID
where favorite.CustomerID='$UserID' and favorite.CustomerID!='null';";
         $result= $value->prepare($checkQuery);
         $result->execute();
         $result->setFetchMode(PDO::FETCH_ASSOC);
         return $result->fetchAll();
     }


 }