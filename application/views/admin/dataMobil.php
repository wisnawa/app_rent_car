<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mobil</h1>
        </div>
        <a href="<?= base_url('admin/DataMobil/tambahMobil'); ?>" class="btn btn-primary mb-2">Tambah Data</a>
        <?= $this->session->flashdata('pesan'); ?>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Type</th>
                    <th>Merk</th>
                    <th>No. Plat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($mobil as $mb) : ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td>
                            <img style="width: 60px;" src="<?= base_url() . 'assets/upload/' . $mb->gambar; ?>" alt="">
                        </td>
                        <td><?= $mb->kode_type; ?></td>
                        <td><?= $mb->merk; ?></td>
                        <td><?= $mb->no_plat; ?></td>
                        <!-- <td><?php
                                    if ($mb->status == 0) {
                                        echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge badge-primary">Tersedia</span>';
                                    };
                                    ?>
                        </td> -->
                        <td><?php if ($mb->status == 0) { ?>
                                <a onclick="return confirm('Yakin Dirubah?')" href="<?= base_url('admin/DataMobil/updateStatusMobilTesedia/' . $mb->id_mobil); ?>" class="badge btn btn-sm btn-danger">Tidak Tesedia</a>
                            <?php } else { ?>
                                <a onclick="return confirm('Yakin Dirubah?')" href="<?= base_url('admin/DataMobil/updateStatusMobilTidakTesedia/' . $mb->id_mobil); ?>" class="badge btn btn-sm btn-primary">Tesedia</a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/DataMobil/detailMobil/' . $mb->id_mobil); ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i>Lihat</a>
                            <a href="<?= base_url('admin/DataMobil/updateMobil/' . $mb->id_mobil); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                            <a href="<?= base_url('admin/DataMobil/deleteMobil/' . $mb->id_mobil); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Dihapus?')"><i class="fas fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>