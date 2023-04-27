<?php
class Register extends CI_Controller
{
    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('registerForm');
            $this->load->view('templates_admin/footer');
        } else {
            $nama = $this->input->POST('nama');
            $username = $this->input->POST('username');
            $alamat = $this->input->POST('alamat');
            $gender = $this->input->POST('gender');
            $no_telepon = $this->input->POST('no_telepon');
            $no_ktp = $this->input->POST('no_ktp');
            $password = md5($this->input->POST('password'));
            $role_id = '2';

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'alamat' => $alamat,
                'gender' => $gender,
                'no_telepon' => $no_telepon,
                'no_ktp' => $no_ktp,
                'password' => $password,
                'role_id' => $role_id,
            );

            $this->RentalModel->insert_data($data, 'customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Register Silahkan Login!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth/login');
        }
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
