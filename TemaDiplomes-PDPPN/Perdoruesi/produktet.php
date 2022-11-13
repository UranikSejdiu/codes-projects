<?php include_once('checkSession.php');

$_SESSION['location'] = $_SERVER['REQUEST_URI'];

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Produktet</title>
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
                <input type="hidden" id="hiddenEmail" value="<?php $email ?>"></input>
            </div>
            <!-- End Mainmenu Area -->
        </header>

        <div class="body__overlay"></div>
        <section class="htc__shop__sidebar bg__white ptb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <div class="htc__shop__left__sidebar">
                            <!-- Start Range -->
                            <div class="htc-grid-range">
                                <div class="content-shopby">
                                    <h3>Filtro në bazë të çmimit:</h3>
                                    <input type="hidden" id="hidden_minimum_price" value="1" />
                                    <input type="hidden" id="hidden_maximum_price" value="1000" />
                                    <p id="price_show">1 - 1000</p>
                                    <div id="price_range"></div>
                                </div>
                            </div>
                            <!-- End Range -->
                            <!-- Kategorit checkboxes -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">Filtro në bazë të kategorive:</h4>
                                <?php
                                $sql = "SELECT * FROM kategoria WHERE kategoriaID > '0' ORDER BY kategoriaID";
                                $result = $con->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <ul class="sidebar__list">
                                        <input type="checkbox" class="form-check-input kategoria product_check" value="<?= $row['kategoriaID']; ?>" id="kategoria" autocomplete="off">
                                        <?= $row['kategoria']; ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <!-- End Kategorit checkboxes -->
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 smt-30">

                        <div class="row" id="result">
                            <div class="shop__grid__view__wrap another-product-style">
                                <!-- Start Single View -->
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                </div>
                                <!-- End Single View -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Footer Area -->

        <!-- End Footer Area -->
    </div>
    <?php include_once('footer.php'); ?>

    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include_once('scripts.php'); ?>
    <script>
        $(document).ready(function() {
            filter_data();

            function filter_data() {
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var kategoria = get_filter('kategoria');
                console.log(kategoria);
                $.ajax({
                    url: "sortProduktet.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        kategoria: kategoria
                    },
                    success: function(data) {
                        $('#grid-view').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('#' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.product_check').click(function() {
                filter_data();
            });

            $('#price_range').slider({
                range: true,
                min: 1,
                max: 1000,
                values: [1, 1000],
                step: 10,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });

        });
    </script>
</body>

</html>