<div class="card">
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Tambah User
        </button>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No</th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Username
                        </th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama</th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Level</th>
                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $aa) { ?>
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xxs font-weight-bold"><?= $no++; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['username']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['name']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?= $aa['level']; ?></span>
                            </td>
                            <td class="align-middle text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $aa['id_user'] ?>">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $aa['id_user'] ?>">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<footer>
    <!-- MODAL TAMBAH ADMIN  -->
    <!-- Tambah Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-body">
                        <form action="<?= base_url('Admin/Form/Simpan') ?>" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="">
                                <label for="col-sm-2 col-form-label">Level</label>
                                <div>
                                    <select name="level" class="form-control">
                                        <option value="Kontributor">Kontributor</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                    </div>
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
    <?php foreach ($user as $aa) { ?>
        <div class="modal fade" id="edit<?= $aa['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Admin/Form/Update') ?>" method="post">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="<?= $aa['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $aa['username'] ?>">
                                </div>
                                <div class="">
                                    <label for="col-sm-2 col-form-label">Level</label>
                                    <div>
                                        <select name="level" class="form-control">
                                            <option value="Kontributor" <?php if ($aa['level'] == 'Kontributor') {
                                                                            echo "selected";
                                                                        } ?>>Kontributor</option>
                                            <option value="Admin" <?php if ($aa['level'] == 'Admin') {
                                                                        echo "selected";
                                                                    } ?>>Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Delete Modal -->
    <?php foreach ($user as $aa) { ?>
        <div class="modal fade" id="delete<?= $aa['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="<?= base_url('Admin/Form/Hapus/' . $aa['id_user']) ?>" method="post">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h3>
                        </div>
                        <div class="modal-body">
                            <label>Apakah kamu yakin akan menghapus data user ini?</label>
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
    <!-- MODAL TAMBAH ADMIN  -->
</footer>