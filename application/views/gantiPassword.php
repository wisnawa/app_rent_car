<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/assets_stisla'); ?>/img/High_Resolution_Logo_ITS.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Ganti Password</h4>
                            </div>
                            <div class="card-body">
                                <div><?= $this->session->flashdata('pesan'); ?></div>
                                <form method="POST" action="<?= base_url('Auth/gantiPasswordAksi'); ?>">
                                    <div class="form-group">
                                        <label for="pass_baru">Password Baru</label>
                                        <input id="pass_baru" type="password" class="form-control" name="pass_baru" autofocus>
                                        <?= form_error('pass_baru', '<div class="text-danger text-small">', '</div>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="ulang_pass">Ulangi Password</label>
                                        </div>
                                        <input id="ulang_pass" type="password" class="form-control" name="ulang_pass">
                                        <?= form_error('ulang_pass', '<div class="text-danger text-small">', '</div>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Ganti Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy;
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>