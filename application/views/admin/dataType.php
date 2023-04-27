<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Type</h1>
        </div>
    </div>
    <a class="btn btn-primary mb-3" href="<?= base_url('admin/DataType/tambahType'); ?>">Tambah Type</a>
    <?= $this->session->flashdata('pesan'); ?>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 20px;">No</th>
                <th>Kode Type</th>
                <th>Nama Type</th>
                <th style="width: 300px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($type as $tp) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $tp->kode_type; ?></td>
                    <td><?= $tp->nama_type; ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/DataType/updateType/' . $tp->id_type); ?>"><i class="fas fa-edit"></i>Edit</a>
                        <a class="btn btn-sm btn-danger" href="<?= base_url('admin/DataType/deleteType/' . $tp->id_type); ?>"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>