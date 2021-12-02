<?php
require_once "DatabaseConnection.php";
require_once "Images.php";

class CustomerTable{


    public function CheckEmail():bool{
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query = "select Email from dating.customer";
        $result=$value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userEmail=$_SESSION["UserData"]['email'];
     foreach ($result->fetchAll() as $number=>$array){
        foreach ($array as $key=>$value){
            if($value==$userEmail){
                    return true;
            }
        }
     }
        $stmt->CloseConnect();

     return false;
    }

    public function InsertIntoCustomer(){
        $userEmail=$_SESSION["UserData"]['email'];
        $userPassword=$_SESSION["UserData"]['password'];
        $userAge=$_SESSION["UserData"]['age'];
        $userFirstName=$_SESSION["UserData"]['firstname'];
        $userLastName=$_SESSION["UserData"]['lastname'];
        $userSex=$_SESSION["UserData"]['sex'];
        $userDob=$_SESSION['UserData']['dob'];
        $userCity=$_SESSION['UserData']['city'];
        $aboutUser=$_SESSION["UserData"]["AboutUser"];
            $stmt=new DatabaseConnection();
            $value=$stmt->GetConnect();

            $query="Insert into dating.customer(Email, FirstName, LastName, City, Age, Sex, DateOfBirth, Password,AboutMe) values('$userEmail','$userFirstName','$userLastName','$userCity','$userAge','$userSex','$userDob','$userPassword','$aboutUser')";
            $value->exec($query);



    }


    public function CheckIDPassword($name,$password){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query = "select Email, Password from dating.customer where Email='$name' and Password='$password'";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        if($result->fetchAll()==null){
                return false;
        }else{
            return true;
        }

    }
    public static function GetName($userEmail)
    {
        $stmt = new DatabaseConnection();
        $value = $stmt->GetConnect();
        $query = "select FirstName,LastName from dating.customer where Email='$userEmail'";
        $result = $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userName="";
        foreach ($result->fetchAll() as $number => $array) {
            foreach ($array as $key => $value) {
               $userName=$userName."$value ";
            }
        }
    return $userName;
    }

    public static function GetAlldetails($email){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query = "select * from dating.customer where Email='$email'";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }


    public static function GetWholeTableDetails($userSex){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query="SELECT customer.FirstName, customer.LastName,customer.CustomerID,images.ImageName from customer join Images on customer.CustomerID=images.CustomerID WHERE customer.Sex='$userSex'";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    public static function GetMatchTable($userID){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query="SELECT customer.FirstName,customerprefrence.Like1,customerprefrence.Like2,customerprefrence.Like3 ,customer.LastName,customer.CustomerID,images.ImageName,customer.City,customer.Age,customer.AboutMe from customer join Images on customer.CustomerID=images.CustomerID join customerprefrence on customer.CustomerID = customerprefrence.CustomerID WHERE customer.CustomerID='$userID'";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }


    public static function GetNameOfUser($partnerID){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $query="select FirstName, LastName from customer where CustomerID='$partnerID'";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    public static function UpdateUser(){
        $stmt=new DatabaseConnection();
        $value=$stmt->GetConnect();
        $userEmail=$_SESSION["ModifyUser"]['email'];

        $userAge=$_SESSION["ModifyUser"]['age'];
        $userFirstName=$_SESSION["ModifyUser"]['firstname'];
        $userLastName=$_SESSION["ModifyUser"]['lastname'];
        $userSex=$_SESSION["ModifyUser"]['sex'];
        $userDob=$_SESSION['ModifyUser']['dob'];
        $userCity=$_SESSION['ModifyUser']['city'];
        $aboutUser=$_SESSION["ModifyUser"]["AboutUser"];



        $query="UPDATE  dating.customer set FirstName='$userFirstName',LastName='$userLastName',Age='$userAge',Sex='$userSex',AboutMe='$aboutUser',DateOfBirth='$userDob', City='$userCity' where Email='$userEmail'";
        $result= $value->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
    }
}
