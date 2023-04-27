<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Invoice</title>
</head>

<body>

    <h3 style="text-align: center;">Laporan Transaksi Rental Mobil</h3>
    <table>
        <tr>
            <th>Dari Tanggal</th>
            <th>:</th>
            <td><?= date('d-M-Y', strtotime($_GET['dari'])); ?></td>
        </tr>
        <tr>
            <th>Sampai Tanggal</th>
            <th>:</th>
            <td><?= date('d-M-Y', strtotime($_GET['sampai'])); ?></td>
        </tr>
    </table>
    <button class="btn btn-primary hidden-print mb-1" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
    <table class="table table-bordered table-striped mt-4">
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
    <script type="text/javascript">
        // window.print();
        function myFunction() {
            window.print();
        }
    </script>
</body>

</html>