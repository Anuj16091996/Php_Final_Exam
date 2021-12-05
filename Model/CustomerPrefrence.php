<?php
require_once "DatabaseConnection.php";

class CustomerPrefrence
{
    public static function InsertIntoCustomerPrefrence($CustomerID, $like1, $like2, $like3, $IntrestedIn)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "Insert into dating.customerprefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) values ('$CustomerID','$like1','$like2','$like3','$IntrestedIn')";
        $value->exec($query);
    }

    public static function GetAllPrefrnce($CustomerID)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select * from dating.customerprefrence where CustomerID='$CustomerID'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    public static function GetIntrestOfUser($CustomerID)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select IntrestedIn from dating.customerprefrence where CustomerID='$CustomerID'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }


    public static function GetSearchFromLike1($search)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select customerprefrence.CustomerID,customer.FirstName,images.ImageName,customer.LastName,customerprefrence.Like1, customerprefrence.Like2,customerprefrence.Like3 from dating.customerprefrence join customer on customerprefrence.CustomerID = customer.CustomerID join images on customer.CustomerID = images.CustomerID where customerprefrence.Like1 LIKE'%$search%' or Like2 like '%$search%' or Like3 like '%$search%'    ";
        $result = $value->prepare($query);
        $finalResult = [];
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($result->fetchAll() as $number => $array) {
            array_push($finalResult, $array);
        }

        return $finalResult;
    }

    public static function UpdateIntoPrefrence($CustomerID, $like1, $like2, $like3, $IntrestedIn)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "update dating.customerprefrence set Like1='$like1',Like2='$like2',Like3='$like3',IntrestedIn='$IntrestedIn' where CustomerID='$CustomerID'";
        $value->exec($query);
    }

}
