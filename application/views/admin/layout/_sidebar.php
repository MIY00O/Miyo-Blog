<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('ControllerAdmin') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <?php if ($this->session->userdata('level') == 'Admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/Konfigurasi') ?>">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Konfigurasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/Form') ?>">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Forms</span>
                </a>
            </li>
        <?php } else { ?>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Admin/Konten') ?>">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Konten</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Admin/Kategori') ?>">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Kategori</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Admin/Caraousel') ?>">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Caraousel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home') ?>">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
            </a>
        </li>
    </ul>
</nav>