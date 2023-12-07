<div class="card">
    <div class="card-body">
        <form action="<?= base_url('Admin/Konfigurasi/Update') ?>" method="post">
            <div class="modal-header">
                <h3 class="title fs-5 font-weight-bold" id="exampleModalLabel">Konfigurasi</h3>
            </div>
            <div class="modal-body grid gap-0 row-gap-3">
                <div class="p-2 g-col-12">
                    <label>Judul Website</label>
                    <input type="text" class="form-control" name="judul_web" value="<?= $konfig->judul_web;  ?>">
                </div>
                <div class="p-2 g-col-12">
                    <label>Profile Website</label>
                    <textarea type="text" class="form-control" name="profil_web"><?= $konfig->profil_web;  ?></textarea>
                </div>
                <div class=" p-2 g-col-12">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="<?= $konfig->facebook;  ?>">
                </div>
                <div class=" p-2 g-col-12">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="instagram" value="<?= $konfig->instagram;  ?>">
                </div>
                <div class=" p-2 g-col-12">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $konfig->email;  ?>">
                </div>
                <div class=" p-2 g-col-12">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $konfig->alamat;  ?>">
                </div>
                <div class=" p-2 g-col-12">
                    <label>Whatsapp</label>
                    <input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa;  ?>">
                </div>
            </div>
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>