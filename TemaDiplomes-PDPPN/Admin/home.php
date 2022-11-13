<?php include_once('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Faqja Kryesore</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('links.php'); ?>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white ">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <?php include_once('nav.php'); ?>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- Canvas JS -->
        <section class="htc__product__area bg__white ptb--70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-center" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center">Statistikat e llogarive</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content another-product-style jump">
                                <br>
                                <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="container mt--30">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-right" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center" style="text-transform:none; color:black;">Kliko <a href="kategorit.php">KËTU</a> për të menaxhuar kategoritë e produkteve</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="container mt--10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-right" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center" style="text-transform:none; color:black;">Kliko <a href="madhesit.php">KËTU</a> për të menaxhuar madhësitë në bazë të kategorive</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="container mt--10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-right" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center" style="text-transform:none; color:black;">Kliko <a href="ngjyrat.php">KËTU</a> për të menaxhuar ngjyrat në bazë të kategorive</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>
        <?php include_once('footer.php'); ?>
    </div>
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include_once('scripts.php'); ?>

    <?php
    $sql = "SELECT * FROM admin";
    $query = mysqli_query($con, $sql);
    $adminTotal = mysqli_num_rows($query);

    $sql1 = "SELECT * FROM kompanite";
    $query1 = mysqli_query($con, $sql1);
    $kompaniTotal = mysqli_num_rows($query1);

    $sql2 = "SELECT * FROM perdoruesit";
    $query2 = mysqli_query($con, $sql2);
    $prdTotal = mysqli_num_rows($query2);


    $dataPoints = array(
        array("label" => "Administrator", "y" => $adminTotal),
        array("label" => "Kompanitë", "y" => $kompaniTotal),
        array("label" => "Përdoruesit", "y" => $prdTotal)
    );

    ?>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Numri total i llogarive të krijuara",
                    fontFamily: "Poppins",
                },
                subtitles: [{
                    text: "E shfaqur në %",
                    fontFamily: "Poppins",
                }],
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "#,##0",
                    fontFamily: "Poppins",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>

</body>

</html>