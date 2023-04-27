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
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <div><?= $this->session->flashdata('pesan'); ?></div>
                                <form method="POST" action="<?= base_url('Auth/login'); ?>">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input id="username" type="text" class="form-control" name="username" autofocus>
                                        <?= form_error('username', '<div class="text-danger text-small">', '</div>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password">
                                        <?= form_error('password', '<div class="text-danger text-small">', '</div>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="<?= base_url('Register'); ?>">Create One</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy;
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>