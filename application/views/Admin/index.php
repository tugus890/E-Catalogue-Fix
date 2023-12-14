<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Dashboard</h4>

        <div class="row">
            <div class="col-6 mb-4">
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
            <div class="col-6 mb-4">
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

            <div class="col-6 mb-4">
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
        </div>
    </div>
    <!-- / Content -->