<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Bank</h1>
        </div>
    </div>
    <a class="btn btn-primary mb-3" href="<?= base_url('admin/RekBank/tambahBank'); ?>"><i class="fas fa-plus-circle"></i>&nbsp;Tambah Rekening Bank</a>
    <?= $this->session->flashdata('pesan'); ?>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>Nama Pemilik Rekening Bank</th>
                <th>Nomor Rekening Bank</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($bank as $b) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b->nama_bank; ?></td>
                    <td><?= $b->nama_pemilik; ?></td>
                    <td><?= $b->nomor_bank; ?></td>
                    <td>
                        <a href="<?= base_url('admin/RekBank/updateBank/' . $b->id_bank); ?>" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                        <a onclick="return confirm('Yakin dihapus?')" href="<?= base_url('admin/RekBank/deleteBank/' . $b->id_bank); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>