<?php
if (isset($_GET['error'])) {
    echo '<script>alert("Invalid Input")</script>';
}

if(isset($_GET['passworderror'])){
    echo '<script>alert("Invalid Password Try Again")</script>';
}

if(isset($_GET['nameerror'])){
    echo '<script>alert("Invalid Name Try Again")</script>';
}
if(isset($_GET['ageerror'])){
    echo '<script>alert("Invalid Age or DOB Try Again")</script>';
}

if(isset($_GET['emailExits'])){
    echo '<script>alert("Email Already Exists")</script>';
}

if(isset($_GET['city'])){
    echo '<script>alert("Invalid Input City")</script>';
}

if(isset($_GET['imgtype'])){
    echo '<script>alert("Invalid Image Type")</script>';
}

if(isset($_GET['imgtypes'])){
    echo '<script>alert("File To Big")</script>';
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
<?php include_once("header.php");?>

<!--Form Code-->
<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                ->
                <li class="current-page">Register</li>
            </ul>
        </div>
        <div class="services">
            <div class="col-sm-6 login_left">

                <form action="../Control/validation.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" value="an@gmai.com" required id="edit-name" name="email" value="" size="60" maxlength="60" class="form-text required">
                    </div>



                    <div class="form-group">
                        <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
                        <input type="password" value="qwe"  required id="edit-pass" name="pass" size="60" maxlength="128" class="form-text required">
                    </div>

                    <div class="form-group">
                        <label for="edit-pass">Confrim Password <span class="form-required" title="This field is required.">*</span></label>
                        <input type="password" value="qwe" required id="edit-pass" name="cpass" size="60" maxlength="128" class="form-text required">
                    </div>

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
                </form>
            </div>


                </form>

            <div ><?php  include_once "shareicons.php"; ?> </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


</body>

<footer id="con_Us">
    <?php include_once("footer.php");?>
</footer>
</html>