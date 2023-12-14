<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Edit Profile</h4>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3 p-3" style="max-width: 500px">
                    <?= form_open_multipart('CsettingUser/profileEdit') ?>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?= $user['nama'] ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?= $user['email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->