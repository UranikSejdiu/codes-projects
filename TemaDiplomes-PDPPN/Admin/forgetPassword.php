<?php require_once "controllerUserData.php"; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Rikthimi i fjalëkalimit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>

    <header id="header" class="htc-header header--3 bg__white">
        <!-- Start Mainmenu Area -->

        <!-- End Mainmenu Area -->
    </header>
    <div class="body__overlay"></div>
    <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat center center / cover ;height:100vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu">
                        <li role="presentation" class="register"><a style="pointer-events: none;">Rikthimi i fjalëkalimit</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="htc__login__register__wrap">
                        <!-- Start Single Content -->
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div id="register" class="single__tabs__panel">
                            <form class="login" action="forgetPassword.php" method="POST" autocomplete="">
                                <input type="email" name="email" placeholder="Email-i*" required value="<?php echo $email ?>">
                                <div class="htc__login__btn">
                                    <button style="margin-top: 15px;" type="submit" name="check-email" class="regBtn">Vazhdo</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- End Login Register Content -->
        </div>
    </div>

    <!-- End Login Register Area -->
    <!-- Start Footer Area -->
    <?php include_once('footer.php'); ?>
    <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    <?php include_once('scripts.php'); ?>
</body>

</html>