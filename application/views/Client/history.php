<!-- Content wrapper -->
<div class="content-wrapper">

    <!-- Content -->
    <style>
        .menu-vertical,
        .menu-vertical .menu-block,
        .menu-vertical .menu-inner>.menu-item,
        .menu-vertical .menu-inner>.menu-header {
            width: 16.25rem;
            text-align: left;
        }

        h5 {
            display: inherit;
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 style="text-align : left;" class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> History</h4>

        <div class="row">
            <!-- Striped Rows -->
            <div class="card">
                <h5 class="card-header">History</h5>
                <div class="table-responsive text-nowrap">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <nav class="navbar bg-body-tertiary">
                                <div class="container-fluid">

                                </div>
                            </nav>
                        </div>
                    </div>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <style>
                        div.dataTables_wrapper div.dataTables_length label {
                            display: inherit;
                        }
                    </style>

                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped datatables-basic">
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
                                <?php $no = $this->uri->segment(4) + 1;

                                foreach ($info as $tr) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $tr->nama_lengkap ?></td>
                                        <td><?php echo $tr->nama_produk ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($tr->tgl_sewa)) ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($tr->tgl_selesai)) ?></td>
                                        <td><?php echo $tr->jenis_kegiatan ?></td>
                                        <td>
                                            <center>
                                                <?php

                                                if (($tr->is_verif != null)) {
                                                    // Cek status verifikasi
                                                    if ($tr->is_verif == "0") {
                                                        echo '<a class="btn btn-sm btn-danger text-white">Gagal Diverifikasi</a>';
                                                    } else if ($tr->is_valid == "0") {
                                                        echo '<a class="btn btn-sm btn-danger text-white">Pembayaran Gagal</a>';
                                                    } else if ($tr->is_valid == "1" && $tr->pilihan_pembayaran == "LUNAS") {
                                                        echo '<a class="btn btn-sm btn-success text-white">Sukses</a>';
                                                    }
                                                }
                                                ?>
                                        </td>
                                        <center>

                                            <td>
                                                <!-- kalo ngga ada sk yg masuk sama belum diverif ke if dibawah -->
                                                <?php
                                                if ($tr->is_valid == "1" &&  $tr->pilihan_pembayaran == "LUNAS") { ?>

                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs text-white" href="<?= base_url('ChistoryClient/detail_transaksi/' . $tr->id_transaksi) ?>">
                                                        Detail
                                                    </a>
                                                    <a type="button" style="width: 80px; font-size: 12px;" data-bs-toggle="modal" data-bs-target="#modal_review_<?php echo $tr->id_sewa ?>" class="btn btn-info btn-xs text-white">
                                                        Review
                                                    </a>

                                                <?php } else if ($tr->is_verif == "0") { ?>

                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-secondary btn-xs text-white" href="<?= base_url('ChistoryClient/detail_transaksi/' . $tr->id_transaksi) ?>" disabled>
                                                        Detail
                                                    </a>
                                                    <a type="button" style="width: 80px; font-size: 12px;" data-bs-toggle="modal" data-bs-target="#modal_review_<?php echo $tr->id_sewa ?>" class="btn btn-secondary btn-xs text-white" disabled>
                                                        Review
                                                    </a>


                                                <?php } else if ($tr->is_valid == "0") { ?>
                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-primary btn-xs text-white" href="<?= base_url('ChistoryClient/detail_transaksi/' . $tr->id_transaksi) ?>">
                                                        Detail
                                                    </a>
                                                    <a type="button" style="width: 80px; font-size: 12px;" class="btn btn-secondary btn-xs text-white" disabled>
                                                        Review
                                                    </a>

                                                <?php } ?>
                                            </td>


                                        <?php endforeach; ?>

                                        </td>
                                    </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sk modal -->

<!-- sk modal -->
<?php foreach ($info as $tr) : ?>
    <div class="modal fade" id="modal_review_<?= $tr->id_sewa  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-content" role="document">
            <div class="modal-header">
                <div style="text-align: center;">
                    <img style="color: black;" src="<?= base_url('assets/img/pnb2.png') ?>" width="80px" alt="">E CATALOGUE PNB
                </div>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #f8f9fa;">
                <div class="container">
                    <div style="text-align: center;">
                        <h5 style="color: black;" class="modal-title fs-5" id="exampleModalLabel">REVIEW PRODUK <?= strtoupper($tr->nama_produk) ?></h5>
                        <img src="<?= base_url() . 'assets/upload/' . $tr->foto_produk1 ?>" width="100px" alt="">
                    </div>

                    <div class="post">
                        <div class="text">Thanks for rating us!</div>
                        <div class="edit">EDIT</div>
                    </div>

                    <center>
                        <div class="star-widget">
                            <form action="<?= base_url('ChistoryClient/tambah_star') ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="id_sewa" value="<?= $tr->id_sewa ?>">
                                <input type="radio" class="form-control" name="rate" id="rate-5" value="5">
                                <label for="rate-5" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-4" value="4">
                                <label for="rate-4" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-3" value="3">
                                <label for="rate-3" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-2" value="2">
                                <label for="rate-2" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-1" value="1">
                                <label for="rate-1" class="fas fa-star"></label>
                                <header></header>
                    </center>
                    <div class="textarea">
                        <textarea name="review" cols="60" rows="8" placeholder="Describe your experience.."></textarea>
                    </div>
                    <br>
                    <div class="btn">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Script Anda
            const btn = document.querySelector("button");
            const post = document.querySelector(".post");
            const widget = document.querySelector(".star-widget");
            const editBtn = document.querySelector(".edit");
            btn.onclick = () => {
                widget.style.display = "none";
                post.style.display = "block";
                editBtn.onclick = () => {
                    widget.style.display = "block";
                    post.style.display = "none";
                }
                return false;
            }
        });
    </script>
<?php endforeach; ?>