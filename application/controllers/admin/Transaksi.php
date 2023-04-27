<?php
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth/login');
        }
    }

    public function index()
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataTransaksi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pembayaran($id)
    {
        $where = array('id_rental' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental = '$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/konfirmasiPembayaran', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cekPembayaran()
    {
        $id = $this->input->POST('id_rental');
        $status_pembayaran = $this->input->POST('status_pembayaran');

        $data = array(
            'status_pembayaran' => $status_pembayaran
        );

        $where = array(
            'id_rental' => $id
        );

        $this->RentalModel->update_data('transaksi', $data, $where);
        redirect('admin/Transaksi');
    }

    public function downloadPembayaran($id)
    {
        $this->load->helper('download');
        $filePembayaran = $this->RentalModel->downloadPembayaran($id);
        $file = 'assets/transaksi_upload/' . $filePembayaran['bukti_pembayaran'];
        force_download($file, null);
    }

    public function transaksiSelesai($id)
    {
        $where = array('id_rental' => $id);
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental = '$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksiSelesai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function transaksiSelesaiAksi()
    {
        $id = $this->input->POST('id_rental');
        $tanggal_pengembalian = $this->input->POST('tanggal_pengembalian');
        $status_pengembalian = $this->input->POST('status_pengembalian');
        $status_rental = $this->input->POST('status_rental');
        $tanggal_kembali = $this->input->POST('tanggal_kembali');
        $denda = $this->input->POST('denda');

        $x = strtotime($tanggal_pengembalian);
        $y = strtotime($tanggal_kembali);
        $selisih = abs($x - $y) / (60 * 60 * 24);
        $total_denda = $selisih * $denda;

        $data = array(
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'status_pengembalian' => $status_pengembalian,
            'status_rental' => $status_rental,
            'total_denda' => $total_denda,
        );

        $where = array(
            'id_rental' => $id
        );

        $this->RentalModel->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi Berhasil Di Update!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/Transaksi');
    }

    public function transaksiBatal($id)
    {
        $where = array('id_rental' => $id);
        $data = $this->RentalModel->get_where($where, 'transaksi')->row();
        // merubah status mobil dari admin apabila dibatalkan oleh admin, status mobil menjadi index 1 di database
        $where2 = array('id_mobil' => $data->id_mobil);
        $data2 = array('status' => '1');
        $this->RentalModel->update_data('mobil', $data2, $where2);

        $this->RentalModel->delete_data($where, 'transaksi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi Berhasil Dibatalkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/Transaksi');
    }

    public function deleteTransaksi($id)
    {
        $where = array('id_rental' => $id);
        $this->RentalModel->delete_data($where, 'transaksi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Transaksi Berhasil Dihapus!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/Transaksi');
    }

    public function updateStatusMobil($id)
    {
        $where = array('id_rental' => $id);
        $data = $this->RentalModel->get_where($where, 'transaksi')->row();
        $where2 = array('id_mobil' => $data->id_mobil);
        $data2 = array('status' => '0');
        $this->RentalModel->update_data('mobil', $data2, $where2);
        redirect('admin/Transaksi');
    }
}
