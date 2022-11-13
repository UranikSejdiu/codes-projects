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
    <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat center center / cover;">
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
                            <form class="login" action="user-login.php" method="POST">

                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="name">Emri dhe Mbiemri:</label>
                                    <input style="margin-top:0;" type="text" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="email">Email adresa:</label>
                                    <input style="margin-top:0;" type="email" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="password">Fjalëkalimi:</label>
                                    <input style="margin-top:0;" type="password" name="password" id="password">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" id="spanPass"></span>
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="password">Verefiko fjalëkalimin:</label>
                                    <input style="margin-top:0;" type="password" name="cpassword" id="cpassword">
                                    <span toggle="#cpassword" class="fa fa-fw fa-eye field-icon toggle-password" id="cspanPass"></span>
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="city">Qyteti:</label>
                                    <select name="city" id="city" required>
                                        <option selected="selected" hidden>Zgjedh qytetin: </option>
                                        <?php
                                        $res = mysqli_query($con, "CALL selQytet()");
                                        while ($row = $res->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $row['id_city']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="zipCode">Kodi Postar:</label>
                                    <input style="margin-top:0;" type="number" name="zipCode" id="zipCode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="adresa">Adresa:</label>
                                    <input style="margin-top:0;" type="text" name="adresa" id="adresa">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="phone">Numri telefonit:</label>
                                    <input style="margin-top:0;" type="tel" name="phone" id="phone">
                                </div>
                                <div class="htc__login__btn">
                                    <button type="submit" name="signup" class="regBtn">Regjistrohu</button>
                                </div>
                                <div style="margin-top: 15px;" class="link login-link text-center">Keni llogari? <a href="user-login.php">Kyçu këtu</a></div>
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
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
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