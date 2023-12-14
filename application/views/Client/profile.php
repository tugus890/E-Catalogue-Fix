<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Profile</h4>

        <div class="row">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row mb-2 mt-2">
                    <div class="col-lg-6">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama'] ?></h5>
                            <p class="card-text"><?= $user['email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->