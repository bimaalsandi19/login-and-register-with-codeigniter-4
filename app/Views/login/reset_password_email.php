<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<section class="reset_password">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3>Reset Password</h3>
                    <form action="/login/email_reset_password_validation" method="post">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                        <label for=""></label>
                        <input type="submit" value="Reset Password" class="btn btn-login form-control">
                    </form>
                    <a href="/" class="m-auto mt-2">Back To Login Form</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>