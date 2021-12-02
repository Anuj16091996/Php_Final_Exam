<?php
if (isset($_GET['userlog'])) {
    echo '<script>alert("Registration Sucesfull")</script>';
}

if(isset($_GET['error'])){
    echo '<script>alert("Invalid Username Or Password")</script>';
}
if(isset($_GET['copyerror'])){
    echo '<script>alert("Log In First")</script>';
}

if(isset($_GET['nameerror'])){
    echo '<script>alert("Invalid Name Try Again")</script>';
}
if(isset($_GET['ageerror'])){
    echo '<script>alert("Invalid Age or DOB Try Again")</script>';
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


<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                 ->
                <li class="current-page">Login</li>
            </ul>
        </div>
        <div class="services">
            <div class="col-sm-6 login_left">
                <form action="../Control/loginValidation.php" method="post">
                    <div class="form-item form-type-textfield form-item-name">
                        <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
                        <input type="text" id="edit-name"  name="username" value="" size="60" maxlength="60" class="form-text required">
                    </div>
                    <div class="form-item form-type-password form-item-pass">
                        <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
                        <input type="password" id="edit-pass" name="userPass" size="60" maxlength="128" class="form-text required">
                    </div>
                    <div class="form-actions">
                        <input type="submit"  name="Submit" value="Log in" class="btn_1 submit">
                    </div>
                </form>
            </div>
            <div ><?php  include_once "shareicons.php"; ?> </div>

        </div>
    </div>
</div>
</body>
<footer id="con_Us">
    <?php include_once("footer.php");?>
</footer>
</html>