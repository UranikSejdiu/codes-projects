<?php include_once('checkSession.php');
$_SESSION['location'] = $_SERVER['REQUEST_URI'];

$produktID = $_GET['produktID'];

$sql = "SELECT  produktet.produkti, produktet.imazhi1, produktet.imazhi2, produktet.imazhi3, produktet.imazhi4, produktet.pershkrimi, produktet.qmimi, produktet.stoku, madhesit.madhesia, ngjyrat.ngjyra, produktet.kompaniaID
FROM produktet
LEFT OUTER JOIN madhesit ON produktet.madhesiaID=madhesit.madhesiaID 
LEFT OUTER JOIN ngjyrat ON produktet.ngjyraID=ngjyrat.ngjyraID
WHERE  produktet.produktID=$produktID";

$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $produkti = $row['produkti'];
    $foto1 = $row['imazhi1'];
    $foto2 = $row['imazhi2'];
    $foto3 = $row['imazhi3'];
    $foto4 = $row['imazhi4'];
    $pershkrimi = $row['pershkrimi'];
    $qmimi = $row['qmimi'];
    $stoku = $row['stoku'];
    $madhesia = $row['madhesia'];
    $ngjyra = $row['ngjyra'];
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Detajet e produktit</title>
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
        <!-- End Header Style -->
        <div class="body__overlay"></div>
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div id="alerts"></div>
            <div class="container">
                <div class="row">

                    <input type="hidden" name="prodID" id="prodID" value="<?php echo $produktID; ?>">
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <!-- Start Small images -->
                            <ul class="product__small__images" role="tablist" style="width:120;height:140;">
                                <li role="presentation" class="pot-small-img active">
                                    <a href="#img-tab-1" role="tab" data-toggle="tab">
                                        <img src="<?php echo $foto1; ?>" style="object-fit:contain;" width="120" height="140">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img">
                                    <a href="#img-tab-2" role="tab" data-toggle="tab">
                                        <img src="<?php echo $foto2; ?>" style="object-fit:contain;" width="120" height="140">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img">
                                    <a href="#img-tab-3" role="tab" data-toggle="tab">
                                        <img src="<?php echo $foto3; ?>" style="object-fit:contain;" width="120" height="140">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img">
                                    <a href="#img-tab-4" role="tab" data-toggle="tab">
                                        <img src="<?php echo $foto4; ?>" style="object-fit:contain;" width="120" height="140">
                                    </a>
                                </li>
                            </ul>
                            <!-- End Small images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content" style="width:440px;height:590px;">
                                    <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                        <img src="<?php echo $foto1; ?>" width="440" height="590" style="object-fit:contain;" alt="full-image">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="img-tab-2">
                                        <img src="<?php echo $foto2; ?>" width="440" height="590" style="object-fit:contain;" alt="full-image">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="img-tab-3">
                                        <img src="<?php echo $foto3; ?>" width="440" height="590" style="object-fit:contain;" alt="full-image">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="img-tab-4">
                                        <img src="<?php echo $foto4; ?>" width="440" height="590" style="object-fit:contain;" alt="full-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2 id="produktTitulli"><?php echo $produkti; ?></h2>
                            </div>
                            <div class="pro__details">
                                <p id="pershkrimi"><?php echo $pershkrimi; ?></p>
                            </div>
                            <ul class="pro__dtl__prize">
                                <li id="qmimi"><?php echo $qmimi; ?>€</li>
                            </ul>
                            <?php
                            if ($ngjyra == '0') {
                            } else {
                            ?>
                                <div class="pro__dtl__color">
                                    <h2 class="title__5">Ngjyra</h2>
                                    <ul class="pro__choose__color">
                                        <?php
                                        if ($ngjyra == 'Black') {
                                            echo '<li><a><i title="Black" class="zmdi zmdi-circle black"></i></a></li>';
                                        } elseif ($ngjyra == 'Red') {
                                            echo '<li><a><i title="Red" class="zmdi zmdi-circle red"></i></a></li>';
                                        } elseif ($ngjyra == 'Blue') {
                                            echo '<li><a><i title="Blue" class="zmdi zmdi-circle blue"></i></a></li>';
                                        } elseif ($ngjyra == 'Gray') {
                                            echo '<li><a><i title="Gray" class="zmdi zmdi-circle gray"></i></a></li>';
                                        } elseif ($ngjyra == 'Purple') {
                                            echo '<li><a><i title="Purple" class="zmdi zmdi-circle purple"></i></a></li>';
                                        } elseif ($ngjyra == 'Orange') {
                                            echo '<li><a><i title="Orange"class="zmdi zmdi-circle orange"></i></a></li>';
                                        } elseif ($ngjyra == 'Yellow') {
                                            echo '<li><a><i title="Yellow" class="zmdi zmdi-circle yellow"></i></a></li>';
                                        } elseif ($ngjyra == 'Green') {
                                            echo '<li><a><i title="Green" class="zmdi zmdi-circle green"></i></a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if ($madhesia == '0') {
                            } else {
                            ?>
                                <div class="pro__dtl__size" id="madhesiaWrap">
                                    <h2 class="title__5">Madhësia</h2>
                                    <ul class="pro__choose__size">
                                        <li>
                                            <h3 id="madhesia"> <?php echo $madhesia; ?></h3>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>

                            <?php if ($stoku == 0) {
                                echo '<div class="pro__dtl__size">
                                <h2 class="title__5" style="color: #ff4136!important; font-weight:bold;">Nuk ka në disponim!</h2>
                            </div>';
                            } elseif ($stoku == 1) { ?>
                                <div class="pro__dtl__size">
                                    <h2 class="title__5" ">Disponueshmëria:<strong> Vetëm <?php echo $stoku; ?></strong></h2>
                            </div>
                                    <?php } else { ?>
                                        <div class="pro__dtl__size">
                                            <h2 class="title__5" ">Disponueshmëria:<strong> <?php echo $stoku; ?> artikuj</strong></h2>
                                        </div>
                                            <?php } ?>
                                        </div>
                                </div>
                        </div>
                    </div>
        </section>
        <!-- End Product Details-->
        <!-- Start Product tab -->

        <section class="htc__product__details__tab bg__white pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--30">
                            <li role="presentation" class="active">
                                <a>Vlerësimet</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row col-md-9">
                    <div class="review__address__inner " id="reviews">
                    </div>
                </div>
            </div>
        </section>
        <?php include_once('footer.php'); ?>
    </div>

    <!-- End Product tab -->
    <!-- Start Footer Area -->
    
    <!-- Body main wrapper end -->

    <!-- jquery latest version -->

    <?php include_once('scripts.php'); ?>
    <script src="scriptsVlersimet.js"></script>
</body>

</html>