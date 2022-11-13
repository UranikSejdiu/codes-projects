<?php include('checkSession.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="iso-8859-15">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i produkteve</title>
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
                                            <h4 class="text-center">Menaxhimi i produkteve</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="alerts"></div>
                            <br>
                            <div class="tab-content another-product-style jump">
                                <div class="btn-search mt-5">
                                    <div class="search-container">
                                        <form action="/search" method="get">
                                            <input class="search expandright searchProdukt" id="searchProdukt" type="text" name="p" placeholder="Kërko produktin">
                                            <label class="button searchbutton" for="searchProdukt"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addProdukt"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtProduktet" class="table" style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Produkti</th>
                                                <th data-orderable="false">Imazhi 1</th>
                                                <th data-orderable="false">Imazhi 2</th>
                                                <th data-orderable="false">Imazhi 3</th>
                                                <th data-orderable="false">Imazhi 4</th>
                                                <th>Kategoria</th>
                                                <th data-orderable="false">Detajet e produktit</th>
                                                <th>Çmimi</th>
                                                <th data-orderable="false">Stoku</th>
                                                <th data-orderable="false">Madhesia</th>
                                                <th data-orderable="false">Ngjyra</th>
                                                <th data-orderable="false">Modifiko</th>
                                                <th data-orderable="false">Fshi</th>
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


    </div>
    <div class="modal fade" id="addProdukt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto produkt të ri</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_produkt" enctype='multipart/form-data'>
                        <input type="hidden" name="kompania" id="kompania" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="image1">Foto 1:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="image1" id="image1" type="file">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="image2">Foto 2:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="image2" id="image2" type="file">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="image3">Foto 3:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="image3" id="image3" type="file">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="image4">Foto 4:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="image4" id="image4" type="file">
                        </div>
                        <div style="display:inline-block;" id="image-holder1"></div>
                        <div style="display:inline-block;" id="image-holder2"></div>
                        <div style="display:inline-block;" id="image-holder3"></div>
                        <div style="display:inline-block;" id="image-holder4" style="margin-bottom:5px;"></div>

                        <div class="form-group" style="margin-top:2%;border-top: 1px solid #8e8e8e;">
                            <label style="margin-bottom:0;" for="name">Emri:</label>
                            <input style="margin-top:0;" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="kat">Kategoria:</label>
                            <select name="kat" id="kat" required>
                                <option selected="selected" hidden>Zgjedh kategorinë: </option>
                                <?php
                                $res = mysqli_query($con, "CALL selKategorit()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    `<option value="<?php echo $row['kategoriaID']; ?>"><?php echo $row['kategoria']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="pershkrimi">Përshkrimi:</label>
                            <textarea style="width: 100%;" rows="5" name="pershkrimi" id="pershkrimi"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="qmimi">Çmimi:</label>
                            <input style="margin-top:0;" type="number" min="1" step="any" name="qmimi" id="qmimi">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="stok">Stoku:</label>
                            <input style="margin-top:0;" type="number" min="1" name="stok" id="stok">
                        </div>
                        <div class="form-group" id="size" style="display: none;">
                            <label style="margin-bottom:0;" for="madhesia">Madhësia:</label>
                            <select name="madhesia" id="madhesia">
                            </select>
                        </div>
                        <div class="form-group" id="color" style="display: none;">
                            <label style="margin-bottom:0;" for="ngjyra">Ngjyra:</label>
                            <select name="ngjyra" id="ngjyra">
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Shto</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="updateProdukt" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndysho të dhënat e produktit</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_produkt" enctype='multipart/form-data'>
                        <input type="hidden" name="updateIdProd" id="updateIdProd" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uImage1">Foto 1:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="uImage1" id="uImage1" type="file">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uImage2">Foto 2:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="uImage2" id="uImage2" type="file">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uImage3">Foto 3:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="uImage3" id="uImage3" type="file">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uImage4">Foto 4:</label>&nbsp;
                            <input style="margin-top:0;border:none;" name="uImage4" id="uImage4" type="file">
                        </div>
                        <div style="display:inline-block;" id="uImage-holder1"></div>
                        <div style="display:inline-block;" id="uImage-holder2"></div>
                        <div style="display:inline-block;" id="uImage-holder3"></div>
                        <div style="display:inline-block;" id="uImage-holder4" style="margin-bottom:5px;"></div>

                        <div class="form-group" style="margin-top:2%;border-top: 1px solid #8e8e8e;">
                            <label style="margin-bottom:0;" for="uName">Emri:</label>
                            <input style="margin-top:0;" type="text" name="uName" id="uName">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uKat">Kategoria:</label>
                            <select name="uKat" id="uKat" required>
                                <option selected="selected" hidden>Zgjedh kategorinë: </option>
                                <?php
                                $res = mysqli_query($con1, "CALL selKategorit()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['kategoriaID']; ?>"><?php echo $row['kategoria']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uPershkrimi">Përshkrimi:</label>
                            <textarea style="width: 100%;" rows="5" name="uPershkrimi" id="uPershkrimi"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uQmimi">Çmimi:</label>
                            <input style="margin-top:0;" type="number" min="1" step="any" name="uQmimi" id="uQmimi">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uStok">Stoku:</label>
                            <input style="margin-top:0;" type="number" min="1" name="uStok" id="uStok">
                        </div>
                        <div class="form-group" id="uSize">
                            <label style="margin-bottom:0;" for="uMadhesia">Madhësia:</label>
                            <select name="uMadhesia" id="uMadhesia">
                            </select>
                            <input type="hidden" id="oldMadhesia">
                        </div>
                        <div class="form-group" id="uColor">
                            <label style="margin-bottom:0;" for="uNgjyra">Ngjyra:</label>
                            <select name="uNgjyra" id="uNgjyra">
                            </select>
                            <input type="hidden" id="oldNgjyra">
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

    <?php include_once('scripts.php'); ?>
    <script src="scriptsProduktet.js"></script>
    <script>
        $('#addProdukt').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#size').hide();
            $('#color').hide();
            $('#image-holder1').html("");
            $('#image-holder2').html("");
            $('#image-holder3').html("");
            $('#image-holder4').html("");
        });
        $('#updateProdukt').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#size').hide();
            $('#color').hide();
            $('#uImage-holder1').html("");
            $('#uImage-holder2').html("");
            $('#uImage-holder3').html("");
            $('#uImage-holder4').html("");
        });

        $("#image1").on('change', function() {
            $('#image-holder1').html("");
            $('#image-holder1').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#image2").on('change', function() {
            $('#image-holder2').html("");
            $('#image-holder2').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#image3").on('change', function() {
            $('#image-holder3').html("");
            $('#image-holder3').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#image4").on('change', function() {
            $('#image-holder4').html("");
            $('#image-holder4').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#uImage1").on('change', function() {
            $('#uImage-holder1').html("");
            $('#uImage-holder1').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#uImage2").on('change', function() {
            $('#uImage-holder2').html("");
            $('#uImage-holder2').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#uImage3").on('change', function() {
            $('#uImage-holder3').html("");
            $('#uImage-holder3').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });

        $("#uImage4").on('change', function() {
            $('#uImage-holder4').html("");
            $('#uImage-holder4').append("<img width='120' height='120' style='padding:2px;' src='" + URL.createObjectURL(event.target.files[0]) + "'>");
        });
    </script>
</body>

</html>