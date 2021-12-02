<div  class="navbar navbar-inverse-blue navbar"  >
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
    <div class="navbar-inner navbar-inner_1">
        <div class="container">
            <div class="navigation">
                <nav id="colorNav">
                    <ul>
                        <li class="green">
                            <a href="#" class="icon-home"></a>
                            <ul>
                                <?php
                                function isloggedin(){
                                    if(!isset($_SESSION['userEmail'])){
                                        return false;
                                    }
                                    else{
                                        return true;
                                    }

                                }
                                if(isloggedin()){
                                    $id=$_SESSION['userEmail'];
                                    echo "<li><a href=\"userhome.php?id=$id\">Home</a></li>";
                                    echo "<li><a href=\"logout.php\">Logout</a></li>";
                                }
                                else{
                                    echo "<li><a href=\"login.php\">Login</a></li>";
                                    echo "<li><a href='register.php'>Register</a></li>";
                                }

                                ?>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <a class="brand" href="index.php"><img src="images/logo%20-%20Copy.png" alt="logo" ></a>
            <div class="pull-right">
                <nav class="navbar nav_bottom" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php?#about_Us">About us</a></li>
                            <li><a href="index.php?#why_Us">Why us</a></li>
                            <li class="last"><a href="index.php?#con_Us">Contacts</a></li>
                            <li>
                                <div class="wrap">
                                    <div class="">
                                        <form action="search.php" method="get">
                                            <input type="text" name="Search" style="line-height: 2 ;margin-left: 2.5em " placeholder="What are you looking for?">
                                            <button type="submit" name="TypeSubmit">
                                              <i class="fa fa-search" style="line-height: 2;margin-left: 2px "></i></a>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div> <!-- end pull-right -->

        </div> <!-- end container -->
    </div> <!-- end navbar-inner -->
</div> <!-- end navbar-inverse-blue -->


<!-- ============================  Navigation End ============================ -->