<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Faqja kryesore</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <?php include_once('links.php'); ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

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
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Feature Product -->
        <section class="htc__feature__product pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM produktet ORDER BY RAND() LIMIT 1;");
                    while ($row = mysqli_fetch_array($result)) {
                        extract($row);
                    ?>
                        <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
                            <div class="feature foo">
                                <div class="feature__thumb">
                                    <a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>">
                                        <img width="470" height="678" style="object-fit:cover;" src="<?php echo $imazhi1; ?>" alt="feature product">
                                    </a>
                                </div>
                                <div class="feature__details">
                                    <h4 style="color:white;text-shadow: 5px 4px 11px rgb(0,0,0), 0 2px 5px rgb(0,0,0);"><a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>"><?php echo $produkti; ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Left Feature -->
                    <div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
                        <div class="row">
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM produktet ORDER BY RAND() LIMIT 1;");
                            while ($row = mysqli_fetch_array($result)) {
                                extract($row);
                            ?>
                                <div class="col-md-12 col-sm-12 col-xs-12 xmt-30">
                                    <div class="feature foo">
                                        <div class="feature__thumb">
                                            <a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>">
                                                <img width="670" height="324" style="object-fit:cover;" src="<?php echo $imazhi1; ?>" alt="feature product">
                                            </a>
                                        </div>
                                        <div class="feature__details">
                                            <h4 style="color:white;text-shadow: 5px 4px 11px rgb(0,0,0), 0 2px 5px rgb(0,0,0);"><a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>"><?php echo $produkti; ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-5 mt--30 hidden-sm hidden-xs">
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM produktet ORDER BY RAND() LIMIT 1;");
                                while ($row = mysqli_fetch_array($result)) {
                                    extract($row);
                                ?>
                                    <div class="feature foo">
                                        <div class="feature__thumb--2">
                                            <a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>">
                                                <img width="270" height="324" style="object-fit:cover;" src="<?php echo $imazhi1; ?>" alt="feature product">
                                            </a>
                                        </div>
                                        <div class="feature__details">
                                            <h4 style="color:white;text-shadow: 5px 4px 11px rgb(0,0,0), 0 2px 5px rgb(0,0,0);"><a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>"><?php echo $produkti; ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-7 mt--30 col-sm-12 col-xs-12 xmt-30">
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM produktet ORDER BY RAND() LIMIT 1;");
                                while ($row = mysqli_fetch_array($result)) {
                                    extract($row);
                                ?>
                                    <div class="feature foo">
                                        <div class="feature__thumb">
                                            <a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>">
                                                <img width="370" height="324" style="object-fit:cover;" src="<?php echo $imazhi1; ?>" alt="feature product">
                                            </a>
                                        </div>
                                        <div class="feature__details">
                                            <h4 style="color:white;text-shadow: 5px 4px 11px rgb(0,0,0), 0 2px 5px rgb(0,0,0);"><a href="detajeProduktit.php?produktID=<?php echo $produktID; ?>"><?php echo $produkti; ?></a></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Feature Product -->
        <!-- Start Popular Courses -->
        <section class="htc__popular__product pb--130 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="htc__choose__wrap bg__cat--4">
                            <h2 class="choose__title">Përse ne?</h2>
                            <div class="choose__container">
                                <div class="single__chooose">
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-heart"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Dhurata të shumta</h4>
                                            <p>Gjatë eventeve dhe festave do ketë edhe dhurata për ju. </p>
                                        </div>
                                    </div>
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-truck"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Transporti pa pagesë</h4>
                                            <p>Të gjitha produktet dërgohen tek ju pa paguar për asgjë. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single__chooose">
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-reload"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Mundësi kthimi</h4>
                                            <p>Produktin mundë ta hapni dhe ta ktheni prapë nëse nuk është si në porosi. </p>
                                        </div>
                                    </div>
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-time"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Kontakto 24/7</h4>
                                            <p>Për gjdo nevojë ekipi ynë është i gatshëm të ju ndihmojë. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Popular Courses -->
        <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <?php include_once('scripts.php'); ?>

</body>

</html>