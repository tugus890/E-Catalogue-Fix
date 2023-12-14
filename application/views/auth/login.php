<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">

                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Login Page</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <?= $this->session->flashdata('message'); ?>

                    <form id="" class="mb-3" action="<?= base_url('Cauth') ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Enter your email" autofocus />
                            <small class="text-danger">
                                <?= form_error('email') ?>
                            </small>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="<?= base_url('Cauth/forgotPassword') ?>">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            </div>
                            <small class="text-danger">
                                <?= form_error('password') ?>
                            </small>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="<?= base_url('Cauth/register') ?>">
                            <span>Create an account</span>
                        </a>
                    </p>
                    <p class="text-center">
                        <a href="<?= base_url('ClandingPage') ?>">
                            <span>Back to landing page</span>
                        </a>
                    </p>

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->