<?php
class RekBank extends CI_Controller
{
    public function index()
    {
        $data['bank'] = $this->RentalModel->get_data('bank')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataBank', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahBank()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahBank');
        $this->load->view('templates_admin/footer');
    }

    public function tambahBankAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambahBank();
        } else {
            $nama_bank = $this->input->POST('nama_bank');
            $nama_pemilik = $this->input->POST('nama_pemilik');
            $nomor_bank = $this->input->POST('nomor_bank');

            $data = array(
                'nama_bank' => $nama_bank,
                'nama_pemilik' => $nama_pemilik,
                'nomor_bank' => $nomor_bank,
            );

            $this->RentalModel->insert_data($data, 'bank');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Bank Berhasil Ditambahkan!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/RekBank');
        }
    }

    public function updateBank($id)
    {
        $where = array('id_bank' => $id);
        $data['bank'] = $this->db->query("SELECT * FROM bank WHERE id_bank = '$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateBank', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateBankAksi()
    {
        $id = $this->input->POST('id_bank');
        $nama_bank = $this->input->POST('nama_bank');
        $nama_pemilik = $this->input->POST('nama_pemilik');
        $nomor_bank = $this->input->POST('nomor_bank');

        $data = array(
            'nama_bank' => $nama_bank,
            'nama_pemilik' => $nama_pemilik,
            'nomor_bank' => $nomor_bank,
        );

        $where = array('id_bank' => $id);

        $this->RentalModel->update_data('bank', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Bank Berhasil Ditambahkan!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/RekBank');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', ['required' => 'Nama Bank Harus Di Isi!']);
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required', ['required' => 'Nama Pemilik Rek. Bank Harus Di Isi!']);
        $this->form_validation->set_rules('nomor_bank', 'Nomor Bank', 'required', ['required' => 'Nomor Rekening Bank Harus Di Isi!']);
    }

    public function deleteBank($id)
    {
        $where = array('id_bank' => $id);
        $this->RentalModel->delete_data($where, 'bank');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Bank Berhasil Dihapus!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/RekBank');
    }
}
