<?php
require_once "DatabaseConnection.php";

class MessageDataBase{
    public static function InsertIntoMessage($userID,$PartnerID,$message,$time){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();

        $query="Insert into dating.message(SenderID, ReciverID, MESSAGE, Time)  values ('$userID','$PartnerID','$message','$time')";
        $value->exec($query);
    }

    public static function GetAllMessages($userID,$PartnerID){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query = "SELECT message.SenderID,message.ReciverID, message.MESSAGE,message.Time,customer.FirstName,customer.LastName  from message join customer on customer.CustomerID=message.ReciverID where (message.SenderID='$userID' and message.ReciverID='$PartnerID') or (message.SenderID='$PartnerID' and message.ReciverID='$userID')";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }



}
