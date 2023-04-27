<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Bank</h1>
        </div>
    </section>
    <form action="<?= base_url('admin/RekBank/tambahBankAksi'); ?>" method="POST">
        <div class="form-group row">
            <label for="inputBank" class="col-sm-2 col-form-label">Nama Bank</label>
            <div class="col-sm-10">
                <input name="nama_bank" type="text" class="form-control" id="inputBank" placeholder="Ketik Nama Bank">
                <?= form_error('nama_bank', '<span class="text-small text-danger">', '</span>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputBankRek" class="col-sm-2 col-form-label">Nama Pemilik Rekening Bank</label>
            <div class="col-sm-10">
                <input name="nama_pemilik" type="text" class="form-control" id="inputBankRek" placeholder="Ketik Nama Pemilik Rek Bank">
                <?= form_error('nama_pemilik', '<span class="text-small text-danger">', '</span>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNoRekBank" class="col-sm-2 col-form-label">Nomor Rekening Bank</label>
            <div class="col-sm-10">
                <input name="nomor_bank" type="text" class="form-control" id="inputNoRekBank" placeholder="Ketik Nomor Rek. Bank">
                <?= form_error('nomor_bank', '<span class="text-small text-danger">', '</span>'); ?>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i>&nbsp;Simpan</button>
        <button type="reset" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i>&nbsp;Reset</button>
    </form>
</div>