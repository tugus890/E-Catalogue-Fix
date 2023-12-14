<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-primary">Data Transaksi</h4>
                                <?php echo $this->session->flashdata('pesan') ?>

                                <a href="<?php echo base_url('ChistoryClient') ?>" class="btn btn-primary mb-4"><i class="ti-arrow-left"> Kembali</i></a>

                                <?php foreach ($sewa as $tr) : ?>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>NIK</label>
                                            <input type="text" name="nik" class="form-control" value="<?php echo $tr->nik ?>" disabled>
                                            <?php echo form_error('nik', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                        <div class="col-md-1 offset-md-2">
                                            <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Tanggal Selesai</label>
                                            <input type="text" name="tgl_selesai" class="form-control" value="<?php echo $tr->tgl_selesai ?>" disabled>
                                            <?php echo form_error('tgl_selesai', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $tr->nama_lengkap ?>" disabled>
                                            <?php echo form_error('nama_lengkap', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                        <div class="col-md-1 offset-md-2">
                                            <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Nama Produk</label>
                                            <input type="text" name="nama_produk" class="form-control" value="<?php echo $tr->nama_produk ?>" disabled>
                                            <?php echo form_error('nama_produk', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>No Telepon</label>
                                            <input type="text" name="no_telepon" class="form-control" value="<?php echo $tr->no_telepon ?>" disabled>
                                            <?php echo form_error('no_telepon', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                        <div class="col-md-1 offset-md-2">
                                            <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Catatan</label>
                                            <input type="text" name="catatan" class="form-control" value="<?php echo $tr->catatan ?>" disabled>
                                            <?php echo form_error('catatan', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Jenis Kegiatan</label>
                                            <input type="text" name="jenis_kegiatan" class="form-control" value="<?php echo $tr->jenis_kegiatan ?>" disabled>
                                            <?php echo form_error('jenis_kegiatan', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                        <div class="col-md-1 offset-md-2">
                                            <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                        </div>
                                        <div class="col-md-4 mb-3">

                                            <label>Bukti Pembayaran</label>
                                            <p>DP : <?php if ($tr->harga_dp !== null) {
                                                        if ($tr->harga_lunas == null) {
                                                            echo ' <a type="button" style="color: blue;" data-bs-toggle="modal" data-bs-target="#SKmodal">Lihat File</a>';
                                                        } else {
                                                            echo ' <a type="button" style="color: blue;" data-bs-toggle="modal" data-bs-target="#SKmodal">Lihat File</a>';
                                                        }
                                                    } else {
                                                        echo "-";
                                                    } ?> </p>
                                            <p>Lunas : <?php if ($tr->harga_lunas !== null) {
                                                            echo ' <a type="button" style="color: blue;" data-bs-toggle="modal" data-bs-target="#SKmodal">Lihat File</a>';;
                                                        } else {
                                                            echo "-";
                                                        } ?> </p>
                                            <?php echo form_error('jawaban', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Tanggal Penyewaan</label>
                                            <input type="text" name="tgl_sewa" class="form-control" value="<?php echo $tr->tgl_sewa ?>" disabled>
                                            <?php echo form_error('tgl_sewa', '<span class="text-small text-danger">', '</span>') ?>
                                        </div>
                                        <div class="col-md-1 offset-md-2">
                                            <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <?php if ($tr->is_valid == null) : ?>
                                                <a href="<?php echo base_url('admin/transaksi/approved_pembayaran/' . $tr->id_transaksi) ?>" class="btn btn-sm btn-success text-white">Approved</a>
                                                <a onclick="return confirm('Anda yakin membatalkan transaksi ini?')" href="<?php echo base_url('admin/transaksi/deny_pembayaran/' . $tr->id_transaksi) ?>" class="btn btn-sm btn-danger text-white">Deny</a>
                                            <?php else : ?>
                                                <a class="btn btn-sm btn-secondary text-white" Disabled>Approved</a>
                                                <a class="btn btn-sm btn-secondary text-white" Disabled>Deny</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="buktimodal" tabindex="-1" role="dialog" aria-labelledby="buktimodalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data FAQ</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?php echo base_url('admin/transaksi/upload_SK') ?>" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Upload Bukti Pembayaran (PDF) *Max 2 MB</label>
                                                            <input type="hidden" name="id_sewa" value="<?php echo $tr->id_sewa ?>">
                                                            <input type="file" name="dok_sk" class="form-control" accept="application/pdf">
                                                        </div>
                                                </div>
                                                <div class="modal-footer mx-auto">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Kirim</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Lihat SK -->
                                    <div class="modal fade" id="SKmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="exampleModalLabel">Rincian Pembayaran</h5>
                                                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="<?= base_url() . 'assets/bukti/' . $tr->bukti_pembayaran ?>" width="100%" height="500px">
                                                </div>
                                                <div class="modal-footer mx-auto">
                                                    <a class="btn  btn-primary" href="<?php echo base_url('admin/transaksi/download_pembayaran/') . $tr->bukti_pembayaran  ?>"><i class="fas fa-download"></i> Download Bukti</a>

                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <!-- <button type="button" data-bs-toggle="modal" data-bs-dismiss="modal" id="uploadUlangBtn" data-bs-target="#buktimodal" class="btn btn-success">Upload Ulang</button> -->
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>