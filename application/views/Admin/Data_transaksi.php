<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Data Sewa</h4>
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                  <h4 class="card-title text-primary">Data Transaksi</h4>

                  <!-- Button trigger modal -->
                  <div class="button_tambah" style="float: right;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                      Tambah
                    </button>
                  </div>
                </div>
                <?php if ($this->session->flashdata("sukses")) : ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Transaksi <strong>Berhasil </strong><?= $this->session->flashdata("sukses") ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("validate")) : ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata("validate") ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php echo $this->session->flashdata("pesan"); ?>
                <div class="table-responsive">
                  <table class="table table-bordered datatables-basic" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Produk</th>
                        <th>Tgl Sewa</th>
                        <th>Tgl Selesai</th>
                        <th>Jenis Kegiatan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = $this->uri->segment(4) + 1;
                      foreach ($sewa as $tr) :
                        $sql = "SELECT tb_produk.nama_produk  FROM tb_penyewaan INNER JOIN tb_produk ON tb_penyewaan.id_produk =  tb_produk.id_produk WHERE tb_penyewaan.id_sewa = '" . $tr->id_sewa . "'";
                        $data = $this->db->query($sql)->result();
                        $nominal = $this->db->query("SELECT SUM(nominal) as nominal  FROM tb_transaksi WHERE id_sewa = '" . $tr->id_sewa . "'")->row();
                        $LUNAS   = $this->db->query("SELECT * FROM tb_transaksi WHERE id_sewa = '" . $tr->id_sewa . "' AND pilihan_pembayaran = 'LUNAS'")->row();
                        $DP      = $this->db->query("SELECT *  FROM tb_transaksi WHERE id_sewa = '" . $tr->id_sewa . "' AND pilihan_pembayaran = 'DP'")->row();
                      ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $tr->nama_lengkap; ?></td>
                          <td width="20%"><?php $i = 0;
                                          foreach ($data as $d) : $i++ ?>
                              <?= $i . '.' . $d->nama_produk ?> <br>
                            <?php endforeach; ?>
                          </td>
                          <td><?= date("d/m/Y", strtotime($tr->tgl_sewa)); ?></td>
                          <td><?= date("d/m/Y", strtotime($tr->tgl_selesai)); ?></td>
                          <td><?= $tr->jenis_kegiatan; ?></td>
                          <td>
                            <center>
                              <!-- ini ketika dari internal -->
                              <?php if ($tr->dok_sk == 'no-sk' && $tr->is_verif == "1") : ?>
                                <a class="btn btn-sm btn-success text-white">Approved</a>
                                <!-- ketika sk belum di upload dan status verif pending -->
                              <?php elseif ($tr->dok_sk == null && $tr->is_verif == '0') : ?>
                                <a class="btn btn-sm btn-warning text-white">Pending</a>
                                <!-- ketika ada sk atau tidak null  -->
                              <?php elseif ($tr->dok_sk !== null) : ?>
                                <!-- ketika verif diapproved -->
                                <?php if ($tr->is_verif == '1') : ?>
                                  <!-- ketika transaksi ada pembayaran dp -->
                                  <?php if ($tr->is_valid == '1') : ?>
                                    <!-- ketika nominal di transaski sudah lebih dari harga lunas -->
                                    <?php if ($nominal->nominal >= $tr->harga_lunas) : ?>
                                      <!-- ketika transasksi sudah lunas dan di acc admin -->
                                      <?php if ($LUNAS && $LUNAS->is_valid === '1') : ?>
                                        <a class="btn btn-sm btn-success text-white">Done</a>
                                      <?php else : ?>
                                        <!-- ketika nominal transaksi sudah dari harga lunas tetapi blm di acc admin -->
                                        <a class="btn btn-sm btn-warning text-white">Belum Lunas</a>
                                      <?php endif; ?>
                                    <?php else : ?>
                                      <!-- ketika baru dp saja -->
                                      <a class="btn btn-sm btn-warning text-white">Belum Lunas</a>
                                    <?php endif; ?>
                                  <?php else : ?>
                                    <!-- ketika baru upload sk -->
                                    <a class="btn btn-sm btn-success text-white">Approved</a>
                                  <?php endif; ?>
                                  <!-- ketika blum di verifikasi admin -->
                                <?php elseif ($tr->is_verif == null) : ?>
                                  <!-- ketika verif di deny -->
                                  <a class="btn btn-sm btn-warning text-white">Pending</a>
                                <?php elseif ($tr->is_verif == '0') : ?>
                                  <!-- ketika di tolak -->
                                  <a class="btn btn-sm btn-danger text-white">Deny</a>
                                <?php endif; ?>
                              <?php endif; ?>
                              <center>
                          </td>
                          <td>
                            <!-- ini ketika dari internal -->
                            <?php if ($tr->dok_sk == 'no-sk' && $tr->is_verif == "1") : ?>
                              <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs text-white mt-1" href="<?php echo base_url("admin/transaksi/detail/" .   $tr->id_sewa); ?>">
                                Detail
                              </a>
                              <!-- ini ketika sk belum upload dan masih pending -->
                            <?php elseif ($tr->dok_sk == null && $tr->is_verif == NULL) : ?>
                              <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs text-white mt-1" href="<?php echo base_url("admin/transaksi/detail/" .   $tr->id_sewa); ?>">
                                Detail
                              </a>
                              <!-- ini ketika sk udah upload  -->
                            <?php elseif ($tr->dok_sk !== null) : ?>
                              <!-- dan masih pending -->
                              <?php if ($tr->is_verif == NULL && $tr->dok_sk !== '') : ?>
                                <a href="<?php echo base_url('admin/transaksi/approved/' . $tr->id_sewa) ?>" class="btn btn-sm btn-success text-white">Approved</a>
                                <a onclick="return confirm('Anda yakin membatalkan transaksi ini?')" href="<?php echo base_url('admin/transaksi/deny/' . $tr->id_sewa) ?>" class="btn btn-sm btn-danger text-white">Deny</a>
                              <?php elseif ($tr->is_verif == 1 && $tr->is_valid == 0 && $tr->id_transaksi && $nominal->nominal >= $tr->harga_lunas) : ?>
                                <a style="width: 80px; font-size: 12px;" class="btn btn-success btn-xs" href="<?php echo base_url("admin/transaksi/approved_pembayaran/" . $tr->id_transaksi); ?>">
                                  Done
                                </a>
                                <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" onclick="return confirm('Apakah Anda Yakin Membatalkan Transaksi ini ?')" href="<?php echo base_url("admin/transaksi/deny_pembayaran/" . $tr->id_transaksi); ?>">
                                  Deny
                                </a>
                              <?php endif; ?>
                              <!-- ketika sudah approved -->
                              <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs text-white mt-1" href="<?php echo base_url("admin/transaksi/detail/" .   $tr->id_sewa); ?>">
                                Detail
                              </a>
                            <?php endif; ?>
                          </td>
                        <?php endforeach; ?>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if ($this->session->flashdata("validate")) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata("validate") ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <form action="<?= base_url("admin/transaksi/tambah_sewa_aksi") ?>" method="POST" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
            <?php echo form_error("nama_lengkap", '<div class="text-small text-danger">', "</div>"); ?>
          </div>


          <div class="mb-3">
            <label>Pilih Produk</label>
            <select class="form-control" name="nama_produk" required>
              <option value="">-- List Produk --</option>
              <?php foreach ($produk as $pd) : ?>
                <option value="<?= $pd->id_produk ?>"><?= $pd->nama_produk ?></option>
              <?php endforeach; ?>
            </select>
            <?php echo form_error("nama_produk", '<span class="text-small text-danger">', "</span>"); ?>

          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
                <input type="date" name="tgl_sewa" class="form-control" id="tgl_sewa" required>
                <?php echo form_error("tgl_sewa", '<div class="text-small text-danger">', "</div>"); ?>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" required>
                <?php echo form_error("tgl_selesai", '<div class="text-small text-danger">', "</div>"); ?>

              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
            <input type="text" name="jenis_kegiatan" class="form-control" id="jenis_kegiatan" required>
            <?php echo form_error("jenis_kegiatan", '<div class="text-small text-danger">', "</div>"); ?>
          </div>

          <div class="modal-footer">
            <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>