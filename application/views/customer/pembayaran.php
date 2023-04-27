<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-top: 100px;">
                <div class="card-header">Invoice Pembayaran Anda</div>
                <div class="card-body">
                    <table class="table">
                        <?php foreach ($transaksi as $tr) : ?>
                            <tr>
                                <th>Merk Mobil</th>
                                <th>:</th>
                                <td><?= $tr->merk; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Rental</th>
                                <th>:</th>
                                <td><?= date('F j, Y', strtotime($tr->tanggal_rental)); ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Kembali</th>
                                <th>:</th>
                                <td><?= date('F j, Y', strtotime($tr->tanggal_kembali)); ?></td>
                            </tr>
                            <tr>
                                <th>Harga Sewa per-Hari</th>
                                <th>:</th>
                                <td>Rp.<?= number_format($tr->harga, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <?php
                                $x = strtotime($tr->tanggal_kembali);
                                $y = strtotime($tr->tanggal_rental);
                                $jmlHari = abs(($x - $y) / (60 * 60 * 24));
                                ?>
                                <th>Jumlah Hari Sewa</th>
                                <th>:</th>
                                <td><?= $jmlHari; ?>&nbsp;Hari</td>
                            </tr>
                            <tr>
                                <th>Total Denda Keterlambatan Pengembalian</th>
                                <th>:</th>
                                <td>Rp.<?= number_format($tr->total_denda, 0, ',', '.'); ?></td>
                            </tr>
                            <tr class="text-success">
                                <th>Total Pembayaran Sewa Kendaraan dan Denda</th>
                                <th>:</th>
                                <td style="font-weight: bold;">Rp.&nbsp;<?= number_format(($tr->harga * $jmlHari) + $tr->total_denda, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="<?= base_url('customer/Transaksi/cetakInvoice/' . $tr->id_rental); ?>" class="btn btn-sm btn-secondary">Print Invoice</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div><br>
        <div class="row-md-4 ml-3">
            <div class="card" style="margin-top: 10px;">
                <div class="card-header alert alert-warning">Informasi Pembayaran</div>
                <div class="card-body">
                    <div class="mb-2">
                        <?php if (empty($tr->bukti_pembayaran)) { ?>
                            <!-- Button trigger modal -->
                            <button style="width: 100%;" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-upload"></i>&nbsp;Upload Bukti Pembayaran
                            </button>
                        <?php } elseif ($tr->status_pembayaran == '0') { ?>
                            <button class="btn btn-sm btn-warning" style="width: 100%;"><i class="fa fa-clock-o"></i>&nbsp;Menunggu Konfirmasi</button>
                        <?php } elseif ($tr->status_pembayaran == '1') { ?>
                            <button class="btn btn-sm btn-success" style="width: 100%;"><i class="fa fa-check"></i>&nbsp;Pembayaran Selesai</button>
                        <?php } ?>
                    </div>
                    <p class="mb-3">Silahkan Melakukan Pembayaran Melalui Nomor Rekening di Bawah Ini:</p>
                    <?php foreach ($bank as $b) : ?>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nama Bank</th>
                                <td><?= $b->nama_bank; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik Rek. Bank</th>
                                <td><?= $b->nama_pemilik; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Rek. Bank</th>
                                <td><?= $b->nomor_bank; ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('customer/Transaksi/pembayaranAksi'); ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Upload Bukti Pembayaran</label>
                        <input type="hidden" name="id_rental" class="form-control" value="<?= $tr->id_rental; ?>">
                        <input type="file" name="bukti_pembayaran" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>