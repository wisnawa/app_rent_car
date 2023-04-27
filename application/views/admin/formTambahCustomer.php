<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Customer</h1>
        </div>
    </section>
    <form method="POST" action="<?= base_url('admin/DataCustomer/tambahCustomerAksi'); ?>">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
            <?= form_error('nama', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">User Name</label>
            <input type="text" name="username" class="form-control">
            <?= form_error('username', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?= form_error('alamat', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <select class="form-control" name="gender" id="">
                <option value="">--Pilih Gender--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <?= form_error('gender', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">Nomor Whats Up / Nomor HP</label>
            <input type="number" name="no_telepon" class="form-control">
            <?= form_error('no_telepon', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">Nomor KTP</label>
            <input type="text" name="no_ktp" class="form-control">
            <?= form_error('no_ktp', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            <?= form_error('password', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        <button type="reset" class="btn btn-sm btn-warning">Reset</button>
    </form>
</div>