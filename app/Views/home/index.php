<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .hero-text{
        background: linear-gradient(45deg, #f72585, #b5179e, #7209b7);
        width: 100%;
        padding: 50px 0;
        margin-top: 10%;
        color: #fff;
    }
    .hero-text table tr th,td{
        color: #000 ;
    }
    img{
        width: 100px;
    }
    .card{
        padding: 30px;
    }
</style>

<div class="hero-text">
    <div class="container">
       <div class="row">
           <div class="col-md-8">
                   <h1>Welcome to my Website</h1>
                   <h2>Hi <?= session()->get('name'); ?></h2>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <p style="text-align: center;">
                        <img src="/uploads/<?= session()->get('photo'); ?>" alt="">
                    </p>
                    <table>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td><?= session()->get('email'); ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td><?= session()->get('name'); ?></td>
                        </tr>
                    </table>
                    <a href="/login/logout" class="btn btn-login mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>