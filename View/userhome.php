<?php
require_once "../Model/CustomerTable.php";
require_once "../Model/Images.php";
require_once "../Model/CustomerPrefrence.php";
require_once "../Model/FavroiteDatabase.php";
session_start();
if (!isset($_SESSION['userEmail'])) {
    header('Location: ../View/login.php?copyerror');
}

if(isset($_GET['Noterror'])){
    echo '<script>alert("Already Exists In the Favroite List")</script>';
}
if(isset($_GET['SucessFav'])){
    echo '<script>alert("Added To Favorite.")</script>';
}

$imageClass = new Images();
$userEmail = $_SESSION['userEmail'];
$UserName = CustomerTable::GetName($userEmail);
$UserID = $imageClass->GetImageId($userEmail);
$_SESSION["CustomerID"]=$UserID;
$imageName = Images::GetImageName($UserID);
$allDeatils = CustomerTable::GetAlldetails($userEmail);
$allPrefrence = CustomerPrefrence::GetAllPrefrnce($UserID);
$userIntrest=CustomerPrefrence::GetIntrestOfUser($UserID);
$userSex = $userIntrest[0]['IntrestedIn'];
$allPrfoiles = CustomerTable::GetWholeTableDetails($userSex);
$userLike=FavroiteDatabase::LikeUser($UserID);
$partnerLike=FavroiteDatabase::UserLike($UserID);

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
            <li class="current-page">Welcome <?= $UserName ?></li>
        </ul>
    </div>

    <div>
        <div class="col-md-6 profile_left">
            <div class="col_3">
                <div class="col-sm-4 row_2">
                    <div class="flexsliders">
                        <ul class="slides">

                            <img src="images/<?= $imageName ?>" style="width: 150%; "/>
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
                    <td class="day_value"><?php echo $UserName; ?></td>
                </tr>

                <tr class="opened_2">
                    <td class="day_label">Age :</td>
                    <td class="day_value"><?php echo $allDeatils[0]["Age"] . " Years"; ?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">City :</td>
                    <td class="day_value"><?php echo $allDeatils[0]["City"]; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">What I Like :</td>
                    <td class="day_value"><?php echo $allPrefrence[0]['Like1'] ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Place to Devlop Strategy :</td>
                    <td class="day_value"><?php echo $allPrefrence[0]['Like2']; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">About Me :</td>
                    <td class="day_value"><?php echo $allDeatils[0]['AboutMe']; ?></td>
                </tr>
                <tr class="closed">
                    <td class="day_label">Things I prefer :</td>
                    <td class="day_value closed"><span><?php echo $allPrefrence[0]['Like3']; ?></span></td>
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
    <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist"">

        <li role="presentation" class="active"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
                                   aria-controls="profile">Explore</a></li>

        <li role="presentation"><a href="#profile2" role="tab" id="profile-tab" data-toggle="tab"
                                   aria-controls="profile">See Who Add You as Their Favroite</a></li>

        <li role="presentation"><a href="#profile3" role="tab" id="profile-tab" data-toggle="tab"
                                   aria-controls="profile">See Who You Add as Your Favroite</a></li>

    </ul>
</div>




<div class="container" id="profile">
    <hr>

    <div class="w3-row-padding w3-margin-top">
        <?php foreach ($allPrfoiles as $number => $array) { ?>
        <div class="w3-col s6 m6 l3">
            <div class="w3-card-4 w3-margin">
                <a href="PartnerProfile.php?id=<?=$array["CustomerID"]?>">
                    <img src="./images/<?=$array['ImageName']?>" style="width: 100%;">
                </a>
                <div class="w3-container w3-center">
                    <p><?=$array['FirstName'] ." {$array['LastName']}"?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

<div class="container" id="profile2">
    <hr>
    <h4 class="text-center"><b> These Are the people who like you</b></h4>
    <div class="w3-row-padding w3-margin-top">
        <?php foreach ($userLike as $number => $array) { ?>
            <div class="w3-col s6 m6 l3">
                <div class="w3-card-4 w3-margin">
                    <a href="PartnerProfile.php?id=<?=$array["CustomerID"]?>">
                        <img src="./images/<?=$array['ImageName']?>" style="width: 100%;">
                    </a>
                    <div class="w3-container w3-center">
                        <p><?=$array['FirstName'] ." {$array['LastName']}"?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<div class="container" id="profile3">
    <hr>
    <h4 class="text-center"><b> These Are the people who you added as Favroite</b></h4>
    <div class="w3-row-padding w3-margin-top">
        <?php foreach ($partnerLike as $number => $array) { ?>
            <div class="w3-col s6 m6 l3">
                <div class="w3-card-4 w3-margin">
                    <a href="PartnerProfile.php?id=<?=$array["ParnerId"]?>">
                        <img src="./images/<?=$array['ImageName']?>" style="width: 100%;">
                    </a>
                    <div class="w3-container w3-center">
                        <p><?=$array['FirstName'] ." {$array['LastName']}"?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <hr>
</div>


</div>


</body>


<footer>
    <?php include_once "footer.php " ?>
</footer>
</html>
