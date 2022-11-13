<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i Administratorëve</title>
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
                                            <h4 class="text-center">Menaxhimi i Administratorëve</h4>
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
                                            <input class="search expandright searchAdmin" id="searchAdmin" type="text" name="p" placeholder="Kërko administratorin">
                                            <label class="button searchbutton" for="searchAdmin"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" data-toggle="modal" data-target="#addAdmin"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtAdmin" class="table" style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Emri dhe Mbiemri</th>
                                                <th>Email-i</th>
                                                <th data-orderable="false">Fjalëkalimi</th>
                                                <th>Status</th>
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

        <!-- End Login Register Area -->
        <!-- Start Footer Area -->
        <?php include_once('footer.php'); ?>
    </div>
    <!-- End Footer Area -->
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->
    <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto administratorin e ri</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_Admin">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="name">Emri dhe mbiemri:</label>
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
                            <label style="margin-bottom:0;" for="cpassword">Verifiko fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="cpassword" id="cpassword">
                            <span toggle="#cpassword" class="fa fa-fw fa-eye field-icon toggle-password" id="spanCpass"></span>
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

    <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndrysho të dhënat e administratorëve</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_Admin">
                        <input type="hidden" name="id" id="updateidadmin" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="updateName">Emri dhe mbiemri:</label>
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
                            <label style="margin-bottom:0;" for="updateCpassword">Verifiko fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="updateCpassword" id="updateCpassword">
                            <span toggle="#updateCpassword" class="fa fa-fw fa-eye field-icon toggle-password" id="spanUcpass"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Ruaj</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    </div>
    <?php include_once('scripts.php'); ?>
    <script src="scriptsAdmin.js"></script>

    <script>
        $('#addAdmin').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanPass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#password').get(0).type = 'password';

            $('#spanCpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#cpassword').get(0).type = 'password';
        });

        $('#editAdmin').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanUpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#updatePassword').get(0).type = 'password';

            $('#spanUcpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#updateCpassword').get(0).type = 'password';
        });
        $('#password').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#cpassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#updatePassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#updateCpassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
    </script>
</body>

</html>