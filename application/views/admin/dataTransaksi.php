<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>
        <span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
        <div class="table-responsive">
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
                    <th>Cek Pembayaran</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1;
                foreach ($transaksi as $tr) : ?>
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
                        <td>
                            <div style="text-align: center;">
                                <?php if (empty($tr->bukti_pembayaran)) { ?>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Belum Ada</button>
                                <?php } else { ?>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('admin/Transaksi/pembayaran/' . $tr->id_rental); ?>">
                                        <i class="fas fa-check-circle"></i>&nbsp;Sudah Ada</a>
                                <?php } ?>
                            </div>
                        </td>
                        <td>
                            <?php if ($tr->status == '1') { ?>
                                <!-- <span>-</span> -->
                                <a onclick="return confirm('Yakin Ubah Status?')" href="<?= base_url('admin/Transaksi/updateStatusMobil/' . $tr->id_rental); ?>" class="btn btn-sm btn-warning ml-1"><i class="fas fa-times"></i>&nbsp;Ubah Status</a>
                            <?php } else { ?>
                                <div class="row">
                                    <a href="<?= base_url('admin/Transaksi/transaksiSelesai/' . $tr->id_rental); ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i>&nbsp;Selesai Transaksi</a>
                                    <?php if ($tr->status_rental == 'Belum Selesai') { ?>
                                        <a onclick="return confirm('Yakin Dibatalkan?')" href="<?= base_url('admin/Transaksi/transaksiBatal/' . $tr->id_rental); ?>" class="btn btn-sm btn-danger ml-1"><i class="fas fa-times"></i>&nbsp;Batal Transaksi</a>
                                    <?php } else { ?>
                                        <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i>
                                            Hapus
                                        </button> -->
                                        <a onclick="return confirm('Yakin Dihapus? Data Laporan Juga akan terhapus!')" href="<?= base_url('admin/Transaksi/transaksiBatal/' . $tr->id_rental); ?>" class="btn btn-sm btn-secondary ml-1"><i class="fas fa-times"></i>&nbsp;Hapus Transaksi</a>
                                    <?php } ?>
                                </div>
                            <?php }; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Transaksi Ini Sudah Selesai, Jika diHapus Transaksi Tidak Akan Mumcul Pada Laporan!
                <?php foreach ($transaksi as $tr) : ?>
                    <a onclick="return confirm('Yakin Dibatalkan?')" href="<?= base_url('admin/Transaksi/deleteTransaksi/' . $tr->id_rental); ?>" class="btn btn-sm btn-danger ml-1"><i class="fas fa-times"></i>&nbsp;Hapus Transaksi</a>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>