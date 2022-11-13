<div class="container">
    <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
            <div class="logo">
                <a href="index.php">
                    <img width="100" height="24" src="../images/icons/logo1.png" alt="logo">
                </a>
            </div>
        </div>
        <!-- Start MAinmenu Ares -->
        <div class="col-md-8 col-lg-8 col-sm-4 col-xs-4">
            <nav class="mainmenu__nav hidden-xs hidden-sm">
                <ul class="main__menu">
                    <li><a href="index.php">Ballina</a></li>
                    <li><a href="produktet.php">Produktet</a></li>
                    <?php if (isset($_SESSION['email']) || isset($_SESSION['password'])) {
                        echo '<li><a href="porosit.php">Porositë</a></li>';
                    } ?>
                    <li><a href="kontakto.php">Kontakti</a></li>
                </ul>
            </nav>
            <div class="mobile-menu clearfix visible-xs visible-sm">
                <nav id="mobile_dropdown">
                    <ul>
                        <li><a href="index.php">Ballina</a></li>
                        <li><a href="produktet.php">Produktet</a></li>
                        <?php if (isset($_SESSION['email']) || isset($_SESSION['password'])) {
                            echo '<li><a href="porosit.php">Porositë</a></li>';
                        } ?>
                        <li><a href="kontakto.php">Kontakti</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End MAinmenu Ares -->

        <div class="col-md-2 col-sm-3 col-xs-3" id="userStuff">
            <?php if (isset($_SESSION['email']) || isset($_SESSION['password'])) { ?>
                <ul class="menu-extra">
                    <?php echo '<li><a href="profile.php?ID=' . $id . '"><span aria-label="Profili" data-cooltipz-dir="bottom"><i class="ti-user"></i></span></a></li>'; ?>
                    <li><a href="logout-user.php"><span aria-label="Dil" data-cooltipz-dir="bottom"><i class="ti-unlink"></i></span></a></li>
                <?php } else { ?>
                    <a href="user-login.php" class="btn button-success btn-sm">Kyçuni</a>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div class="mobile-menu-area"></div>
</div>