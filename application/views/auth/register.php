<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">

                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Register Page 📝 </h4>
                    <p class="mb-4">Create your account to get new experience</p>

                    <form class="mb-3" action="<?= base_url('Cauth/register')  ?>" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter your name" value="<?= set_value('nama') ?>">
                            <small class="text-danger">
                                <?= form_error('nama') ?>
                            </small>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email') ?>">
                            <small class="text-danger">
                                <?= form_error('email') ?>
                            </small>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                <small class="text-danger">
                                    <?= form_error('password1') ?>
                                </small>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Register</button>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="<?= base_url('Cauth') ?>">
                            <span>Log in instead</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

<!-- / Content -->