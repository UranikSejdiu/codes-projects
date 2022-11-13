<?php include('checkSession.php'); ?>

<?php if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Profili</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once('links.php'); ?>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <?php include_once('nav.php'); ?>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Login Register Content -->
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style text-center" role="tablist">
                                <li class="active">
                                    <div class="tab-menu-text">
                                        <h4 class="text-center">Të dhënat e kompanisë</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="alerts"></div>
                        <br>
                        <section id="sectionProfili" class="our-checkout-area bg__white" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-10 col-md-offset-1">
                                        <div class="checkout-left-sidebar" id="profiliDetails">
                                            <form class="login" id="updateProfili" enctype='multipart/form-data' style="margin-top:2%;">
                                                <input type="hidden" name="updateIdKomp" id="updateIdKomp" value="<?php echo $id; ?>">
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="updateLogo">Logoja:</label>
                                                    <input style="margin-top:0;border:none;" name="updateLogo" id="updateLogo" type="file">
                                                    <small><i>Formatet e lejuara jpg,jpeg,png</i></small><br>
                                                    <div id="image-holderUP">
                                                        <img width="100" height="100" id="logoUp" src="" alt="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="updateName">Emri kompanisë:</label>
                                                    <input style="margin-top:0;" type="text" name="updateName" id="updateName">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="updateEmail">Email adresa:</label>
                                                    <input style="margin-top:0;" type="email" name="updateEmail" id="updateEmail">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="updateFiskal">Numri Fiskal:</label>
                                                    <input style="margin-top:0;" type="number" name="updateFiskal" id="updateFiskal" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="updatePhone">Numri telefonit:</label>
                                                    <input style="margin-top:0;" type="tel" name="updatePhone" id="updatePhone">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="updateLokacioni">Lokacioni</label>
                                                    <input class="updateLokacioni" style="margin-top:0;" name="updateLokacioni" id="updateLokacioni" type="text" autofocus><br>
                                                    <div id="mapContainerUpdate"></div>
                                                </div>
                                                <div class="form-group text-right">
                                                    <button type="submit" value="ruaj" name="ruaj" class="btn btn-success">Ruaj</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="single-checkout-box" style="padding:1%;margin-top:2%;box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                            Për të përditsuar fjalëkalimin kliko <a href="new-password.php"></i><strong> KËTU!</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Login Register Area -->
    <!-- Start Footer Area -->
    <?php include_once('footer.php'); ?>
    <!-- End Footer Area -->
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->


    <?php include_once('scripts.php'); ?>
    <script src="scriptsProfili.js"></script>
    <script>
        $("#updateLogo").on('change', function() {
            if (typeof(FileReader) != "undefined") {
                var imageHolderUp = $("#image-holderUP");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logoUp')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(120);
                }
                imageHolderUp.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });

        $(":input").inputmask();
        $("#updatePhone").inputmask({
            "mask": "(+383)49/999-999"
        });
        $('#updateLokacioni').leafletLocationPicker({
            alwaysOpen: true,
            height: 300,
            width: 250,
            cursorSize: '15px',
            mapContainer: "#mapContainerUpdate"
        });
    </script>
</body>

</html>