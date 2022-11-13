<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDPPN - Kodi Verifikues</title>
    <?php include_once('links.php'); ?>
</head>

<body>
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->

            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat center center / cover ;height:100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="login" action="reset-code.php" method="POST" autocomplete="off">
                            <ul class="login__register__menu">
                                <li role="presentation" class="register"><a style="pointer-events: none;">Kodi për verifikim</a></li>
                            </ul>
                            <?php
                            if (isset($_SESSION['info'])) {
                            ?>
                                <div id="alert" class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                                <div id="alert" class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <input type="number" name="otp" placeholder="Enter code" required>
                            <div style="margin-top: 15px;" class="htc__login__btn">
                                <button type="submit" name="check-reset-otp" class="regBtn">Verefiko</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
    <?php include_once('scripts.php'); ?>
</body>

</html>