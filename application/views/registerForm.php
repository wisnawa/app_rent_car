<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/assets_stisla'); ?>/img/High_Resolution_Logo_ITS.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= base_url('Register'); ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Nama Lengkap</label>
                                            <input id="nama" type="text" class="form-control" name="nama" autofocus>
                                            <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Username</label>
                                            <input id="username" type="text" class="form-control" name="username">
                                            <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input id="alamat" type="text" class="form-control" name="alamat">
                                        <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="d-block">Gender</label>
                                            <select class="form-control" name="gender" id="">
                                                <option value="">--Pilih Gender--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <?= form_error('gender', '<div class="text-small text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>No. What'sUp / NO HP</label>
                                            <input type="number" class="form-control" name="no_telepon">
                                            <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>No. KTP</label>
                                            <input type="text" name="no_ktp" class="form-control">
                                            <?= form_error('no_ktp', '<div class="text-small text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                            <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>