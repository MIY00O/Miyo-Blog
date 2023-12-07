    <div class="">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('Admin/Caraousel/Simpan') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="title fs-5 font-weight-bold" id="exampleModalLabel">Caraousel</h3>
                    </div>
                    <div class="modal-body grid gap-0 row-gap-3">
                        <div class="p-2 g-col-12">
                            <label>Judul Caraousel</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="p-2 g-col-12">
                            <label>Gunakan foto dengan ukuran 16:9</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-evenly">
        <?php foreach ($caraousel as $aa) { ?>
            <div class="mt-4 col-md-4">
                <div class="card">
                    <div class="mt-3 d-flex justify-content-center">
                        <img class="card-img-top rounded-5" style="width: auto; height: 25vh" src="<?= base_url('assets/my-assets/upload/caraousel/' . $aa['foto']) ?>" alt="">
                    </div>
                    <div class="card-body">
                        <div>
                            <label class="card-text"><?= $aa['judul'] ?></label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletecaraousel<?= $aa['id_caraousel'] ?>">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <footer>
        <!-- Delete Modal -->
        <?php foreach ($caraousel as $aa) { ?>
            <div class="modal fade" id="deletecaraousel<?= $aa['id_caraousel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="<?= base_url('Admin/Caraousel/Hapus/' . $aa['foto']) ?>" method="get">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5 font-weight-bold" id="exampleModalLabel">Hapus Caraousel</h3>
                            </div>
                            <div class="modal-body">
                                <label>Apakah kamu yakin akan menghapus caraousel ini?</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="Submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Delete Modal -->
    </footer>