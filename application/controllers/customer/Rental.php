<?php
class Rental extends CI_Controller
{
    public function tambahRental($id)
    {
        $data['detail'] = $this->RentalModel->ambil_id_mobil($id);
        $this->load->view('templates_customer/header');
        $this->load->view('customer/tambahRental', $data);
        $this->load->view('templates_customer/footer');
    }

    public function tambahRentalAksi()
    {
        $id_customer = $this->session->userdata('id_customer');
        $id_mobil = $this->input->POST('id_mobil');
        $harga = $this->input->POST('harga');
        $denda = $this->input->POST('denda');
        $tanggal_rental = $this->input->POST('tanggal_rental');
        $tanggal_kembali = $this->input->POST('tanggal_kembali');

        $data = array(
            'id_customer' => $id_customer,
            'id_mobil' => $id_mobil,
            'harga' => $harga,
            'denda' => $denda,
            'tanggal_rental' => $tanggal_rental,
            'tanggal_kembali' => $tanggal_kembali,
            'tanggal_pengembalian' => '-',
            'status_rental' => 'Belum Selesai',
            'status_pengembalian' => 'Belum Kembali',
            'total_denda' => '0',
        );

        $this->RentalModel->insert_data($data, 'transaksi');
        // code hilangkan apabila status sold out tidak di running dari customer hanya dari akses Admin saja..
        // start code
        // $status = array(
        //     'status' => '0'
        // );
        // $id = array(
        //     'id_mobil' => $id_mobil
        // );
        // $this->RentalModel->update_data('mobil', $status, $id);
        // end code

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi Berhasil, Silahkan Checkout!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('customer/DataMobil');
    }
}
