<?php
class Transaksi extends CI_Controller
{
    public function index()
    {
        $customer = $this->session->userdata('id_customer');
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND cs.id_customer = '$customer' ORDER BY id_rental DESC")->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/transaksi', $data);
        $this->load->view('templates_customer/footer');
    }

    public function pembayaran($id)
    {
        $data['bank'] = $this->RentalModel->get_data('bank')->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND tr.id_rental = '$id' ORDER BY id_rental DESC")->result();
        $this->load->view('templates_customer/header');
        $this->load->view('customer/pembayaran', $data);
        $this->load->view('templates_customer/footer');
    }

    public function pembayaranAksi()
    {
        $id = $this->input->POST('id_rental');
        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
        if ($bukti_pembayaran) {
            $config['upload_path'] = './assets/transaksi_upload/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size'] = '2048';
            // $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti_pembayaran')) {
                $bukti_pembayaran = $this->upload->data('file_name');
                $this->db->set('bukti_pembayaran', $bukti_pembayaran);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'bukti_pembayaran' => $bukti_pembayaran
        );

        $where = array(
            'id_rental' => $id
        );

        $this->RentalModel->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pembayaran Anda Berhasil Di Upload!.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('customer/Transaksi');
    }

    public function cetakInvoice($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND tr.id_rental = '$id'")->result();
        $this->load->view('customer/cetakInvoice', $data);
    }

    public function batalTransaksi($id)
    {
        $where = array('id_rental' => $id);
        $data = $this->RentalModel->get_where($where, 'transaksi')->row();
        // merubah status mobil dari customer apabila dibatalkan oleh customer, status mobil menjadi index 1 di database
        $where2 = array('id_mobil' => $data->id_mobil);
        $data2 = array('status' => '1');
        $this->RentalModel->update_data('mobil', $data2, $where2);

        $this->RentalModel->delete_data($where, 'transaksi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi Berhasil Dibatalkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('customer/Transaksi');
    }
}
