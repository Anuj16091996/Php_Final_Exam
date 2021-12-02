<?php
session_start();

if (isset($_GET['logout'])) {
    echo '<script>alert("Logout Scucesfull")</script>';
}

if (isset($_GET['error'])) {
    echo '<script>alert("Search First")</script>';
}



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
    <?php include_once("Sections/banner.php");?>
</div>

<div id="about_Us">
    <?php include_once("Sections/aboutUs.php");?>
</div>

<div id="why_Us">
    <?php include_once("Sections/whyUs.php");?>
</div>

</body>

<footer id="con_Us">
    <?php include_once("footer.php");?>
</footer>

</html>