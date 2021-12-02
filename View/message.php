<?php
require_once "../Model/MessageDataBase.php";
require_once "../Model/CustomerTable.php";
session_start();
if (!isset($_SESSION['userEmail'])) {
    header('Location: ../View/login.php?error');
}

$ID=$_GET["id"];
$PartnerID=json_decode($ID);

$PartnerName=CustomerTable::GetNameOfUser($PartnerID);

$PartnerFullName="{$PartnerName[0]['FirstName']} "." {$PartnerName[0]['LastName']}";

$UserID=$_SESSION["CustomerID"];
$time=date("D M j G:i:s T Y");
if(isset($_POST["Send"])){
    $message=$_POST["msg"];
    MessageDataBase::InsertIntoMessage($UserID,$PartnerID,$message,$time);
}


$AllMessages=MessageDataBase::GetAllMessages($UserID,$PartnerID);


?>

<html>
<head>
    <link href="../css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="../css/font-awesome.css" rel="stylesheet">

</head>

<body>
<div>
    <?php include_once("header.php");?>
</div>

<div>
    <pre style="background-color: white;border: whitesmoke">

    </pre>
</div>
<div class="container">
    <div class="breadcrumb1">
        <ul>
            <a href="index.php"><i class="fa fa-home home_1"></i></a>
            ->&nbsp;
            <li class="current-page">Message Room</li>
        </ul>
    </div>
</div>

<div class="container">
    <form method="post" action="message.php?id=<?=$PartnerID?>"">
        <table class="table" border="">
            <tr><td align="center" class="tableHead" colspan="2">Chat With <?php echo "$PartnerFullName" ?></td></tr>
            <tr><td colspan="2">
                    <div class="container">
                        <div class="fields" style="overflow:scroll;height:550px">
                                      <?php
                                        foreach ($AllMessages as $number=>$array){

                                            if($array["SenderID"]==$UserID){
                                                echo "<p style='color:red;text-align: right;padding-right: 30px;border:1px dashed #000;padding: 5px ; padding-right: 30px ; margin-left: 220px;'> {$array['MESSAGE']} </p>";
                                                echo "<p style='color:black;text-align: right;padding-right: 30px;border:0px solid #000;padding: 1px'> {$array['Time']} </p>";
                                            }else{
                                                echo "<p style='color:black;text-align: left;padding-right: 30px;border:1px dotted #000; padding: 5px;margin-right: 220px'> {$array['MESSAGE']} </p>";
                                                echo "<p style='color:black;text-align: left;padding-right: 30px;border:0px solid #000;padding: 1px'>$PartnerFullName- Send on {$array['Time']} </p>";
                                            }

                                        }
                                        ?>

                        </div>
                        </td></tr>
                    </div>


            <tr>
                <td>
                    <textarea name="msg" class="fields" placeholder="Enter Your Message" required="required" style="background-color: #c9c9c9;width: 100%" >
                     </textarea>
                </td>
                <td>
                    <input type="submit" name="Send" class="commandButton" value="Send" > <br/>
                    <a href="message.php?id=<?=$PartnerID?>">Refresh</a>
                </td>
            </tr>

        </table>
    </form>
</div>


</body>

<footer id="con_Us">
    <?php include_once("footer.php");?>
</footer>
</html>
