<?php
class DataCustomer extends CI_Controller
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
        $data['customer'] = $this->RentalModel->get_data('customer')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataCustomer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahCustomer()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahCustomer');
        $this->load->view('templates_admin/footer');
    }

    public function tambahCustomerAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambahCustomer();
        } else {
            $nama = $this->input->POST('nama');
            $username = $this->input->POST('username');
            $alamat = $this->input->POST('alamat');
            $gender = $this->input->POST('gender');
            $no_telepon = $this->input->POST('no_telepon');
            $no_ktp = $this->input->POST('no_ktp');
            $password = md5($this->input->POST('password'));

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'alamat' => $alamat,
                'gender' => $gender,
                'no_telepon' => $no_telepon,
                'no_ktp' => $no_ktp,
                'password' => $password,
            );

            $this->RentalModel->insert_data($data, 'customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Customer Berhasil Ditambahkan!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataCustomer');
        }
    }

    public function updateCustomer($id)
    {
        $where = array('id_customer' => $id);
        $data['customer'] = $this->db->query("SELECT * FROM customer WHERE id_customer = '$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateCustomer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateCustomerAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->updateCustomer;
        } else {
            $id = $this->input->POST('id_customer');
            $nama = $this->input->POST('nama');
            $username = $this->input->POST('username');
            $alamat = $this->input->POST('alamat');
            $gender = $this->input->POST('gender');
            $no_telepon = $this->input->POST('no_telepon');
            $no_ktp = $this->input->POST('no_ktp');
            $password = md5($this->input->POST('password'));

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'alamat' => $alamat,
                'gender' => $gender,
                'no_telepon' => $no_telepon,
                'no_ktp' => $no_ktp,
                'password' => $password,
            );

            $where = array(
                'id_customer' => $id
            );

            $this->RentalModel->update_data('customer', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Customer Berhasil Di Update!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataCustomer');
        }
    }

    public function deleteCustomer($id)
    {
        $where = array('id_customer' => $id);
        $this->RentalModel->delete_data($where, 'customer');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Customer Berhasil Di Hapus!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/DataCustomer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Whats UP / Nomor HP', 'required');
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
}
