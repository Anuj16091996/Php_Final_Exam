<?php
session_start();
if(!isset($_SESSION["CustForIns"])){
    header('Location: ../View/register.php?error');
}
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
            <li class="current-page">Prefrences</li>
        </ul>
    </div>

    <div class="services">
        <div class="col-sm-6 login_left">
            <form action="../Control/prefrenceValidation.php" method="post" enctype="multipart/form-data">

                <div class="form-group form-group1">
                    <label class="col-sm-7 control-lable" for="sex">Intrested In: </label>
                    <input type="radio" class="form-check-input" name="radio1" value="Male" checked>Male

                    <input type="radio" class="form-check-input" name="radio1" value="Female" >Female<br>

                    <div class="clearfix"> </div>
                </div>

                <div class="form-group form-group1">
                    <label class="col-sm-7 control-lable" for="sex">What You Like : </label>
                    <input type="radio" class="form-check-input" name="radio2" value="Chess" checked>Chess

                    <input type="radio" class="form-check-input" name="radio2" value="Gaming" >Gaming<br>

                    <div class="clearfix"> </div>
                </div>



                <div class="form-group form-group1">
                    <label class="col-sm-7 control-lable" for="sex">Hobbies: </label>
                    <input type="radio" class="form-check-input" name="radio3" value="Swimming" checked>Swimming

                    <input type="radio" class="form-check-input" name="radio3" value="Others" >Others<br>

                    <div class="clearfix"> </div>
                </div>

                <div class="form-group form-group1">
                    <label class="col-sm-7 control-lable" for="sex">Education : </label>
                    <input type="radio" class="form-check-input" name="radio4" value="Coding" checked>Coding

                    <input type="radio" class="form-check-input" name="radio4" value="Others" >Others<br>

                    <div class="clearfix"> </div>
                </div>

                <div class="form-actions">
                    <input type="submit" id="edit-submit" name="SubmitPrefer" class="btn_1 submit">
                </div>

        </div>
    </div>
</div>

</body>


<footer>
    <?php include_once "footer.php " ?>
</footer>

</html>
