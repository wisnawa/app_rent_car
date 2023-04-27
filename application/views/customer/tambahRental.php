<div class="container mt-5 mb-5" style="overflow: hidden;">
    <div class="card" style="margin-top: 130px; margin-bottom: 50px;">
        <div class="card-header">
            Form Rental Mobil
        </div>
        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
                <form method="POST" action="<?= base_url('customer/Rental/tambahRentalAksi') ?>">
                    <div class="form-group">
                        <label for="">Harga Sewa per-Hari</label>
                        <input type="hidden" name="id_mobil" value="<?= $dt->id_mobil; ?>">
                        <input type="hidden" name="harga" class="form-control" value="<?= ($dt->harga); ?>" readonly>
                        <label style="font-weight: bold; font-size: 15px;" for="">Rp.&nbsp;<?= number_format($dt->harga, 0, ',', '.'); ?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Denda Keterlambatan Pengembalian Mobil per-Hari</label>
                        <input type="hidden" name="denda" class="form-control" value="<?= ($dt->denda); ?>" readonly>
                        <label style="font-weight: bold; font-size: 15px;" for="">Rp.&nbsp;<?= number_format($dt->denda, 0, ',', '.'); ?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Rental</label>
                        <input type="date" name="tanggal_rental" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_kembali" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Rental</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>