<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Customer</h1>
        </div>
        <a href="<?= base_url('admin/DataCustomer/tambahCustomer'); ?>" class="btn btn-primary mb-2">Tambah Customer</a>
        <?= $this->session->flashdata('pesan'); ?>
        <table class="table table-striped table-responsive table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>User Name</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>No. Telephone</th>
                <th>No. KTP</th>
                <!-- <th>Password</th> -->
                <th>Action</th>
            </tr>
            <?php $no = 1;
            foreach ($customer as $cs) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $cs->nama; ?></td>
                    <td><?= $cs->username; ?></td>
                    <td><?= $cs->alamat; ?></td>
                    <td><?= $cs->gender; ?></td>
                    <td><?= $cs->no_telepon; ?></td>
                    <td><?= $cs->no_ktp; ?></td>
                    <!-- <td><?= $cs->password; ?></td> -->
                    <td>
                        <div class="row">
                            <a class="btn btn-sm btn-primary mr-2" href="<?= base_url('admin/DataCustomer/updateCustomer/') . $cs->id_customer; ?>"><i class="fas fa-edit"></i>Edit</a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('admin/DataCustomer/deleteCustomer/') . $cs->id_customer; ?>" onclick="return confirm('Data Akan Dihapus?')"><i class="fas fa-trash"></i>Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</div>