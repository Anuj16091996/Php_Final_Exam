<?php
require_once "../Model/MessageDataBase.php";
session_start();
if (!isset($_SESSION['userEmail'])) {
    header('Location: ../View/login.php?error');
}

$ID=$_GET["id"];
$PartnerID=json_decode($ID);
var_dump($PartnerID);
$UserID=$_SESSION["CustomerID"];
$time=date("D M j G:i:s T Y");
if(isset($_POST["Send"])){
    $message=$_POST["msg"];
    MessageDataBase::InsertIntoMessage($UserID,$PartnerID,$message,$time);
}


$AllMessages=MessageDataBase::GetAllMessages($UserID,$PartnerID);
var_dump($AllMessages);

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
            <tr><td align="center" class="tableHead" colspan="2">Chat Box</td></tr>
            <tr><td colspan="2">
                    <div class="fields" style="overflow:scroll;height:350px">
                        <?php
                        foreach ($AllMessages as $number=>$array){
                            echo "{$array['MESSAGE']}<br>";
                        }
                        ?>

                    </div></td></tr>



            <tr>
                <td>
                    <textarea name="msg" class="fields" placeholder="Enter Your Message" required="required" style="background-color: #c9c9c9;width: 100%" >
                     </textarea>
                </td>
                <td>
                    <input type="submit" name="Send" class="commandButton" /><br />
                    <br />
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
