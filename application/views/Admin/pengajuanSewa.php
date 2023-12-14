<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Pengajuan Sewa</h4>

        <div class="row">
            <!-- Striped Rows -->
            <div class="card">
                <h5 class="card-header">Pengajuan Sewa</h5>
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
                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Produk</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Selesai</th>
                                <th>Jenis Kegiatan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>1</td>
                                <td> 1 </td>
                                <td>1 </td>
                                <td> 1</td>
                                <td> 1</td>
                                <td>1</td>
                                <td>
                                    <span class="badge bg-label-warning me-1">Pending</span>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="button_approve">
                                                <a type="button" style="width: 75px; font-size: 12px; color: white ;" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#editmodal">
                                                    APPROVE
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="button_detail">
                                                <a type="button" style="width: 75px; font-size: 12px; color: white ;" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#detailModal">
                                                    DETAIL
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" button_deny">
                                        <a type="button" style="width: 75px; font-size: 12px;" class="btn btn-danger btn-xs mt-1" href="" onclick="return confirm('Apakah Anda Yakin Ingin Menolak ?')">
                                            DENY
                                        </a>
                                    </div>
                                </td>
                            </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
                                <input type="date" id="tgl_sewa" name="tgl_sewa" class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-3">
                                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Tambah</button>
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