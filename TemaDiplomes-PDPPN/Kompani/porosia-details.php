<?php include_once('checkSession.php');
$_SESSION['location'] = $_SERVER['REQUEST_URI'];

$porosiID = $_GET['porosiID'];

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Detajet e porosisë</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once('links.php'); ?>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <?php include_once('nav.php'); ?>
            </div>
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <input type="hidden" name="porosiaID" id="porosiaID" value="<?php echo $porosiID; ?>">
        <div class="only-banner ptb--40 bg__white">
            <div class="container">
                <div class="only-banner-img">
                    <div class="md-stepper-horizontal orange">
                        <div id="step1" class="md-step ">
                            <div class="md-step-circle"><span>1</span></div>
                            <div class="md-step-title">E Hapur</div>
                            <div class="md-step-optional">Porosia është e Hapur</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div id="step2" class="md-step">
                            <div class="md-step-circle"><span>1</span></div>
                            <div class="md-step-title">E Verefikuar</div>
                            <div class="md-step-optional">Porosia është verifikuar</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div id="step3" class="md-step">
                            <div class="md-step-circle"><span>2</span></div>
                            <div class="md-step-title">Në Postë</div>
                            <div class="md-step-optional">Porosia është gati dhe do të niset së shpejti</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div id="step4" class="md-step">
                            <div class="md-step-circle"><span>3</span></div>
                            <div class="md-step-title">E Nisur</div>
                            <div class="md-step-optional">Porosia është duke shkuar</div>
                            <div class="md-step-bar-left"></div>
                            <div class="md-step-bar-right"></div>
                        </div>
                        <div id="step5" class="md-step">
                            <div class="md-step-circle"><span>4</span></div>
                            <div class="md-step-title">E Realizuar</div>
                            <div class="md-step-optional">Porosia është realizuar</div>
                            <div class="md-step-bar-left"></div>
                        </div>
                        <div id="anulim" class="md-step cancel active" style="display:none;">
                            <div class="md-step-circle"><span></span></div>
                            <div class="md-step-title">E Anuluar</div>
                            <div class="md-step-optional">Porosia është anuluar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Blog Area -->
        <div class="single-portfolio-area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="carousel">
                            <img id="img1" width="470" height="450" style="object-fit:contain;">
                            <img id="img2" width="470" height="450" style="object-fit:contain;">
                            <img id="img3" width="470" height="450" style="object-fit:contain;">
                            <img id="img4" width="470" height="450" style="object-fit:contain;">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="portfolio-description mrg-sm">
                            <h2 id="titulli"></h2>
                            <p id="pershkrimi"></p>
                            <div class="portfolio-info">
                                <ul>
                                    <li>Data e blerjes: <span style="text-transform:none;" id="date"></span></li>
                                    <li>Emri: <span style="text-transform:none;" id="emri"></span></li>
                                    <li>Email: <span style="text-transform:none;" id="email"></span></li>
                                    <li>Qyteti: <span style="text-transform:none;" id="qyteti"></span></li>
                                    <li>Adresa: <span style="text-transform:none;" id="adresa"></span></li>
                                    <li>Kodi Postar: <span style="text-transform:none;" id="zipCode"></span></li>
                                    <li>Telefoni: <span style="text-transform:none;" id="phone"></span></li>
                                    <li>Menyra e pageses: <span style="text-transform:none;" id="payMethod"></span></li>
                                    <li>Çmimi: <span style="text-transform:none;" id="qmimi"></span>€</li>
                                    <li>Sasia: <span style="text-transform:none;" id="sasia"></span></li>
                                    <li>Totali: <span style="text-transform:none;" id="total"></span>€</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Area -->
        <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <?php include_once('scripts.php'); ?>
    <script>
        $(document).ready(function() {
            fetchPorosiData();
            $('.carousel').slick({
                speed: 500,
                fade: true
            });
        })


        function fetchPorosiData() {
            var id = $('#porosiaID').val();
            $.ajax({
                url: "manageAllPorosit.php",
                data: {
                    id: id,
                    action: "fetchPorosiData",
                },
                type: "post",
                success: function(data) {
                    var json = JSON.parse(data);
                    $("#img1").attr("src", json.imazhi1);
                    $("#img2").attr("src", json.imazhi2);
                    $("#img3").attr("src", json.imazhi3);
                    $("#img4").attr("src", json.imazhi4);
                    $("#titulli").html(json.produkti);
                    $("#emri").html(json.emri);
                    $("#email").html(json.email);
                    $("#qyteti").html(json.qyteti);
                    $("#adresa").html(json.adresa);
                    $("#zipCode").html(json.zipCode);
                    $("#phone").html(json.phone);
                    $("#payMethod").html(json.menyraPageses);
                    $("#qmimi").html(json.qmimi);
                    $("#sasia").html(json.sasia);
                    $("#total").html(json.pagesa);
                    $("#date").html(json.dataBlerjes);
                    var statusi = json.statusi;
                    if (statusi == '1') {
                        $("#step1").addClass('active done');
                    } else if (statusi == '2') {
                        $("#step1").addClass('active done');
                        $("#step2").addClass('active done');
                    } else if (statusi == '3') {
                        $("#step1").addClass('active done');
                        $("#step2").addClass('active done');
                        $("#step3").addClass('active done');
                    } else if (statusi == '4') {
                        $("#step1").addClass('active done');
                        $("#step2").addClass('active done');
                        $("#step3").addClass('active done');
                        $("#step4").addClass('active done');
                    } else if (statusi == '5') {
                        $("#step1").addClass('active done');
                        $("#step2").addClass('active done');
                        $("#step3").addClass('active done');
                        $("#step4").addClass('active done');
                        $("#step5").addClass('active done');
                    } else {
                        $("#step1").hide();
                        $("#step2").hide();
                        $("#step3").hide();
                        $("#step4").hide();
                        $("#step5").hide();
                        $("#anulim").show();
                    }
                }
            });
        }
    </script>
</body>

</html>