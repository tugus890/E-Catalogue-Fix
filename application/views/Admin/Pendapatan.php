<div class="content-wrapper mt-4">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Pendapatan</h4>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-primary">Data Pendapatan</h4>
                                <?php if ($this->session->flashdata('sukses')) : ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data Produk <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <div class="main-content">
                                    <section class="section">

                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="<?= base_url('assets/') ?>t_1/img/icons/unicons/office-building.png" alt="Credit Card" class="rounded" />
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span class="d-block mb-1">Total Produk</span>
                                                        <h5 class="card-title text-nowrap mb-2">
                                                            <?php foreach ($total_produk as $row) {
                                                                echo $row->banyak_disewa;
                                                            } ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="<?= base_url('assets/') ?>t_1/img/icons/unicons/popular.png" alt="Credit Card" class="rounded" />
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span class="d-block mb-1">Produk Terpopuler</span>
                                                        <h5 class="card-title text-nowrap mb-2">
                                                            <?php foreach ($populer as $pop) {
                                                                echo $pop->nama_produk;
                                                            } ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="<?= base_url('assets/') ?>t_1/img/icons/unicons/savings.png" alt="Credit Card" class="rounded" />
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span class="d-block mb-1">Total Pendapatan Hari Ini</span>
                                                        <h5 class="card-title text-nowrap mb-2">
                                                            <?php
                                                            foreach ($pendapatan_hari_ini as $day) {
                                                                if (empty($day->transaksi_day)) {
                                                                    echo "0";
                                                                } else {
                                                                    echo $day->transaksi_day;
                                                                }
                                                            }
                                                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4 mb-2">
                                                <a href="<?= base_url('admin/pendapatan/downloadLaporanBulanan'); ?>" target="_blank" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; color: #ffffff; background-color: #ff3e1d;" class="btn btn-sm btn-danger mb-2 text-white">
                                                    <i class="far fa-file-pdf"></i> Laporan Bulanan
                                                </a>
                                                <a href="<?= base_url('admin/pendapatan/downloadLaporanDay'); ?>" target="_blank" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; color: #ffffff; background-color: #ffab00;" class="btn btn-sm btn-warning mb-2 text-white">
                                                    <i class="far fa-file-pdf"></i> Laporan Hari Ini
                                                </a>
                                            </div>
                                            <table id="dataTable" class="table table-striped table-bordered ">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Total Produk Disewa</th>
                                                    <th>Jumlah Pendapatan/produk</th>


                                                </tr>

                                                <?php
                                                $no = 1;
                                                foreach ($produkStats as $produk) :
                                                ?>

                                                    <tr>
                                                        <td>
                                                            <?php echo $no++ ?></td>
                                                        <td><?php echo $produk->nama_produk ?></td>
                                                        <td><?php echo $produk->banyak_disewa ?></td>
                                                        <td><?php echo $produk->nominal_per_produk ?></td>
                                                    </tr>

                                                <?php endforeach; ?>
                                            </table>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>