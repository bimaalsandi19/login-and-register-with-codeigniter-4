<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="login">
<?php if(session()->getFlashdata('msg')) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <form action="<?= base_url('login/process'); ?>" method="POST">
                    <?= csrf_field(); ?>
                        <h3 class="mb-4">Login Form</h3>
                        <?php if(session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('message'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif(session()->getFlashdata('error')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                         <?php endif; ?>   
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control  <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>

                        <label for="" class=" mt-3">Password</label>
                        <input type="password" name="password" id="" class="form-control  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                        <a href="/login/reset_password" style="float: right;">Forgot Password ?</a>
                        <label for=""></label>
                        <input type="submit" value="LOGIN" class="btn btn-login form-control my-3">
                    </form>
                    <p style="text-align: center;">Not a Member <a href="/register">Sign Up Now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
    
<?= $this->endSection(); ?>