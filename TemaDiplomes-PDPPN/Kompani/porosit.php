<?php include('checkSession.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="iso-8859-15">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Lista e porosive</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <!-- End Login Register Content -->
        <section class="htc__product__area bg__white">
            <div class="container" style="width: 80%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-center" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center">Lista e të gjitha porosive të bëra</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="alerts"></div>
                            <br>
                            <div class="tab-content another-product-style jump">
                                <div class="table-responsive">
                                    <table id="dtPorosit" class="table" style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Produkti</th>
                                                <th data-orderable="false">Foto</th>
                                                <th data-orderable="false">Çmimi</th>
                                                <th data-orderable="false">Sasia</th>
                                                <th data-orderable="false">Totali</th>
                                                <th data-orderable="false">Menyra e pageses</th>
                                                <th data-orderable="false">Mesazhi</th>
                                                <th data-orderable="false">Qyteti</th>
                                                <th data-orderable="false">Adresa</th>
                                                <th data-orderable="false">Kodi postar</th>
                                                <th data-orderable="false">Nr. telefonit</th>
                                                <th data-orderable="false">Statusi</th>
                                                <th data-orderable="false">Ndrysho statusin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <!-- End Login Register Area -->
    <!-- Start Footer Area -->
    <?php include_once('footer.php'); ?>
   

    <?php include_once('scripts.php'); ?>
    <script src="scriptsPorosit.js"></script>
    <div class="modal fade" id="updateProdukt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndysho statusin e porosise</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_produkt">
                        <input type="hidden" name="updateIdPorosi" id="updateIdPorosi" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="status">Statusi:</label>
                            <select name="status" id="status" required>
                                <option selected="selected" hidden>Ndrysho statusin: </option>
                                <option value="0">Anulo</option>
                                <option value="1">E Hapur</option>
                                <option value="2">E Verefikuar</option>
                                <option value="3">Në Postë</option>
                                <option value="4">E Nisur</option>
                                <option value="5">E Realizuar</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Ndrysho</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>