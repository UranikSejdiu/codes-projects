<?php require_once "controllerUserData.php"; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Regjisrimi në sistem</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>
    <!---
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> -->

    <!-- Body main wrapper start -->

    <!-- Start Header Style -->
    <header id="header" class="htc-header header--3 bg__white">
        <!-- Start Mainmenu Area -->

        <!-- End Mainmenu Area -->
    </header>
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
                        <li role="presentation" class="register"><a style="pointer-events: none;">Krijo Llogarinë</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div>
                        <!-- Start Single Content -->
                        <?php
                        if (count($errors) == 1) {
                        ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        } elseif (count($errors) > 1) {
                        ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach ($errors as $showerror) {
                                ?>
                                    <li><?php echo $showerror; ?></li>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div id="register" class="single__tabs__panel">
                            <form class="login" action="index.php" method="POST">
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="name">Emri dhe Mbiemri:</label>
                                    <input style="margin-top:0;" type="text" name="name" id="name" value="<?php echo $name ?>">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="name">Email-i:</label>
                                    <input style="margin-top:0;" type="email" name="email" id="email" required value="<?php echo $email ?>">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="name">Fjalëkalimi:</label>
                                    <input style="margin-top:0;" type="password" id="password" name="password" required>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" id="spanPass"></span>
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="name">Rishkruaj fjalëkalimin:</label>
                                    <input style="margin-top:0;" type="password" id="cpassword" name="cpassword" required>
                                    <span toggle="#cpassword" class="fa fa-fw fa-eye field-icon toggle-password" id="cspanPass"></span>
                                </div>
                                <div class="htc__login__btn">
                                    <button type="submit" name="signup" class="regBtn">Regjistrohu</button>
                                </div>
                                <div style="margin-top: 15px;" class="link login-link text-center">Keni llogari? <a href="index.php">Kyçu këtu</a></div>
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
    <script>
        $('#password').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#cpassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
    </script>
</body>

</html>