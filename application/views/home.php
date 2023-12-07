<!-- ##### Hero Area Start ##### -->
<?php if ($this->session->userdata('keyword') == NULL) { ?>
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <?php foreach ($caraousel as $data) { ?>
                <div class="single-hero-slide d-flex align-items-center justify-content-center">
                    <!-- Slide Img -->
                    <div class="slide-img bg-img" style="background-image: url(<?= base_url('assets/my-assets/upload/caraousel/' . $data['foto']) ?>);"></div>
                    <!-- Slide Content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="hero-slides-content text-center">
                                    <h6 data-animation="fadeInUp" data-delay="100ms"><?= $data['judul'] ?></h6>
                                    <h2 data-animation="fadeInUp" data-delay="300ms"><?= $data['judul'] ?><span><?= $data['judul'] ?></span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->


    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <h2><?= $konfig->judul_web ?></h2>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-9">
                                <div class="ablums-text text-center">
                                    <p><?= $konfig->profil_web;  ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="hero-area">
        <div class="single-hero-slide d-flex align-items-center justify-content-center" style="height: 15vh;">
            <div class="slide-img bg-img" style="background-color:black;">
            </div>
            <div>
                <div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <?php if (empty($Artic)) : ?>
                    <div>
                        <h1>Artikel tidak ditemukan</h1>
                    </div>
                <?php endif; ?>

                <?php foreach ($Artic as $data) { ?>
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="<?= base_url('assets/my-assets/upload/konten/' . $data['foto']) ?>" style="width:100vw;"></a>
                            <div class="post-date">
                                <h1><?= strftime('%d', strtotime($data['tanggal'])) ?></h1>
                                <span><?= strftime('%B %y', strtotime($data['tanggal'])) ?></span>
                            </div>
                        </div>

                        <div class="blog-content">
                            <a href="#" class="post-title"><?= $data['judul'] ?></a>
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">By<a href="#"> <?= $data['username'] ?></a></p>
                                <p class="tags"><a href="#"><?= $data['nama_kategori'] ?></a></p>
                            </div>
                            <p><?= substr($data['keterangan'], 0, 200); ?>
                                <?php if (strlen($data['keterangan']) > 200) : ?>
                                    . . . <a href="<?= base_url('Home/Article/' . $data['slug']) ?>">Baca Selengkapnya</a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>

                <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="blog-sidebar-area">
                    <div class="">
                        <form class="input-group mb-3" action="" method="post">
                            <input type="text" class="form-control" placeholder="Search . . ." name="keyword" autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input class="btn btn-outline-dark" type="submit" id="button-addon2" name="submit">
                        </form>
                    </div>

                    <!-- Widget Area -->
                    <div class="single-widget-area mb-30">
                        <div class="widget-title">
                            <h5>Kategori</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <?php foreach ($kategori as $data) { ?>
                                    <li><a href="<?= base_url('Home/Kategori/' . $data['id_kategori']) ?>"><?= $data['nama_kategori'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Miscellaneous Area End ##### -->