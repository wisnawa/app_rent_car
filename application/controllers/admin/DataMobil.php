<?php
class DataMobil extends CI_Controller
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
        $data['mobil'] = $this->RentalModel->get_data('mobil')->result();
        $data['type'] = $this->RentalModel->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataMobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahMobil()
    {
        $data['type'] = $this->RentalModel->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahMobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahMobilAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambahMobil();
        } else {
            $kode_type = $this->input->post('kode_type');
            $merk = $this->input->post('merk');
            $no_plat = $this->input->post('no_plat');
            $warna = $this->input->post('warna');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');
            $harga = $this->input->post('harga');
            $denda = $this->input->post('denda');
            $ac = $this->input->post('ac');
            $supir = $this->input->post('supir');
            $mp3_player = $this->input->post('mp3_player');
            $central_lock = $this->input->post('central_lock');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './assets/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo 'Gambar Mobil Gagal Diupload';
                } else {
                    unlink(FCPATH . '/assets/upload/');
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'kode_type' => $kode_type,
                'merk' => $merk,
                'no_plat' => $no_plat,
                'warna' => $warna,
                'tahun' => $tahun,
                'status' => $status,
                'harga' => $harga,
                'denda' => $denda,
                'ac' => $ac,
                'supir' => $supir,
                'mp3_player' => $mp3_player,
                'central_lock' => $central_lock,
                'gambar' => $gambar,
            );

            $this->RentalModel->insert_data($data, 'mobil');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mobil Berhasil Ditambahkan!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataMobil');
        }
    }

    public function updateMobil($id)
    {
        $where = array('id_mobil' => $id);
        $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.kode_type = tp.kode_type AND mb.id_mobil = '$id'")->result();
        $data['type'] = $this->RentalModel->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateMobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateMobilAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->updateMobil;
        } else {
            $id = $this->input->POST('id_mobil');
            $kode_type = $this->input->POST('kode_type');
            $merk = $this->input->POST('merk');
            $no_plat = $this->input->POST('no_plat');
            $warna = $this->input->POST('warna');
            $tahun = $this->input->POST('tahun');
            $status = $this->input->POST('status');
            $harga = $this->input->post('harga');
            $denda = $this->input->post('denda');
            $ac = $this->input->post('ac');
            $supir = $this->input->post('supir');
            $mp3_player = $this->input->post('mp3_player');
            $central_lock = $this->input->post('central_lock');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path'] = './assets/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2048';
                // $config['overwrite'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'kode_type' => $kode_type,
                'merk' => $merk,
                'no_plat' => $no_plat,
                'warna' => $warna,
                'tahun' => $tahun,
                'status' => $status,
                'harga' => $harga,
                'denda' => $denda,
                'ac' => $ac,
                'supir' => $supir,
                'mp3_player' => $mp3_player,
                'central_lock' => $central_lock,
            );

            $where = array(
                'id_mobil' => $id
            );

            $this->RentalModel->update_data('mobil', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mobil Berhasil Diupdate!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataMobil');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('no_plat', 'Plat Nomor', 'required');
        $this->form_validation->set_rules('warna', 'Warna Mobil', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('harga', 'Harga Sewa Mobil', 'required');
        $this->form_validation->set_rules('denda', 'Denda Sewa Mobil', 'required');
        $this->form_validation->set_rules('ac', 'Fasilitas AC', 'required');
        $this->form_validation->set_rules('supir', 'Fasilitas Supir', 'required');
        $this->form_validation->set_rules('mp3_player', 'Fasilitas MP3 Player', 'required');
        $this->form_validation->set_rules('central_lock', 'Fasilitas Central Lock', 'required');
    }

    public function detailMobil($id)
    {
        $data['detail'] = $this->RentalModel->ambil_id_mobil($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detailMobil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function deleteMobil($id)
    {
        $where = array('id_mobil' => $id);
        $this->RentalModel->delete_data($where, 'mobil');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mobil Berhasil Dihapus!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/DataMobil');
    }

    public function updateStatusMobilTidakTesedia($id)
    {
        $where = array('id_mobil' => $id);
        $data = array('status' => '0');
        $this->RentalModel->update_data('mobil', $data, $where);
        redirect('admin/DataMobil');
    }
    public function updateStatusMobilTesedia($id)
    {
        $where = array('id_mobil' => $id);
        $data = array('status' => '1');
        $this->RentalModel->update_data('mobil', $data, $where);
        redirect('admin/DataMobil');
    }
}
