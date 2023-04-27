<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Mobil</h1>
        </div>
    </section>
    <?php foreach ($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img style="width: 300px;" src="<?= base_url() . 'assets/upload/' . $dt->gambar; ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <th>Type Mobil</th>
                                <td>
                                    <!-- <?php
                                            if ($dt->kode_type == 'SDN') {
                                                echo 'Sedan';
                                            } elseif ($dt->kode_type == 'HTB') {
                                                echo 'Harchback';
                                            } elseif ($dt->kode_type == 'MPV') {
                                                echo 'Muldi Purpose Vechile';
                                            } else {
                                                echo '<span class="text-denger">Type mobil belum terdaftar</span>';
                                            }
                                            ?> -->
                                    <?= $dt->kode_type; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td><?= $dt->merk; ?></td>
                            </tr>
                            <tr>
                                <th>No. Plat</th>
                                <td><?= $dt->no_plat; ?></td>
                            </tr>
                            <tr>
                                <th>Warna Mobil</th>
                                <td><?= $dt->warna; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td><?= $dt->tahun; ?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp.&nbsp;<?= number_format($dt->harga, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Denda</th>
                                <td>Rp.&nbsp;<?= number_format($dt->denda, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if ($dt->status == '0') {
                                        echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge badge-primary">Tersedia</span>';
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>AC</th>
                                <td>
                                    <?php if ($dt->ac == '0') {
                                        echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge badge-primary">Tersedia</span>';
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Supir</th>
                                <td>
                                    <?php if ($dt->supir == '0') {
                                        echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge badge-primary">Tersedia</span>';
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>MP3 Player</th>
                                <td>
                                    <?php if ($dt->mp3_player == '0') {
                                        echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge badge-primary">Tersedia</span>';
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Central Lock</th>
                                <td>
                                    <?php if ($dt->central_lock == '0') {
                                        echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge badge-primary">Tersedia</span>';
                                    } ?>
                                </td>
                            </tr>
                        </table>
                        <a class="btn btn-sm btn-danger ml-4" href="<?= base_url('admin/DataMobil'); ?>">Kembali</a>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/DataMobil/updateMobil/' . $dt->id_mobil); ?>">Update</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>