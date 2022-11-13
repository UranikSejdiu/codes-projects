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
        <section class="htc__product__area bg__white ptb--30">
            <div class="container">
                <div class="row">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style text-center" role="tablist">
                                <li class="active">
                                    <div class="tab-menu-text">
                                        <h4 class="text-center">Të dhënat e profilit tuaj </h4>
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
                                                <input type="hidden" name="updateIdPrd" id="updateIdPrd" value="<?php echo $id; ?>">
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="emri">Emri dhe Mbiemri</label>
                                                    <input style="margin-top:0;" type="text" name="emri" id="emri">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="email">Email adresa:</label>
                                                    <input style="margin-top:0;" type="email" name="email" id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="qyteti">Qyteti:</label>
                                                    <select name="qyteti" id="qyteti">
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
                                                    <label style="margin-bottom:0;" for="adresa">Adresa:</label>
                                                    <input style="margin-top:0;" type="text" name="adresa" id="adresa">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="zipCode">Kodi postar:</label>
                                                    <input style="margin-top:0;" type="number" name="zipCode" id="zipCode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom:0;" for="phone">Numri telefonit:</label>
                                                    <input style="margin-top:0;" type="tel" name="phone" id="phone">
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
    <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>

    <!-- End Footer Area -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include_once('scripts.php'); ?>
    <script src="scriptsProfili.js"></script>
    <script>
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
    </script>
</body>

</html>