<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Role Access</h4>

        <div class="row">
            <!-- Striped Rows -->
            <div class="card">
                <h5 class="card-header">Role: <?= $role['role'] ?></h5>
                <div class="table-responsive text-nowrap">
                    <div class="row">
                        <div class="col-md-6">

                            <?= $this->session->flashdata('message'); ?>

                        </div>
                    </div>

                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th>Access</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($menu as $m) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $m['menu'] ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id']  ?>" data-menu="<?= $m['id']  ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Striped Rows -->
        </div>
    </div>
    <!-- / Content -->