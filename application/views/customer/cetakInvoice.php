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

<body style="margin-left: 30px;">

    <table style="width: 60%; text-align: left;">
        <h2>Invoice Pembayaran Anda</h2>
        <button class="btn btn-primary hidden-print mb-1" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
        <?php foreach ($transaksi as $tr) : ?>
            <tr>
                <th>Nama Customer</th>
                <th>:</th>
                <td><?= $tr->nama; ?></td>
            </tr>
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
                <th>Status Pembayaran</th>
                <th>:</th>
                <td><?php if ($tr->status_pembayaran == '0') {
                        echo 'Belum Lunas';
                    } else {
                        echo 'Lunas';
                    }; ?>
                </td>
            </tr>
            <tr>
                <th>Total Denda Keterlambatan Pengembalian</th>
                <th>:</th>
                <td>Rp.<?= number_format($tr->total_denda, 0, ',', '.'); ?></td>
            </tr>
            <tr style="font-weight: bold; color:green">
                <th>Total Pembayaran Sewa Kendaraan</th>
                <th>:</th>
                <td style="font-weight: bold;">Rp.&nbsp;<?= number_format(($tr->harga * $jmlHari) + $tr->total_denda, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Rekening Pembayaran</th>
                <th>:</th>
                <td>
                    <ul>
                        <li>Bank Mandiri 1212121</li>
                        <li>Bank BNI 1212121</li>
                        <li>Bank BCA 1212121</li>
                    </ul>
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