<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i Kompanive</title>
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
        <section class="htc__product__area bg__white ptb--30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style text-center" role="tablist">
                                    <li class="active">
                                        <div class="tab-menu-text">
                                            <h4 class="text-center">Menaxhimi i Kompanive</h4>
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
                                            <input class="search expandright searchKompani" id="searchKompani" type="text" name="p" placeholder="Kërko kompaninë">
                                            <label class="button searchbutton" for="searchKompani"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addKompani"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtKompani" class="table " style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th class="text-center" data-orderable="false">Nr.</th>
                                                <th class="text-center" data-orderable="false">Logo</th>
                                                <th class="text-center">Kompania</th>
                                                <th class="text-center" data-orderable="false">Numri Fiskal</th>
                                                <th class="text-center" data-orderable="false">Lokacioni</th>
                                                <th class="text-center" data-orderable="false">Telefoni</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center" data-orderable="false">Fjalekalimi</th>
                                                <th class="text-center" data-orderable="false">Kodi</th>
                                                <th>Statusi</th>
                                                <th class="text-center" data-orderable="false">Modifiko</th>
                                                <th class="text-center" data-orderable="false">Fshi</th>
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
        <?php include_once('footer.php'); ?>
    </div>
    <!-- End Login Register Area -->
    <!-- Start Footer Area -->
    
    <!-- End Footer Area -->
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->
    <div class="modal fade" id="addKompani" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto kompaninë e re</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_kompani" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="name">Logoja:</label>
                            <input style="margin-top:0;border:none;" name="logo" id="logo" type="file">
                            <small><i>Formatet e lejuara jpg,jpeg,png</i></small><br>
                            <div id="image-holder"></div>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="name">Emri kompanisë:</label>
                            <input style="margin-top:0;" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="email">Email adresa:</label>
                            <input style="margin-top:0;" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="password">Fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="password" id="password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" id="spanPass"></span>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="fiskal">Numri Fiskal:</label>
                            <input style="margin-top:0;" type="number" name="fiskal" id="fiskal" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="phone">Numri telefonit:</label>
                            <input style="margin-top:0;" type="tel" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="lokacioni">Lokacioni</label>
                            <input class="lokacioni_add" style="margin-top:0;" name="lokacioni" id="lokacioni" type="text" value="42.560057,20.855082" autofocus><br>
                            <div id="mapContainer"></div>
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

    <div class="modal fade" id="updateKompani" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndysho të dhënat e kompanisë</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_kompani" enctype='multipart/form-data'>
                        <input type="hidden" name="updateIdKomp" id="updateIdKomp" value="">
                        <input type="hidden" name="trid" id="trid" value="">
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
                            <label style="margin-bottom:0;" for="updatePassword">Fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="updatePassword" id="updatePassword">
                            <span toggle="#updatePassword" class="fa fa-fw fa-eye field-icon toggle-password" id="spanUpass"></span>
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
                            <input class="updateLokacioni" style="margin-top:0;" name="updateLokacioni" id="updateLokacioni" type="text"><br>
                            <div id="mapContainerUpdate"></div>
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
    <script src="scriptsKompani.js"></script>

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

        $("#logo").on('change', function() {
            if (typeof(FileReader) != "undefined") {
                var image_holder = $("#image-holder");
                image_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });
    </script>
    <script>
        $('.lokacioni_add').leafletLocationPicker({
            alwaysOpen: true,
            height: 300,
            width: 250,
            cursorSize: '15px',
            mapContainer: "#mapContainer"
        });

        $('.updateLokacioni').leafletLocationPicker({
            alwaysOpen: true,
            height: 300,
            width: 250,
            cursorSize: '15px',
            mapContainer: "#mapContainerUpdate"
        });
    </script>

    <script>
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
        $("#updatePhone").inputmask({
            "mask": "(+383)49/999-999"
        });

        $('#addKompani').on('shown.bs.modal', function() {
            $('#lokacioni').focus();
        });

        $('#updateKompani').on('shown.bs.modal', function() {
            $('#updateLokacioni').focus();
        });

        $('#addKompani').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanPass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#password').get(0).type = 'password';
        });

        $('#updateKompani').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanUpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#updatePassword').get(0).type = 'password';
        });
        $('#password').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#updatePassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
    </script>
</body>

</html>