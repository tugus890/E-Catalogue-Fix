<div class="content-wrapper mt-4">


    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Data Jadwal</h4>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-primary">JADWAL</h4>
                                <?php if ($this->session->flashdata('sukses')) : ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                JADWAL <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('validate')) : ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?= $this->session->flashdata('validate'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- <div class="row">


                           Button trigger modal -->

                                <?php echo $this->session->flashdata('pesan') ?>

                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nama Produk</th>
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = $this->uri->segment(4) + 1;
                                            foreach ($jadwal as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $item->nama_lengkap ?></td>
                                                    <td><?php echo $item->nama_produk ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($item->tgl_sewa)) ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($item->tgl_selesai)) ?></td>
                                                    <td><?php
                                                        if ($item->is_valid == null) {
                                                            echo '<a class="btn btn-sm btn-warning text-white">Proses Pengajuan</a>';
                                                        } else if ($item->is_valid != null && date('Y-m-d') <= $item->tgl_selesai) {
                                                            echo '<a class="btn btn-sm btn-danger text-white">Booked</a>';
                                                        } else if ($item->is_valid != null && date('Y-m-d') > $item->tgl_selesai) {
                                                            echo '<a class="btn btn-sm btn-success text-white">Selesai</a>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>

                                                        <div class="button_delete">
                                                            <a type="button" style="width: 70px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('admin/jadwal/delete_jadwal/') . $item->id_transaksi ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                                                DELETE
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- <div class="row mt-4">
                                    <div class="col-md-12">
                                        <?php echo $links ?>
                                    </div>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>