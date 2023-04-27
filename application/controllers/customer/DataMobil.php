<?php
class DataMobil extends CI_Controller
{
    public function index()
    {
        $data['mobil'] = $this->RentalModel->get_data('mobil')->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/dataMobil', $data);
        $this->load->view('templates_customer/footer');
    }

    public function detailMobil($id)
    {
        $data['detail'] = $this->RentalModel->ambil_id_mobil($id);
        $this->load->view('templates_customer/header');
        $this->load->view('customer/detailMobil', $data);
        $this->load->view('templates_customer/footer');
    }
}
