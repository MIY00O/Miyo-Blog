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
            <div class="blog-post-thumb mt-30">
            </div>

            <div class="col-12 col-lg-9">
                <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <img src="<?= base_url('assets/my-assets/upload/konten/' . $konten->foto) ?>" alt="">

                    <div class="blog-content">

                        <a href="#" class="post-title"><?= $konten->judul ?></a>
                        <div class="post-meta d-flex mb-30">
                            <p class="post-author">By<a href="#"> <?= $konten->username ?></a></p>
                            <p class="tags"><a href="#"><?= $konten->nama_kategori ?></a></p>
                        </div>
                        <p><?= $konten->keterangan ?></p>
                    </div>
                </div>
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