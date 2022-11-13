<?php include('checkSession.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDPPN - Menaxhimi i Përdoruesve</title>
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
                                            <h4 class="text-center">Menaxhimi i Përdoruesve</h4>
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
                                            <input class="search expandright searchPerdorues" id="searchPerdorues" type="text" name="p" placeholder="Kërko përdoruesin">
                                            <label class="button searchbutton" for="searchPerdorues"><i class="ti-search"></i></label>
                                        </form>
                                    </div>
                                    <button class="button" id="addPrd" data-toggle="modal" data-target="#addPerdorues"><i class="fas fa-plus-circle"></i></button>
                                </div>

                                <div class="table-responsive">
                                    <table id="dtPerdorues" class="table " style="width:100%;">
                                        <thead class="text-center thead-dark">
                                            <tr>
                                                <th data-orderable="false">Nr.</th>
                                                <th>Emri dhe Mbiemri</th>
                                                <th>Qyteti</th>
                                                <th data-orderable="false">Adresa</th>
                                                <th data-orderable="false">Kodi postar</th>
                                                <th data-orderable="false">Telefoni</th>
                                                <th data-orderable="false">Email-i</th>
                                                <th data-orderable="false">Fjalëkalimi</th>
                                                <th data-orderable="false">Statusi</th>
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
        <?php include_once('footer.php'); ?>
    </div>
    <!-- End Login Register Area -->
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <!-- Add Admin Modal Start -->
    <div class="modal fade" id="addPerdorues" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Shto perdorues të ri</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="insert_perdorues">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="name">Emri dhe Mbiemri:</label>
                            <input style="margin-top:0;" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="city">Qyteti:</label>
                            <select name="city" id="city" required>
                                <option selected="selected" hidden>Zgjedh qytetin: </option>
                                <?php
                                $res = mysqli_query($con, "CALL selQytet()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['id_city']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="adress">Adresa:</label>
                            <input style="margin-top:0;" type="text" name="adress" id="adress">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="zipCode">Kodi Postar:</label>
                            <input style="margin-top:0;" type="number" name="zipCode" id="zipCode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="phone">Numri telefonit:</label>
                            <input style="margin-top:0;" type="tel" name="phone" id="phone">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Anulo</button>
                            <button type="submit" class="btn btn-info">Shto</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Update Perdorues Modal Start -->
    <div class="modal fade" id="updatePerdorues" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Ndysho të dhënat e përdoruesit</h3>
                </div>
                <div class="modal-body">
                    <form class="login" id="update_perdorues">
                        <input type="hidden" name="updateIdPrd" id="updateIdPrd" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uName">Emri dhe Mbiemri:</label>
                            <input style="margin-top:0;" type="text" name="uName" id="uName">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uCity">Qyteti:</label>
                            <select name="uCity" id="uCity" required>
                                <option hidden>Zgjedh qytetin: </option>
                                <?php
                                $res = mysqli_query($con1, "CALL selQytet()");
                                while ($row = $res->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['id_city']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uAdress">Adresa:</label>
                            <input style="margin-top:0;" type="text" name="uAdress" id="uAdress">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uZipCode">Kodi Postar:</label>
                            <input style="margin-top:0;" type="number" name="uZipCode" id="uZipCode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uPhone">Numri telefonit:</label>
                            <input style="margin-top:0;" type="tel" name="uPhone" id="uPhone">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uEmail">Email adresa:</label>
                            <input style="margin-top:0;" type="email" name="uEmail" id="uEmail">
                        </div>
                        <div class="form-group">
                            <label style="margin-bottom:0;" for="uPassword">Fjalëkalimi:</label>
                            <input style="margin-top:0;" type="password" name="uPassword" id="uPassword">
                            <span toggle="#uPassword" class="fa fa-fw fa-eye field-icon toggle-password" id="spanUpass"></span>
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
    <script src="scriptsPerdorues.js"></script>

    <script>
        $(":input").inputmask();
        $("#phone").inputmask({
            "mask": "(+383)49/999-999"
        });
        $("#uPhone").inputmask({
            "mask": "(+383)49/999-999"
        });

        $('#addPerdorues').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanPass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#password').get(0).type = 'password';
        });

        $('#updatePerdorues').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $('#spanUpass').removeClass("fa-eye-slash").addClass("fa-eye");
            $('#uPassword').get(0).type = 'password';
        });
        $('#password').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
        $('#uPassword').PassRequirements({
            popoverPlacement: 'auto',
            trigger: 'focus'
        });
    </script>
</body>

</html>