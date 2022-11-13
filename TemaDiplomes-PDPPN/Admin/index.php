<?php require_once "controllerUserData.php"; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Kyçja në sistem</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>

    <!-- Body main wrapper start -->
    <!-- Start Header Style -->
    <!-- End Header Style -->

    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->

    <!-- End Offset Wrapper -->
    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat center center / cover ;height:100vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu">
                        <li role="presentation" class="register"><a style="pointer-events: none;">Kyçu</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="alert alert-success alert-dismissible" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="success-message"></span>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="htc__login__register__wrap">
                        <!-- Start Single Content -->

                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                            <?php
                            if (count($errors) > 0) {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <form id="login" class="login" method="POST" autocomplete="">
                                <div class="form-group">
                                    <input type="text" name="email" id="email" placeholder="Email-i*" value="<?php echo $email ?>" required>
                                </div>
                                <div class="from-group mt--20">
                                    <input type="password" name="password" id="password" placeholder="Fjalëkalimi*" required>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" id="spanPass"></span>
                                </div>
                                <div class="tabs__checkbox">
                                    <span class="forgetPass"><a href="forgetPassword.php">Harruat fjalëkalimin?</a></span>
                                </div>
                                <div class="htc__login__btn">
                                    <button type="submit" class="regBtn" name="login">Kyçu</button>
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
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <?php include_once('scripts.php'); ?>

</body>

</html>