<?php
class Dashboard extends CI_Controller
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
        $customer = $this->db->query("SELECT * FROM customer WHERE role_id = '2'");
        $mobil = $this->db->query("SELECT * FROM mobil");
        $transaksi = $this->db->query("SELECT * FROM transaksi");
        $status_pengembalian = $this->db->query("SELECT * FROM transaksi WHERE status_pengembalian = 'Kembali'");
        $status_belum_kembali = $this->db->query("SELECT * FROM transaksi WHERE status_pengembalian = 'Belum Kembali'");
        $data['nama_customer'] = $customer->num_rows();
        $data['jml_mobil'] = $mobil->num_rows();
        $data['jml_transaksi'] = $transaksi->num_rows();
        $data['jml_kendaraan_kembali'] = $status_pengembalian->num_rows();
        $data['jml_kendaraan_belum_kembali'] = $status_belum_kembali->num_rows();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
