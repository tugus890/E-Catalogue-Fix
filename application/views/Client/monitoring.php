<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> Monitoring</h4>

    <div class="row">
      <!-- Striped Rows -->
      <div class="card">
        <h5 class="card-header">Monitoring Pengajuan</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped datatables-basic" id="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Nama Produk</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Selesai</th>
                <th>SK</th>
                <th>Invoice</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php $j = 1;
              // looping data produk sewa
              foreach ($produk as $item) :
                // select data dari tb_penyewaan
                $sql = "SELECT tb_produk.nama_produk  FROM tb_penyewaan INNER JOIN tb_produk ON tb_penyewaan.id_produk =  tb_produk.id_produk WHERE tb_penyewaan.id_sewa = '" . $item->id_sewa . "'";
                $data = $this->db->query($sql)->result();

                // select data transaksi 
                $sql2 = "SELECT SUM(nominal) as nominal, tb_transaksi.pilihan_pembayaran  FROM tb_transaksi WHERE id_sewa = '" . $item->id_sewa . "'";
                $nominal = $this->db->query($sql2)->row();

                // select data dp tb_trasaksi berdasarkan sewa id
                $DP = $this->db->query("SELECT  tb_transaksi.pilihan_pembayaran, tb_transaksi.is_valid  FROM tb_transaksi WHERE id_sewa = '" . $item->id_sewa . "' AND pilihan_pembayaran = 'DP'")->row();
                // select data lunas tb_trasaksi berdasarkan sewa id
                $LUNAS = $this->db->query("SELECT  tb_transaksi.pilihan_pembayaran, tb_transaksi.is_valid  FROM tb_transaksi WHERE id_sewa = '" . $item->id_sewa . "' AND pilihan_pembayaran = 'LUNAS'")->row();
              ?>

                <tr>
                  <td><?= $j++ ?></td>
                  <td><?= $item->nama_lengkap ?> </td>
                  <td width="20%">
                    <?php $i = 0;
                    foreach ($data as $d) : $i++ ?>
                      <?= $i . '.' . $d->nama_produk ?> <br>
                    <?php endforeach; ?>
                  </td>
                  <td><?= $item->tgl_sewa ?></td>
                  <td><?= $item->tgl_selesai ?></td>
                  <td>
                    <!-- cek apakah ada dokumen sk -->
                    <?php if ($item->dok_sk) : ?>
                      <a type="button" style="width: 60px; font-size: 12px; color: white ;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#SKmodal<?php echo $item->id_sewa ?>">
                        Lihat SK
                      </a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <!-- cek apakah data sewa tidak deny, approve, dan batal -->
                    <?php if ($item->is_verif !== '4' && $item->is_verif !== '0' && $item->is_verif !== Null) : ?>
                      <a style="width: auto; font-size: 12px; color: white ;" class="btn btn-primary btn-xs" href="<?= BASE_URL('user/monitoring/invoice/' . $item->id_sewa) ?>">
                        Lihat Invoice
                      </a>
                    <?php endif; ?>
                  </td>

                  <td>
                    <!-- cek total nominal sewa dengan harga lunas -->
                    <?php if ($nominal->nominal >= $item->harga_lunas) : ?>
                      <!-- cek dp dan staus tidak valid -->
                      <?php if ($DP && $DP->is_valid === '1') : ?>
                        <span class="badge bg-label-success me-1">Lunas</span>
                        <!-- cek lunas dan staus tidak valid -->
                      <?php elseif ($LUNAS && $LUNAS->is_valid === '1') : ?>
                        <span class="badge bg-label-success me-1">Lunas</span>
                      <?php else : ?>
                        <!-- cek dp dan verifikasi menunggu pembaayaran -->
                        <span class="badge bg-label-warning me-1">Menunggu Pembayaran</span>
                      <?php endif; ?>
                    <?php else : ?>
                      <!-- cek dp dan verifikasi tidak batal -->
                      <?php if ($item->is_verif === '4') : ?>
                        <span class="badge bg-label-danger me-1">Batal Sewa</span>
                        <!-- cek dp dan verifikasi tidak ksoong -->
                      <?php elseif ($item->is_verif === '0') : ?>
                        <span class="badge bg-label-danger me-1">Deny</span>
                      <?php else : ?>
                        <?php if ($item->is_verif == NULL && $item->dok_sk) : ?>
                          <span class="badge bg-label-warning me-1">Pending</span>
                        <?php elseif ($item->dok_sk) : ?>
                          <span class="badge bg-label-warning me-1">Menunggu Pembayaran</span>
                        <?php else : ?>
                          <span class="badge bg-label-warning me-1">Pending</span>
                        <?php endif; ?>
                        <!-- cek dp dan verifikasi menunggu pembaayaran -->
                        <!-- <span class="badge bg-label-warning me-1">Menunggu Pembayaran</span> -->
                      <?php endif; ?>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($item->dok_sk !== "" && $item->is_verif === '1' &&  $nominal->nominal <  $item->harga_lunas) : ?>
                      <?php if ($DP && $DP->is_valid === '1') : ?>
                        <div class="button_bayar">
                          <a type="button" style="width: 60px; font-size: 12px; color: white ;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#bayarmodal<?php echo $item->id_sewa ?>">
                            BAYAR
                          </a>
                        </div>
                      <?php else : ?>
                        <div class="button_bayar">
                          <a type="button" style="width: 60px; font-size: 12px; color: white ;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#bayarmodal<?php echo $item->id_sewa ?>">
                            BAYAR
                          </a>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (empty($LUNAS)) : ?>
                      <?php if ($item->is_verif !== '4' && $item->is_verif !== '0') : ?>
                        <div class="button_batal">
                          <a type="button" style="width: 60px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="monitoring/deny/<?= $item->id_sewa ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                            BATAL
                          </a>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>

                  </td>
                </tr>


                <!-- Modal Lihat SK -->
                <div class="modal fade" id="SKmodal<?php echo $item->id_sewa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <embed src="<?= base_url() . 'assets/sk/' . $item->dok_sk ?>" type="application/pdf" width="100%" height="500px">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Edit-->
                <div class="modal fade" id="bayarmodal<?php echo $item->id_sewa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Bayar</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <?php if ($this->session->flashdata('validate')) : ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('validate'); ?>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                        <form action="<?= base_url('user/monitoring/bayar/') . $item->id_sewa ?>" method="POST" enctype="multipart/form-data">
                          <div class="mb-3">
                            <label for="opsi" class="form-label">Pilih Opsi Pembayaran</label>
                            <select name="opsi" id="opsi<?= $item->id_sewa ?>" class=" form-control" required>
                              <option value="" disabled selected>-- Pilih Opsi Pembayaran --</option>
                              <?php if ($nominal->nominal <= 0  || $item->pilihan_pembayaran === "DP") : ?>
                                <option value="DP">DP</option>
                              <?php endif; ?>
                              <option value="LUNAS">LUNAS</option>
                            </select>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="opsi" class="form-label">Nama</label>
                                <input type="text" class="form-control" readonly nama="ats" value="Politeknik Negeri Bali">
                              </div>
                            </div>
                            <div class=" col-6">
                              <div class="mb-3">
                                <label for="opsi" class="form-label">Nominal</label>
                                <input type="number" id="valOpsi<?= $item->id_sewa ?>" class="form-control" name="nominal" readonly value="" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3">
                                <label for="opsi" class="form-label">Nomor Rekening</label>
                                <input type="text" class="form-control" name="rekening" readonly value="BPD - 123333312321">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3">
                                <label for="opsi" class="form-label">Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control" name="bayar" required>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="tambah" class="btn btn-primary">Bayar</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

                <script>
                  $('#opsi' + <?= $item->id_sewa ?>).change(function() {
                    let type = $(this).val();
                    let price = 0;
                    if (type == 'DP') {
                      price = "<?= $item->harga_dp ?>";
                    } else if (type == 'LUNAS') {
                      price = "<?= $item->harga_lunas -  (float)$nominal->nominal ?>";
                    }
                    $('#valOpsi' + <?= $item->id_sewa ?>).val(price);

                  })
                </script>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Striped Rows -->
    </div>
  </div>
  <!-- / Content -->