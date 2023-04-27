<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Bank</h1>
        </div>
    </section>
    <?php foreach ($bank as $b) : ?>
        <form action="<?= base_url('admin/RekBank/updateBankAksi'); ?>" method="POST">
            <div class="form-group row">
                <label for="inputBank" class="col-sm-2 col-form-label">Nama Bank</label>
                <div class="col-sm-10">
                    <input type="hidden" name="id_bank" value="<?= $b->id_bank; ?>">
                    <input name="nama_bank" type="text" class="form-control" id="inputBank" value="<?= $b->nama_bank; ?>">
                    <?= form_error('nama_bank', '<span class="text-small text-danger">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBankRek" class="col-sm-2 col-form-label">Nama Pemilik Rekening Bank</label>
                <div class="col-sm-10">
                    <input name="nama_pemilik" type="text" class="form-control" id="inputBankRek" value="<?= $b->nama_pemilik; ?>">
                    <?= form_error('nama_pemilik', '<span class="text-small text-danger">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNoRekBank" class="col-sm-2 col-form-label">Nomor Rekening Bank</label>
                <div class="col-sm-10">
                    <input name="nomor_bank" type="text" class="form-control" id="inputNoRekBank" value="<?= $b->nomor_bank; ?>">
                    <?= form_error('nomor_bank', '<span class="text-small text-danger">', '</span>'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i>&nbsp;Simpan</button>
            <a href="<?= base_url('admin/RekBank'); ?>" class="btn btn-sm btn-warning">Cancel</a>
        </form>
    <?php endforeach; ?>
</div>