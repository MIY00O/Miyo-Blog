<div class="card">
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkategori">
            Tambah Kategori
        </button>

        <div class="table-responsive ">
            <table class="table table-striped ">
                <thead class="">
                    <tr>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No</th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama Kategori
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $aa) { ?>
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xxs font-weight-bold"><?= $no++; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['nama_kategori']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editkategori<?= $aa['id_kategori'] ?>">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletekategori<?= $aa['id_kategori'] ?>">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    <!-- MODAL TAMBAH KATEGORI  -->
    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('Admin/Kategori/Simpan') ?>" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5 font-weight-bold" id="exampleModalLabel">Tambah Kategori</h3>
                    </div>
                    <div class="modal-body">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="nama kategori">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <?php foreach ($kategori as $aa) { ?>
        <div class="modal fade" id="editkategori<?= $aa['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Admin/Kategori/Update') ?>" method="post">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5 font-weight-bold" id="exampleModalLabel">Edit Kategori</h3>
                        </div>
                        <div class="modal-body">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" value="<?= $aa['nama_kategori'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="hidden" name="id_kategori" value="<?= $aa['id_kategori'] ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Delete Modal -->
    <?php foreach ($kategori as $aa) { ?>
        <div class="modal fade" id="deletekategori<?= $aa['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="<?= base_url('Admin/Kategori/Hapus/' . $aa['id_kategori']) ?>" method="post">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5 font-weight-bold" id="exampleModalLabel">Hapus Kategori</h3>
                        </div>
                        <div class="modal-body">
                            <label>Apakah kamu yakin akan menghapus kategori ini?</label>
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
    <!-- MODAL TAMBAH KATEGORI  -->
</footer>