<section class="hero-area">
    <div class="single-hero-slide d-flex align-items-center justify-content-center" style="height: 20vh;">
        <div class="slide-img bg-img" style="background-color:black;">
        </div>
        <div>
            <div>
            </div>
        </div>
    </div>
</section>

<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <?php if (empty($konten)) : ?>
                    <div>
                        <h1>Konten tidak ditemukan</h1>
                    </div>
                <?php endif; ?>
                <?php foreach ($konten as $data) { ?>
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
                                    . . . <a href="<?= base_url('home/article/' . $data['slug']) ?>">Baca Selengkapnya</a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-12 col-lg-3">
                <div class="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search . . ." name="search" autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <input class="btn btn-outline-dark" type="submit" id="button-addon2" name="submit">
                    </div>
                </div>
                <div class="blog-sidebar-area">

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