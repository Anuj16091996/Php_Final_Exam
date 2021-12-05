<?php
require_once "../Model/CustomerPrefrence.php";
session_start();

if (!isset($_SESSION['userEmail'])) {
    header('Location: ../View/login.php?copyerror');
}

if (!isset($_GET['TypeSubmit'])) {
    header('Location: ./index.php?error');
}


$search = $_GET["Search"];
$temp = strtolower($search);
$value = ucfirst($temp);
$allResults = CustomerPrefrence::GetSearchFromLike1($value);


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
    <?php include_once("header.php"); ?>
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
            <li class="current-page">Search</li>
        </ul>
    </div>
</div>
<div class="container">
    <?php
    if ($allResults == null) {
        echo "<h4 class='text-center'><b> No Data Found</b></h4>";
    } else {
        ?>

        <h4 class='text-center'><b> These User Have <?= $value ?></b></h4>
        <div class="container">
            <div class="w3-row-padding w3-margin-top">
                <?php foreach ($allResults as $number => $array) { ?>
                    <div class="w3-col s6 m6 l3">
                        <div class="w3-card-4 w3-margin">
                            <a href="PartnerProfile.php?id=<?= $array["CustomerID"] ?>">
                                <img src="./images/<?= $array['ImageName'] ?>" style="width: 100%; object-fit: cover;">
                            </a>
                            <div class="w3-container w3-center">
                                <p><?= $array['FirstName'] . " {$array['LastName']}" ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    ?>


</div>
</body>
<footer id="con_Us">
    <?php include_once("footer.php"); ?>
</footer>
</html>
