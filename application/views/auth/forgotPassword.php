<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Forgot Password? 🔒</h4>
                    <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                    <?= $this->session->flashdata('message'); ?>

                    <form class="mb-3" action="<?= base_url('Cauth/forgotPassword') ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Enter your email" autofocus />
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Reset Password</button>
                    </form>
                    <div class="text-center">
                        <a href="<?= base_url('Cauth') ?>" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Back to login
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>

<!-- / Content -->