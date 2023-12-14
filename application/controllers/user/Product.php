<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('pagination_model');
        $this->load->model('sewa_model');
    }

    public function index()
    {
        $data['user']    = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['produk']  = $this->pagination_model->get_projects('tb_produk');
        $data['judul']   = "Produk";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Client/produk', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function getJadwal($id)
    {
        $sewa = $this->db->query("SELECT tb_sewa.tgl_sewa,tb_sewa.tgl_selesai, tb_sewa.catatan, tb_sewa.jenis_kegiatan FROM tb_penyewaan INNER JOIN tb_sewa ON tb_penyewaan.id_sewa = tb_sewa.id_sewa WHERE id_produk = '" . $id . "'")->result();
        echo json_encode($sewa);
    }

    public function detail($id)
    {
        $data['user']      = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['subMenu']   = $this->menu->getSubMenu();
        $data['produk']    = $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
        $data['produkAll'] = $this->pagination_model->get_projects('tb_produk');
        $data['judul']     = "Dashboard - Product";

        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Client/detail-produk', $data);
        $this->load->view('templates/Admin/footer');
    }

    // insert sewa
    public function store()
    {
        // $nama_produk = $this->input->post('nama_produk');
        $id_user        = $this->session->userdata('id_user');
        $Nik            = $this->input->post('Nik');
        $nama           = $this->input->post('nama');
        $tlp            = $this->input->post('tlp');
        $alamat         = $this->input->post('alamat');
        $tgl_sewa       = $this->input->post('tgl_sewa');
        $tgl_selesai    = $this->input->post('tgl_selesai');
        $catatan        = $this->input->post('catatan');
        $jenis_kegiatan = $this->input->post('jenis_kegiatan');
        $produk         = $this->input->post('produk');


        $data_nama = array(
            'nama_lengkap' => $nama,
            'id_user'      => $id_user,
            'nik'          => $Nik,
            'no_telepon'   => $tlp,
            'alamat'       => $alamat
        );
        $this->db->insert('tb_client', $data_nama);

        if ($this->db->affected_rows() > 0) {
            $id_client = $this->db->insert_id(); // Get the last inserted ID

            // SUM harga_dp dan harga_lunas
            $priceDP = 0;
            $priceLunas = 0;
            foreach ($produk as $id_p) {
                $dataProduk = $this->db->get_where('tb_produk', ['id_produk' => $id_p])->row_array();
                $priceDP    = $priceDP + $dataProduk['harga_dp'];
                $priceLunas = $priceLunas + $dataProduk['harga_lunas'];
            }


            $data_sewa = array(
                'id_client'      => $id_client,
                'id_user'        => $id_user,
                'tgl_sewa'       => $tgl_sewa,
                'tgl_selesai'    => $tgl_selesai,
                'jenis_kegiatan' => $jenis_kegiatan,
                'catatan'        => $catatan,
                'is_verif'       => NULL,
                'harga_dp'       => $priceDP,
                'harga_lunas'    => $priceLunas,

            );


            $this->db->insert('tb_sewa', $data_sewa);
            if ($this->db->affected_rows() > 0) {
                $id_sewa = $this->db->insert_id(); // Get the last inserted ID
            } else {
                echo 'Insert failed';
            }
        }
        foreach ($produk as $p) {
            $data_penyewaan = array(
                'id_produk' => $p,
                'id_sewa' => $id_sewa
            );
            $this->sewa_model->insert_data_sewa($data_penyewaan);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data produk Berhasil Ditambahkan
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('user/product');
    }
}

/* End of file CdashboardClient.php */