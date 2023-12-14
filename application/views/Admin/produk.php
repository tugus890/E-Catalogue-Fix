<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Data Produk</h4>

        <div class="row">
            <!-- Striped Rows -->
            <div class="card">
                <h5 class="card-header">Data Produk</h5>
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
                <div class="table-responsive text-nowrap">
                    <div class="row">
                        <div class="col-md-6">
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga DP</th>
                                <th>Harga Lunas</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($produk as $prd) : ?>
                                <tr>
                                    <td> <?= $no++ ?> </td>
                                    <td> <?= $prd['nama_produk'] ?> </td>
                                    <td> <?= $prd['harga_dp'] ?> </td>
                                    <td> <?= $prd['harga_lunas'] ?> </td>
                                    <td> <?= $prd['deskripsi_produk'] ?> </td>
                                    <td><img src="<?= base_url() ?>/assets/upload/<?= $prd['foto_produk1'] ?>" alt=""></td>
                                    <td>
                                        <div class="button_edit">
                                            <button type="button" style="width: 60px; font-size: 12px; color: white ;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editModal">
                                                EDIT
                                            </button>
                                        </div>
                                        <div class="button_delete">
                                            <a type="button" style="width: 60px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="<?= base_url('CadminProduk/hapus_produk/') ?><?= $prd['id_produk'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">
                                                DELETE
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
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
</div>



<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                <form action="<?= base_url('CadminProduk/tambah_produk') ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="nama">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="hdp" class="form-label">Harga DP</label>
                                <input type="text" name="hdp" class="form-control" id="hdp">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="hln" class="form-label">Harga Lunas</label>
                                <input type="text" name="hln" class="form-control" id="hln">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Pilih Gambar 1</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" accept="image/png, image/jpeg, image/jpg, image/gif">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" class="form-control">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="harga_dp" class="form-label">Harga DP</label>
                            <input type="text" id="harga_dp" name="harga_dp" class="form-control">
                        </div>
                        <div class="col mb-0">
                            <label for="harga_lunas" class="form-label">Harga Lunas</label>
                            <input type="text" id="harga_lunas" name="harga_lunas" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" accept="image/png, image/jpeg, image/jpg, image/gif">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>






<!-- 
    <tr>
        <td>
            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
        </td>
        <td>Jerry Milton</td>
        <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                </li>
            </ul>
        </td>
        <td><span class="badge bg-label-warning me-1">Pending</span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr> -->