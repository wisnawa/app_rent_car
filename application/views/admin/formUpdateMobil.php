<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Mobil</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <?php foreach ($mobil as $mb) : ?>
                    <form method="POST" action="<?= base_url('admin/DataMobil/updateMobilAksi'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type Mobil</label>
                                    <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil; ?>">
                                    <select name="kode_type" id="" class="form-control">
                                        <option value="<?= $mb->kode_type; ?>"><?= $mb->kode_type; ?></option>
                                        <?php foreach ($type as $tp) : ?>
                                            <option value="<?= $tp->kode_type; ?>"><?= $tp->nama_type; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kode_type', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Merk</label>
                                    <input type="text" name="merk" class="form-control" value="<?= $mb->merk; ?>">
                                    <?= form_error('merk', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control" value="<?= $mb->no_plat; ?>">
                                    <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Warna</label>
                                    <input type="text" name="warna" class="form-control" value="<?= $mb->warna; ?>">
                                    <?= form_error('warna', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">AC</label>
                                    <select name="ac" id="" class="form-control">
                                        <option <?php if ($mb->ac == '1') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->ac; ?> value="1">Tersedia
                                        </option>
                                        <option <?php if ($mb->ac == '0') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->ac; ?> value="0">Tidak Tersedia
                                        </option>
                                    </select>
                                    <?= form_error('ac', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Supir</label>
                                    <select name="supir" id="" class="form-control">
                                        <option <?php if ($mb->supir == '1') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->supir; ?> value="1">Tersedia
                                        </option>
                                        <option <?php if ($mb->supir == '0') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->supir; ?> value="0">Tidak Tersedia
                                        </option>
                                    </select>
                                    <?= form_error('supir', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">MP3 Player</label>
                                    <select name="mp3_player" id="" class="form-control">
                                        <option <?php if ($mb->mp3_player == '1') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->mp3_player; ?> value="1">Tersedia
                                        </option>
                                        <option <?php if ($mb->mp3_player == '0') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->mp3_player; ?> value="0">Tidak Tersedia
                                        </option>
                                    </select>
                                    <?= form_error('mp3_player', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Central Lock</label>
                                    <select name="central_lock" id="" class="form-control">
                                        <option <?php if ($mb->central_lock == '1') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->central_lock; ?> value="1">Tersedia
                                        </option>
                                        <option <?php if ($mb->central_lock == '0') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->central_lock; ?> value="0">Tidak Tersedia
                                        </option>
                                    </select>
                                    <?= form_error('central_lock', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control" value="<?= $mb->harga; ?>">
                                    <?= form_error('harga', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Denda</label>
                                    <input type="text" name="denda" class="form-control" value="<?= $mb->denda; ?>">
                                    <?= form_error('denda', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="<?= $mb->tahun; ?>">
                                    <?= form_error('tahun', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option <?php if ($mb->status == '1') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->status; ?> value="1">Tersedia
                                        </option>
                                        <option <?php if ($mb->status == '0') {
                                                    echo "selected = 'selected'";
                                                }
                                                echo $mb->status; ?> value="0">Tidak Tersedia
                                        </option>
                                    </select>
                                    <?= form_error('status', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                                <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>