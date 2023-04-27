<?php
class DataType extends CI_Controller
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
        $data['type'] = $this->RentalModel->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataType', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahType()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahType');
        $this->load->view('templates_admin/footer');
    }

    public function tambahTypeAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambahType();
        } else {
            $kode_type = $this->input->post('kode_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'kode_type' => $kode_type,
                'nama_type' => $nama_type,
            );

            $this->RentalModel->insert_data($data, 'type');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Type Berhasil Ditambahkan!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataType');
        }
    }

    public function updateType($id)
    {
        $where = array('id_type' => $id);
        $data['type'] = $this->db->query("SELECT * FROM `type` WHERE id_type = '$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateType', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateTypeAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->updateType;
        } else {
            $id = $this->input->post('id_type');
            $kode_type = $this->input->post('kode_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'kode_type' => $kode_type,
                'nama_type' => $nama_type,
            );

            $where = array(
                'id_type' => $id
            );

            $this->RentalModel->update_data('type', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Type Berhasil Di update!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataType');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('nama_type', 'Nama Type', 'required');
    }

    public function deleteType($id)
    {
        $where = array('id_type' => $id);
        $this->RentalModel->delete_data($where, 'type');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Type Berhasil Di hapus!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/DataType');
    }
}
