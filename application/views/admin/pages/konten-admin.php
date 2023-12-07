<div class="card">
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkonten">
            Tambah Konten
        </button>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No</th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Judul
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Kategori Konten
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tanggal
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Pembuat
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Foto
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($konten as $aa) { ?>
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xxs font-weight-bold"><?= $no++; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['judul']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['nama_kategori']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['tanggal']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['name']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <img src="<?= base_url('assets/my-assets/upload/konten/' . $aa['foto']) ?>" alt="">
                            </td>
                            <td class="align-middle text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editkonten<?= $aa['id_konten'] ?>">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletekonten<?= $aa['id_konten'] ?>">Delete</button>
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
    <div class="modal fade" id="tambahkonten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah data konten</h3>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/Konten/Simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="row-3">
                            <label for="">Judul konten</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul Konten">
                        </div>
                        <div class="row-3">
                            <label for="">Kategori</label>
                            <select type="text" class="form-control" name="id_kategori">
                                <?php foreach ($kategori as $aa) { ?>
                                    <option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row-3">
                            <label for="">keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan"></textarea>
                        </div>
                        <div class="row-3">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <?php foreach ($konten as $aa) { ?>
        <div class="modal fade" id="editkonten<?= $aa['id_konten'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('admin/konten/update/' . $aa['foto']) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>">
                        <div class="modal-body">
                            <div class="card-body">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $aa['judul'] ?>">
                            </div>
                            <div class="card-body">
                                <label>keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan"><?= $aa['keterangan'] ?></textarea>
                            </div>
                            <div class="card-body">
                                <label>foto</label>
                                <input type="file" class="form-control" name="foto" value="<?= $aa['foto'] ?>">
                            </div>
                            <div class="card-body">
                                <label>Kategori</label>
                                <select type="text" class="form-control" name="id_kategori">
                                    <?php foreach ($kategori as $uu) { ?>
                                        <option <?php if ($uu['id_kategori'] == $aa['id_kategori']) {
                                                    echo "selected";
                                                } ?> value="<?= $uu['id_kategori'] ?>"><?= $uu['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Delete Modal -->
    <?php foreach ($konten as $aa) { ?>
        <div class="modal fade" id="deletekonten<?= $aa['id_konten'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="<?= base_url('admin/konten/hapus/' . $aa['foto']) ?>" method="post">
                        <div class="modal-header">
                            <h3 class="modal-title font-weight-bold" id="exampleModalLabel">Hapus data konten</h3>
                        </div>
                        <div class="modal-body">
                            <label>Apakah kamu yakin akan menghapus data konten ini?</label>
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