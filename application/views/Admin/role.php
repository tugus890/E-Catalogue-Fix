<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Menu Manajemen</h4>

        <div class="row">
            <!-- Striped Rows -->
            <div class="card">
                <h5 class="card-header">Menu Management</h5>
                <div class="table-responsive text-nowrap">
                    <div class="row">
                        <div class="col-md-6">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>')  ?>

                            <?= $this->session->flashdata('message'); ?>

                            <nav class="navbar bg-body-tertiary">
                                <div class="container-fluid">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-primary" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" style="float: right; " class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($role as $r) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r['role'] ?></td>
                                    <td>
                                        <div class="button_role">
                                            <a class="btn btn-warning btn-xs" style="width: 60px; font-size: 12px;" href="<?= base_url('CadminDashboard/roleAccess/') . $r['id'] ?>">
                                                ACCESS
                                            </a>
                                        </div>
                                        <div class="button_edit">
                                            <button type="button" style="width: 60px; font-size: 12px; color: white ;" class="btn btn-primary btn-xs mt-3" data-bs-toggle="modal" data-bs-target="#editModal">
                                                EDIT
                                            </button>
                                        </div>
                                        <div class="button_delete">
                                            <a type="button" style="width: 60px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('') ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                                DELETE
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--/ Striped Rows -->
        </div>
    </div>
    <!-- / Content -->

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('CadminDashboard/role') ?>" method="POST">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" id="role" name="role" class="form-control" placeholder="Role name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Detail Pengajuan Sewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Tanggal Selesai</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Nama Produk</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">No Telepon</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Catatan</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Jenis Kegiatan</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="" class="form-label">Bukti Pembayaran</label>
                                <p>dd</p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="" class="form-label">Bukti Pembayaran</label>
                                <p>dd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Tanggal Penyewaan</label>
                                <input type="text" id="nik" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">Dokumen SK</label>
                                <input type="file" id="nik" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="float: right;">
                        <div class="col-md-3 m-2">
                            <div class="button_approve">
                                <a type="button" style="width: 75px; font-size: 12px; color: white ;" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#editmodal">
                                    APPROVE
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 m-2">
                            <div class="button_detail">
                                <a type="button" style="width: 75px; font-size: 12px; color: white ;" class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#detailModal">
                                    DENY
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>