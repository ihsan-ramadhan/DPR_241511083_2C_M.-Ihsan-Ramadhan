<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                        <h3>Transparansi Gaji DPR</h3>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
    <script>
        alert('<?= session()->getFlashdata('error') ?>');
    </script>
    <?php endif; ?>

<?= $this->endSection() ?>