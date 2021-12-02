<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
    header('Location: ../View/login.php?copyerror');
}

$userEmail=$_SESSION['CustomerID'];

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
<?php include_once("header.php");?>

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
            <li class="current-page">Modify Your Personal Deatils</li>
        </ul>
    </div>

    <div class="services">
        <div class="col-sm-6 login_left">

            <form action="../Control/ModifyValidation.php" method="post" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="edit-pass">Age <span class="form-required" title="This field is required.">*</span></label>
                    <input type="number" value="25"  required id="edit-pass" name="age" size="60" maxlength="128" class="form-text required">
                </div>
                <div class="form-group">
                    <label for="edit-pass">FirstName <span class="form-required" title="This field is required.">*</span></label>
                    <input type="text" required value="qwe" id="edit-pass" name="fname" size="60" maxlength="128" class="form-text required">
                </div>

                <div class="form-group">
                    <label for="edit-pass">LastName <span class="form-required" title="This field is required.">*</span></label>
                    <input type="text"  value="qwe" required id="edit-pass" name="lname" size="60" maxlength="128" class="form-text required">
                </div>

                <div class="form-group">
                    <label for="edit-pass">City <span class="form-required" title="This field is required.">*</span></label>
                    <input type="text" required value="qwe"  id="edit-pass" name="city" size="60" maxlength="128" class="form-text required">
                </div>

                <div class="form-group">
                    <label for="edit-pass">Image <span class="form-required" title="This field is required.">*</span></label>
                    <input type="file" required  name="fileToUploads" id="fileID"><br>
                </div>



                <div class="form-group">
                    <label for="edit-pass">About YourSelf <span class="form-required" title="This field is required.">*</span></label>
                    <textarea id="w3review" name="AboutUser" rows="4" cols="50">

                    </textarea>
                </div>


                <div class="form-group form-group1">
                    <label class="col-sm-7 control-lable" for="sex">Sex : </label>
                    <input type="radio" class="form-check-input" name="radio" value="Male" checked>Male

                    <input type="radio" class="form-check-input" name="radio" value="Female" >Female<br>

                    <div class="clearfix"> </div>
                </div>



                <div class="form-group">
                    <label for="edit-pass">DateOfBirth: <span class="form-required" title="This field is required.">*</span></label>
                    <input type="date"  required id="edit-pass" value="1996-09-16" name="dob" size="60" maxlength="128" class="form-text required">
                </div>



                <div class="form-actions">
                    <input type="submit" id="edit-submit" name="Submit" class="btn_1 submit">
                </div>



</body>
<footer id="con_Us">
    <?php include_once("footer.php");?>
</footer>
</html>

