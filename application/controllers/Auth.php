<?php
class Auth extends CI_Controller
{
    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('formLogin');
            $this->load->view('templates_admin/footer');
        } else {
            $username = $this->input->POST('username');
            $password = md5($this->input->POST('password'));

            $cek = $this->RentalModel->cek_login($username, $password);

            if ($cek == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">User Name atau Password Salah!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Auth/login');
            } else {
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);

                $this->session->set_userdata('id_customer', $cek->id_customer);

                switch ($cek->role_id) {
                    case 1:
                        redirect('admin/Dashboard');
                        break;

                    case 2:
                        redirect('customer/Dashboard');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('customer/Dashboard');
    }

    public function gantiPassword()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('gantiPassword');
        $this->load->view('templates_admin/footer');
    }

    public function gantiPasswordAksi()
    {
        $pass_baru = $this->input->POST('pass_baru');
        $ulang_pass = $this->input->POST('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('gantiPassword');
            $this->load->view('templates_admin/footer');
        } else {
            $data = array('password' => md5($pass_baru));
            $id = array('id_customer' => $this->session->userdata('id_customer'));

            $this->RentalModel->update_password($id, $data, 'customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Di Update, Silahkan Login!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth/login');
        }
    }
}
