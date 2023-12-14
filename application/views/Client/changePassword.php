<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Change Password</h4>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3 p-3" style="max-width: 500px">
                    <?= $this->session->flashdata('message') ?>
                    <form class="mb-3" action="<?= base_url('CsettingUser/changePassword')  ?>" method="POST">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                            <small class="text-danger">
                                <?= form_error('current_password') ?>
                            </small>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="new_password1" class="form-label">New Password</label>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="new_password1" name="new_password1" placeholder="New Password">
                                <small class="text-danger">
                                    <?= form_error('new_password1') ?>
                                </small>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="new_password2" name="new_password2" placeholder="Repeat Password">
                                <small class="text-danger">
                                    <?= form_error('new_password2') ?>
                                </small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid ">Change</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->