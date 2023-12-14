<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Change Password 🔒</h4>
                    <p class="mb-4"><?= $this->session->userdata('reset_email') ?></p>
                    <?= $this->session->flashdata('message'); ?>

                    <form class="mb-3" action="<?= base_url('Cauth/changePassword') ?>" method="POST">
                        <div class="mb-3">
                            <label for="password1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Repeat Password</label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Change Password</button>
                    </form>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>

<!-- / Content -->