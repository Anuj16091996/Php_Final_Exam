<?php
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
session_start();
if (!isset($_SESSION['userEmail'])) {
    header('Location: ../View/login.php?copyerror');
}

$id = $_GET['id'];
$CustomerID=json_decode($id);
$_SESSION["PartnerID"]=$CustomerID;
$allProfileDetail=CustomerTable::GetMatchTable($CustomerID);


?>
<html>
<head>

    <link href="../css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css'/>
    <link href="../css/style.css" rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/flexsider.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Find Your Perfect Partner - Makemylove
        | View_profile :: Make My Love
    </title
</head>

<body>
<div>
    <?php include_once "header.php " ?>
</div>

<div>
    <pre style="background-color: white;border: whitesmoke">
          <!--  ///This is a spacer-->
    </pre>
</div>
<div class="container">
    <div class="breadcrumb1">
        <ul>
            <a href="index.php"><i class="fa fa-home home_1"></i></a>
            ->&nbsp;
            <li class="current-page"><?= $allProfileDetail[0]["FirstName"]." {$allProfileDetail[0]["LastName"]}" ?></li>
        </ul>
    </div>

    <div>
        <div class="col-md-6 profile_left">
            <div class="col_3">
                <div class="col-sm-4 row_2">
                    <div class="flexsliders">
                        <ul class="slides">

                            <img src="images/<?= $allProfileDetail[0]["ImageName"] ?>" style="width: 150%; "/>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4 profile_right">
            <table class="table">
                <tbody>

                <tr class="opened_1">

                    <td class="day_label">Name :</td>
                    <td class="day_value"><?= $allProfileDetail[0]["FirstName"]." {$allProfileDetail[0]["LastName"]}" ?></td>
                </tr>

                <tr class="opened_2">
                    <td class="day_label">Age :</td>
                    <td class="day_value"><?php echo $allProfileDetail[0]["Age"] . " Years"; ?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">City :</td>
                    <td class="day_value"><?php echo $allProfileDetail[0]["City"] . " Years"; ?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">What I Like :</td>
                    <td class="day_value"><?php echo $allProfileDetail[0]["Like1"] . " Years"; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Place to Devlop Strategy :</td>
                    <td class="day_value"><?php echo $allProfileDetail[0]["Like2"]; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">About Me :</td>
                    <td class="day_value"><?php echo $allProfileDetail[0]["AboutMe"]; ?></td>
                </tr>
                <tr class="closed">
                    <td class="day_label">Things I prefer :</td>
                    <td class="day_value closed"><span><?php echo $allProfileDetail[0]["Like3"]; ?></span></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
<div>
    <pre style="background-color: white;border: whitesmoke">
          <!--  ///This is a spacer-->
    </pre>
</div>
<div class="container">
    <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
        <li role="presentation" class=""><a href="../Control/FavroiteValidation.php?id=<?=$CustomerID?>" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Add To Your Favorite</a></li>
        <li role="presentation"><a href="./message.php?id=<?=$CustomerID?>" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Message</a></li>
    </ul>
</div>


<div class="container">
    <hr>

</div>




</div>


</body>
<footer>
    <?php include_once "footer.php " ?>
</footer>
</html>
