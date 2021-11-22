<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <form action="/register/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                        <h3>Sign Up</h3>
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>

                        <label for="" class="mt-3">Password</label>
                        <input type="password" name="password" id="" class="form-control  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>

                        <label for="" class="mt-3">Confirm Password</label>
                        <input type="password" name="password2" id="" class="form-control  <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password2'); ?>
                        </div>

                        <label for="" class="mt-3">Name</label>
                        <input type="text" name="name" id="" class="form-control  <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= old('name'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>

                        <label for="" class="mt-3">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control  <?= ($validation->hasError('photo')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('photo'); ?>
                        </div>
                        <label for=""></label>
                        <input type="submit" value="SIGN UP" class="btn btn-login form-control">
                    </form>
                    <p align="center" style="margin-top: 10px;">Have an account ? <a href="/login">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>