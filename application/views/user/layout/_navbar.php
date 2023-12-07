<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div id="sticky-wrapper" class="sticky-wrapper">
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off light left">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="<?= base_url('Home') ?>" class="nav-brand">
                            <h4 class="m-2 text-light row"><?= $konfig->judul_web; ?></h4>
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>

                                    <li><a href="<?= base_url('Home') ?>">Home</a></li>
                                    <li class="cn-dropdown-item has-down"><a href="#">Kategori</a>
                                        <ul class="dropdown">
                                            <?php foreach ($kategori as $data) { ?>
                                                <li><a href="<?= base_url('Home/Kategori/' . $data['id_kategori']) ?>"><?= $data['nama_kategori'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <span class="dd-trigger"></span>
                                    </li>
                                    <?php if ($this->session->userdata('level') == 'Admin') { ?>
                                        <li><a href="<?= base_url('ControllerAdmin') ?>">Admin Pages</a></li>
                                    <?php } elseif ($this->session->userdata('level') == 'Kontributor') { ?>
                                        <li><a href="<?= base_url('ControllerAdmin') ?>">Kontributor Pages</a></li>
                                    <?php } else { ?>
                                    <?php } ?>
                                </ul>

                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->
                                    <?php if ($this->session->userdata('name') == NULL) { ?>
                                        <div class="login-register-btn mr-50">
                                            <a href="#" type="button" data-toggle="modal" data-target="#login">
                                                Login
                                            </a>
                                        </div>

                                    <?php } else { ?>
                                        <div class="login-register-btn mr-50">
                                            <a href="#" type="button" data-toggle="modal" data-target="#logout">
                                                <?= $this->session->userdata('name') ?>
                                            </a>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->