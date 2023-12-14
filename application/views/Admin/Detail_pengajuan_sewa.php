<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Data User</h4>
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-primary">Data Sewa</h4>
                <?php echo $this->session->flashdata('pesan') ?>

                <a href="<?php echo base_url('admin/transaksi') ?>" class="btn btn-primary mb-4">
                  <i class="ti-arrow-left"> Kembali</i>
                </a>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo $sewa->nik ?>" disabled>
                    <?php echo form_error('nik', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                  <div class="col-md-1 offset-md-2">
                    <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Tanggal Selesai</label>
                    <input type="text" name="tgl_selesai" class="form-control" value="<?php echo $sewa->tgl_selesai ?>" disabled>
                    <?php echo form_error('tgl_selesai', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $sewa->nama_lengkap ?>" disabled>
                    <?php echo form_error('nama_lengkap', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                  <div class="col-md-1 offset-md-2">
                    <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Nama Produk</label>
                    <?php foreach ($produk as $p) : ?>
                      <input type="text" name="nama_produk" class="form-control mb-3" value="<?php echo $p->nama_produk ?>" disabled>
                    <?php endforeach; ?>
                    <?php echo form_error('nama_produk', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="<?php echo $sewa->no_telepon ?>" disabled>
                    <?php echo form_error('no_telepon', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                  <div class="col-md-1 offset-md-2">
                    <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Catatan</label>
                    <input type="text" name="catatan" class="form-control" value="<?php echo $sewa->catatan ?>" disabled>
                    <?php echo form_error('catatan', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label>Jenis Kegiatan</label>
                    <input type="text" name="jenis_kegiatan" class="form-control" value="<?php echo $sewa->jenis_kegiatan ?>" disabled>
                    <?php echo form_error('jenis_kegiatan', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                  <div class="col-md-1 offset-md-2">
                    <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                  </div>
                  <div class="col-md-4 mb-3">

                    <label>Bukti Pembayaran</label>
                    <!-- jika sudah ada dp dan belum di verfikasi -->
                    <?php if ($DP && $DP->is_valid === '0') : ?>
                      <p>DP : <?= $DP->nominal ?></p>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#DPmodalDP">Lihat DP</button>
                      <br><br>
                      <a class="btn btn-success btn-sm" href="<?php echo base_url("admin/transaksi/approved_pembayaran/" . $DP->id_transaksi); ?>">
                        Done
                      </a>
                      <a type="button" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Membatalkan Transaksi ini ?')" href="<?php echo base_url("admin/transaksi/deny_pembayaran/" . $DP->id_transaksi); ?>">
                        Deny
                      </a>

                    <?php endif; ?>
                    <!-- jika sudah lunas dan belum di verifikasi -->
                    <?php if ($LUNAS && $LUNAS->is_valid === '0') : ?>
                      <br>
                      <p>Lunas : <?php if ($DP) {
                                    echo (float)$LUNAS->nominal + ((float)$DP->nominal);
                                  } else {
                                    echo (float)$LUNAS->nominal;
                                  } ?></p>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#DPmodalLUNAS">Lihat Lunas</button> <br><br>
                      <?php echo form_error('jawaban', '<span class="text-small text-danger">', '</span>') ?>
                      <a class="btn btn-success btn-sm" href="<?php echo base_url("admin/transaksi/approved_pembayaran/" . $LUNAS->id_transaksi); ?>">
                        Done
                      </a>
                      <a type="button" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Membatalkan Transaksi ini ?')" href="<?php echo base_url("admin/transaksi/deny_pembayaran/" . $LUNAS->id_transaksi); ?>">
                        Deny
                      </a>

                      <div class="modal fade" id="DPmodalLUNAS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <embed src="<?= base_url() . 'assets/bayar/' . $LUNAS->bukti_pembayaran ?>" type="application/pdf" width="100%" height="500px">
                            </div>

                          </div>
                        </div>
                      </div>

                    <?php endif; ?>

                    <?php if ($DP && $LUNAS) : ?>
                      <?php if ($DP->is_valid === '1' && $LUNAS->is_valid === '1') : ?>
                        <br> <strong>
                          Total Bayar : <?= $nominal->nominal ?></strong>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>



                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label>Tanggal Penyewaan</label>
                    <input type="text" name="tgl_sewa" class="form-control" value="<?php echo $sewa->tgl_sewa ?>" disabled>
                    <?php echo form_error('tgl_sewa', '<span class="text-small text-danger">', '</span>') ?>
                  </div>
                  <div class="col-md-1 offset-md-2">
                    <!-- Kolom kosong, dengan jarak 3 kolom dari sebelah kiri -->
                  </div>

                  <div class="col-md-4 mb-3">
                    <!-- ketika internal -->
                    <?php if ($sewa->dok_sk !== 'no-sk') : ?>
                      <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#buktimodal">Upload SK</button>
                      <!-- ketika sudah ada sk dan sk tidak dari internal -->
                      <?php if ($sewa->dok_sk != null && $sewa->dok_sk !== 'no-sk') { ?>
                        <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#SKmodal">Lihat File</button> <br><br>
                      <?php } else { ?>
                        <!-- munculkan tombol modal sk -->
                        <button type="button" class="btn btn-secondary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#SKmodal" disabled>Lihat File</button> <br><br>
                      <?php } ?>
                    <?php endif; ?>
                    <!-- jika verifikas tidak ada dan itu bukan dari internal -->
                    <?php if ($sewa->is_verif == null && $sewa->dok_sk !== 'no-sk') : ?>
                      <!-- jika sk sudah di upload -->
                      <?php if ($sewa->dok_sk !== '') : ?>
                        <a href="<?php echo base_url('admin/transaksi/approved/' . $sewa->id_sewa) ?>" class="btn btn-sm btn-success text-white">Approved</a>
                        <a onclick="return confirm('Anda yakin membatalkan transaksi ini?')" href="<?php echo base_url('admin/transaksi/deny/' . $sewa->id_sewa) ?>" class="btn btn-sm btn-danger text-white">Deny</a>
                      <?php endif; ?>
                      <!-- jika sk blm di upload  -->
                    <?php else : ?>
                      <!-- <?php if ($sewa->id_transaksi && $nominal->nominal >= $sewa->harga_lunas) : ?>
                        <a style="width: 80px; font-size: 12px;" class="btn btn-success btn-xs" href="<?php echo base_url("admin/transaksi/approved_pembayaran/" . $sewa->id_transaksi); ?>">
                          Done
                        </a>
                        <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" onclick="return confirm('Apakah Anda Yakin Membatalkan Transaksi ini ?')" href="<?php echo base_url("admin/transaksi/deny_pembayaran/" . $sewa->id_transaksi); ?>">
                          Deny
                        </a>
                      <?php endif; ?> -->

                    <?php endif; ?>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="buktimodal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form method="POST" action="<?php echo base_url('admin/transaksi/upload_SK') ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Upload Bukti Pembayaran (PDF) *Max 2 MB</label>
                            <input type="hidden" name="id_sewa" value="<?php echo $sewa->id_sewa ?>">
                            <input type="file" name="dok_sk" class="form-control" accept="application/pdf">
                          </div>
                        </div>
                        <div class="modal-footer mx-auto">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <embed src="<?= base_url() . 'assets/sk/' . $sewa->dok_sk ?>" type="application/pdf" width="100%" height="500px">
                      </div>
                      <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" data-toggle="modal" data-dismiss="modal" id="uploadUlangBtn" data-target="#buktimodal" class="btn btn-success">Upload Ulang</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="DPmodalDP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <embed src="<?= base_url() . 'assets/bayar/' . $DP->bukti_pembayaran ?>" type="application/pdf" width="100%" height="500px">
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>