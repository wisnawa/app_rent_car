<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Nama Pemilik Rental: I Putu Wisnawa</h2>
                    <h2>Nomor HP / What's UP: 081999977969</h2>
                    <h4 style="color: white;">Hubungi nomor HP diatas jika ingin melakukan sewa kendaraan.</h4>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Car List Area Start ==-->
<section id="car-list-area" class="section-padding">
    <div class="container">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <!-- Car List Content Start -->
            <div class="col-lg-12">
                <div class="car-list-content">
                    <div class="row">
                        <!-- Single Car Start -->
                        <?php foreach ($mobil as $mbl) : ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <img src="<?= base_url('assets/upload/' . $mbl->gambar); ?>" style="width: 550px; height: 300px" alt="">
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#"><?php echo $mbl->merk ?></a></h2>
                                        <h5>Rp.&nbsp;<?php echo number_format($mbl->harga, 0, ',', '.') ?>/Hari</h5>
                                        <ul class="car-info-list">
                                            <li><?php
                                                if ($mbl->ac == '1') {
                                                    echo '<i class="fa fa-check-circle text-warning"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times-circle text-danger"></i>';
                                                }

                                                ?>&nbsp;AC</li>
                                            <li><?php
                                                if ($mbl->supir == '1') {
                                                    echo '<i class="fa fa-check-circle text-warning"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times-circle text-danger"></i>';
                                                }

                                                ?>&nbsp;Supir</li>
                                            <li><?php
                                                if ($mbl->mp3_player == '1') {
                                                    echo '<i class="fa fa-check-circle text-warning"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times-circle text-danger"></i>';
                                                }

                                                ?>&nbsp;MP3 Player</li>
                                            <li><?php
                                                if ($mbl->central_lock == '1') {
                                                    echo '<i class="fa fa-check-circle text-warning"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times-circle text-danger"></i>';
                                                }

                                                ?>&nbsp;Central Lock</li>
                                        </ul>
                                        <?php
                                        if ($mbl->status == "1") {
                                            echo anchor(
                                                'customer/Rental/tambahRental/' . $mbl->id_mobil,
                                                '<span class="rent-btn">Rental</span>'
                                            );
                                        } else {
                                            echo '<span class="rent-btn">Tidak Tersedia</span>';
                                        }
                                        ?>


                                        <a href="<?= base_url('customer/DataMobil/detailMobil/' . $mbl->id_mobil) ?>" class="rent-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Single Car End -->
                    </div>
                </div>
            </div>
            <!-- Car List Content End -->
        </div>
    </div>
</section>
<!--== Car List Area End ==-->