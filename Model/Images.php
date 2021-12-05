<?php
require_once "DatabaseConnection.php";
require_once "CustomerTable.php";

class Images
{

    public function GetImageId($email)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select CustomerID from dating.customer where Email='$email'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $imageID = "";
        foreach ($result->fetchAll() as $number => $array) {
            foreach ($array as $key => $value) {
                $imageID = $value;
            }
        }
        return json_decode($imageID);
    }

    public function InsertIntoImage($ImageId)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $userEmail = $_SESSION["ImageExtension"];
        $query = "Insert into dating.images(CustomerID,ImageName) values ('$ImageId','$userEmail')";
        $value->exec($query);

    }

    public static function GetImageName($ImageId)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select ImageName from dating.images where CustomerID='$ImageId'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $imageName = "";
        foreach ($result->fetchAll() as $number => $array) {
            foreach ($array as $key => $value) {
                $imageName = $value;
            }
        }
        return $imageName;
    }

    public static function UpdateImage($imageId,$imageName){
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "Update dating.images set ImageName='$imageName' where ImageID='$imageId'";
        $value->exec($query);
    }


}