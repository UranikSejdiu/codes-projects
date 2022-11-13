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
                            <form class="login" action="index.php" method="POST" enctype='multipart/form-data'>
                                <div class="form-group typeFile" style="border-bottom: 1px solid #8e8e8e;">
                                    <label style="margin-bottom:0;" for="name">Logoja:</label>
                                    <small><i>Formatet e lejuara jpg,jpeg,png</i></small><br>
                                    <input style="margin-top:0;border:none;" name="logo" id="logo" type="file">
                                    <label for="logo" class="btnGet">Zgjedh logon tuaj</label>
                                    <br>
                                    <div id="image-holder" style="margin-bottom:5px;"></div>
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="name">Emri kompanisë:</label>
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
                                    <label style="margin-bottom:0;" for="fiskal">Numri Fiskal:</label>
                                    <input style="margin-top:0;" type="number" name="fiskal" id="fiskal" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="phone">Numri telefonit:</label>
                                    <input style="margin-top:0;" type="tel" name="phone" id="phone">
                                </div>
                                <div class="form-group">
                                    <label style="margin-bottom:0;" for="lokacioni">Lokacioni</label>
                                    <input class="lokacioni_add" style="margin-top:0;" name="lokacioni" id="lokacioni" type="text" value="42.560057,20.855082" autofocus><br>
                                    <div id="mapContainer"></div>
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
        $("#logo").on('change', function() {
            if (typeof(FileReader) != "undefined") {
                var image_holder = $("#image-holder");
                image_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
        $('#addKompani').on('shown.bs.modal', function() {
            $('#lokacioni').focus();
        });
        $('#password').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#cpassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('.lokacioni_add').leafletLocationPicker({
            alwaysOpen: true,
            height: 300,
            width: 500,
            cursorSize: '15px',
            mapContainer: "#mapContainer"
        });
    </script>
</body>

</html>