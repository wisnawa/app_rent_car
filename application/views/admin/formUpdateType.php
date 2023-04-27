<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Update Type Mobil</h1>
        </div>
    </div>
    <?php foreach ($type as $tp) : ?>
        <form method="POST" action="<?= base_url('admin/DataType/updateTypeAksi'); ?>">
            <div class="form-group">
                <label for="">Kode Type</label>
                <input type="hidden" name="id_type" value="<?= $tp->id_type; ?>">
                <input type="text" name="kode_type" class="form-control" value="<?= $tp->kode_type; ?>">
                <?= form_error('kode_type', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nama Type</label>
                <input type="text" name="nama_type" class="form-control" value="<?= $tp->nama_type; ?>">
                <?= form_error('nama_type', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    <?php endforeach; ?>
</div>