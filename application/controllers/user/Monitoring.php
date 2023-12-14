<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbutil();
        $this->load->helper('download');
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('pagination_model');
        $this->load->model('sewa_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user        = $this->session->userdata('id_user');
        $data['produk'] = $this->db->query("SELECT tb_sewa.*, tb_client.nama_lengkap FROM tb_sewa INNER JOIN tb_client ON tb_client.id_client = tb_sewa.id_client WHERE tb_sewa.id_user = '" . $id_user . "'")->result();
        $data['judul']  = "Monitoring";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Client/monitoring', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function bayar($id)
    {
        $id_user  = $this->session->userdata('id_user');
        $opsi     = $this->input->post('opsi');
        $nominal  = $this->input->post('nominal');
        $opsi     = $this->input->post('opsi');

        $data_nama = array(
            'id_sewa'            => $id,
            'id_client'          => $id_user,
            'pilihan_pembayaran' => $opsi,
            'nominal'            => $nominal,
        );

        // upload bukti pembayaran
        $config['upload_path']   = './assets/bayar';
        $config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG';
        $config['max_size']      = '2048';
        $bayar                   = $_FILES['bayar']['name'];

        $this->load->library('upload', $config);
        if (!empty($bayar)) {
            if (!$this->upload->do_upload('bayar')) {
                echo "Foto bukti pertama gagal diunggah!";
            } else {
                $bayar = $this->upload->data('file_name');
                $this->db->set('bukti_pembayaran', $bayar);
                $data['bukti_pembayaran'] = $bayar;
            }
        }
        $this->db->insert('tb_transaksi', $data_nama);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data produk Berhasil Ditambahkan
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('user/monitoring');
    }

    public function invoice($id)
    {
        $this->data['email']  = $this->session->userdata('email');

        $this->data['produk'] = $this->db->query("SELECT tb_sewa.*, tb_client.nama_lengkap, tb_client.no_telepon FROM tb_sewa INNER JOIN tb_client ON tb_client.id_client = tb_sewa.id_client WHERE tb_sewa.id_sewa = '" . $id . "'")->row();

        $this->data['penyewaan'] =  $this->db->query("SELECT tb_produk.nama_produk, tb_produk.harga_lunas  FROM tb_penyewaan INNER JOIN tb_produk ON tb_penyewaan.id_produk =  tb_produk.id_produk WHERE tb_penyewaan.id_sewa = '" . $id . "'")->result();

        $this->data['DP'] =  $this->db->query("SELECT  tb_transaksi.pilihan_pembayaran, tb_transaksi.is_valid  FROM tb_transaksi WHERE id_sewa = '" . $id . "' AND pilihan_pembayaran = 'DP'")->row();

        $this->data['LUNAS'] =  $this->db->query("SELECT  tb_transaksi.pilihan_pembayaran, tb_transaksi.is_valid  FROM tb_transaksi WHERE id_sewa = '" . $id . "' AND pilihan_pembayaran = 'LUNAS'")->row();

        $this->data['pembayaran'] =  $this->db->query("SELECT  tb_transaksi.pilihan_pembayaran, tb_transaksi.is_valid , tb_transaksi.nominal FROM tb_transaksi WHERE id_sewa = '" . $id . "'")->result();

        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // filename dari pdf ketika didownload
        $file_pdf = 'invoice';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        // $html = 'haii';
        $html = $this->load->view('Client/invoice', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function deny($id_sewa)
    {

        $is_verif            = 4;

        $data = array(
            'is_verif' => $is_verif,

        );

        $where = array(
            'id_sewa' => $id_sewa
        );

        $this->sewa_model->deny_model($data, $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Deny
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
        redirect('user/monitoring');
    }
}
