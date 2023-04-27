<div class="container mt-5 mb-5" style="overflow: hidden;">
    <div class="card" style="margin-top: 130px;">
        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
                <div class="row">
                    <div class="col-md-6">
                        <img style="width: 50%;" src="<?= base_url('assets/upload/' . $dt->gambar); ?>" alt="">
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Merk</th>
                                <td><?= $dt->merk; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Plat</th>
                                <td><?= $dt->no_plat; ?></td>
                            </tr>
                            <tr>
                                <th>Warna Mobil</th>
                                <td><?= $dt->warna; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Produksi Mobil</th>
                                <td><?= $dt->tahun; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php if ($dt->status == '1') {
                                        echo 'Tersedia';
                                    } else {
                                        echo 'Tidak Tersedia / Sedang dirental';
                                    }; ?></td>
                            <tr>
                                <td></td>
                                <td>
                                    <?php if ($dt->status == '0') {
                                        echo '<span class="btn btn-danger" disable>Sold Out</span>';
                                    } else {
                                        echo anchor('customer/Rental/tambahRental/' . $dt->id_mobil, '<button class="btn btn-success">Rental</button>');
                                    } ?>
                                </td>
                            </tr>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>