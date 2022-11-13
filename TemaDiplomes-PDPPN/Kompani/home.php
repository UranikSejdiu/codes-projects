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
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer pb--60">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <?php include_once('nav.php'); ?>
                <input type="hidden" id="hiddenEmail" value="<?php $email ?>"></input>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>


        <!-- End Feature Product -->
        <div class="only-banner ptb--50 bg__white">
            <div class="container">
                <div class="only-banner-img">
                    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                </div>
            </div><br><br>
            <div class="container mt--10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-right" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center" style="text-transform:none; color:black;">Kliko <a href="vlersimet.php">KËTU</a> për të parë të gjitha vlersimet e blersëve</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>
        <!-- End Footer Area -->
    </div>

    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include_once('scripts.php'); ?>

    <?php

    $sql1 = "SELECT produktreview.starRating, produktet.kompaniaID FROM produktreview 
    LEFT JOIN produktet ON produktet.produktID = produktreview.produktID WHERE produktreview.starRating = '1' AND produktet.kompaniaID = $id";
    $query1 = mysqli_query($con, $sql1);
    $one = mysqli_num_rows($query1);

    $sql2 = "SELECT produktreview.starRating, produktet.kompaniaID FROM produktreview 
    LEFT JOIN produktet ON produktet.produktID = produktreview.produktID WHERE produktreview.starRating = '2' AND produktet.kompaniaID = $id";
    $query2 = mysqli_query($con, $sql2);
    $two = mysqli_num_rows($query2);

    $sql3 = "SELECT produktreview.starRating, produktet.kompaniaID FROM produktreview 
    LEFT JOIN produktet ON produktet.produktID = produktreview.produktID WHERE produktreview.starRating = '3' AND produktet.kompaniaID = $id";
    $query3 = mysqli_query($con, $sql3);
    $three = mysqli_num_rows($query3);

    $sql4 = "SELECT produktreview.starRating, produktet.kompaniaID FROM produktreview 
    LEFT JOIN produktet ON produktet.produktID = produktreview.produktID WHERE produktreview.starRating = '4' AND produktet.kompaniaID = $id";
    $query4 = mysqli_query($con, $sql4);
    $four = mysqli_num_rows($query4);

    $sql5 = "SELECT produktreview.starRating, produktet.kompaniaID FROM produktreview 
    LEFT JOIN produktet ON produktet.produktID = produktreview.produktID WHERE produktreview.starRating = '5' AND produktet.kompaniaID = $id";
    $query5 = mysqli_query($con, $sql5);
    $five = mysqli_num_rows($query5);


    $dataPoints = array(
        array("label" => "1 star", "y" => $one),
        array("label" => "2 stars", "y" => $two),
        array("label" => "3 stars", "y" => $three),
        array("label" => "4 stars", "y" => $four),
        array("label" => "5 stars", "y" => $five)
    );
    ?>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Vlersimet per produktet e juaja",
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