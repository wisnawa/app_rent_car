<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Transaksi</h1>
        </div>
    </section>
    <form method="POST" action="<?= base_url('admin/Laporan') ?>">
        <div class="form-group">
            <label for="">Dari Tanggal</label>
            <input type="date" name="dari" class="form-control">
            <?= form_error('dari', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <div class="form-group">
            <label for="">Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control">
            <?= form_error('sampai', '<span class="text-small text-danger">', '</span>'); ?>
        </div>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>&nbsp;Tampilkan Data</button>
        <div class="btn-group">
            <a class="btn btn-sm btn-success" target="_blank" href="<?= base_url() . 'admin/Laporan/printLaporan/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai') ?>"><i class="fas fa-print"></i>&nbsp;Print</a>
        </div>
    </form>
    <hr>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Mobil</th>
                <th>Tgl. Rental</th>
                <th>Tgl. Kembali</th>
                <th>Harga per-Hari</th>
                <th>Denda per-Hari</th>
                <th>Total Denda</th>
                <th>Tgl. Dikembalikan</th>
                <th>Status Pengembalian</th>
                <th>Status Rental</th>
            </tr>
            <?php $no = 1;
            foreach ($laporan as $tr) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $tr->nama; ?></td>
                    <td><?= $tr->merk; ?></td>
                    <td><?= date('F j, Y', strtotime($tr->tanggal_rental)); ?></td>
                    <td><?= date('F j, Y', strtotime($tr->tanggal_kembali)); ?></td>
                    <td>Rp.<?= number_format($tr->harga, 0, ',', '.'); ?></td>
                    <td>Rp.<?= number_format($tr->denda, 0, ',', '.'); ?></td>
                    <td>Rp.<?= number_format($tr->total_denda, 0, ',', '.'); ?></td>
                    <td>
                        <?php if ($tr->tanggal_pengembalian == '0000-00-00') {
                            echo '-';
                        } else {
                            echo date('F j, Y', strtotime($tr->tanggal_pengembalian));
                        } ?>
                    </td>
                    <td>
                        <!-- <?php if ($tr->status == '1') {
                                    echo 'Kembali';
                                } else {
                                    echo 'Belum Kembali';
                                } ?> -->
                        <?= $tr->status_pengembalian; ?>
                    </td>
                    <td>
                        <!-- <?php if ($tr->status == '1') {
                                    echo 'Kembali';
                                } else {
                                    echo 'Belum Kembali';
                                } ?> -->
                        <?= $tr->status_rental; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>