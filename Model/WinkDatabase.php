<?php
require_once "DatabaseConnection.php";


class WinkDatabase
{
    public static function InsertToWinkTable($userID, $PartnerID)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "Insert into dating.winkbox(CustomerID, ParnerId) values ('$userID','$PartnerID')";
        $value->exec($query);
    }


    public static function SendWinksData($userID)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select distinct Winkbox.CustomerID, winkbox.ParnerId, i.ImageName, c.FirstName, c.LastName from dating.winkbox join images i on winkbox.CustomerID = i.CustomerID join customer c on c.CustomerID = winkbox.CustomerID where winkbox.ParnerId='$userID'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }


    public static function GetAllWinks($userID)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select distinct Winkbox.CustomerID, winkbox.ParnerId, i.ImageName, c.FirstName, c.LastName from dating.winkbox join images i on winkbox.ParnerId = i.CustomerID join customer c on c.CustomerID = winkbox.ParnerId where winkbox.CustomerID='$userID'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}