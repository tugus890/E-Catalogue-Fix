<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ChistoryClient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        /* Load Models - Model_1 */
        $this->load->model('sewa_model');
    }
    public function index()
    {

        $id_user = $this->session->userdata('id_user');
        // $data['info'] = $this->client_model->get_data_information('tb_sewa'); 
        $data['info'] =
            $this->db->query("  SELECT tb_sewa.id_sewa,tb_client.id_client, tb_client.nama_lengkap,tb_produk.id_produk, tb_produk.nama_produk,tb_produk.foto_produk1, 
        tb_sewa.tgl_sewa, tb_sewa.tgl_selesai, tb_sewa.jenis_kegiatan, tb_sewa.is_verif, tb_sewa.dok_sk, 
        tb_transaksi.is_valid,tb_transaksi.id_transaksi,tb_transaksi.tgl_transaksi, tb_transaksi.bukti_pembayaran,
        tb_transaksi.pilihan_pembayaran, tb_user.role, tb_produk.harga_lunas, tb_produk.harga_dp

        FROM tb_sewa 
        INNER JOIN tb_client ON tb_sewa.id_client = tb_client.id_client
        inner join tb_user on tb_sewa.id_user = tb_user.id_user
        INNER JOIN tb_penyewaan  ON tb_sewa.id_sewa = tb_penyewaan.id_sewa
        INNER JOIN tb_produk  ON tb_penyewaan.id_produk = tb_produk.id_produk
        LEFT JOIN tb_transaksi  ON tb_sewa.id_sewa = tb_transaksi.id_sewa
        where tb_user.id_user = '$id_user'  and tb_sewa.is_verif = 0 or tb_transaksi.is_valid= 0 or (tb_transaksi.is_valid=1 and tb_transaksi.pilihan_pembayaran ='LUNAS')
        order by id_sewa desc;
        ")->result();
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['judul'] = "History";
        $this->load->view('templates/admin/header_review', $data);
        $this->load->view('client/history', $data);
        $this->load->view('templates/admin/footer');
    }
    function detail_transaksi($id_transaksi)
    {
        $id_user = $this->session->userdata('id_user');
        $data['sewa'] = $this->db->query("SELECT s.harga_dp,s.harga_lunas,s.is_verif,c.nik, c.no_telepon,s.catatan, s.id_sewa, c.nama_lengkap, p.nama_produk, s.tgl_sewa, s.tgl_selesai, s.jenis_kegiatan, t.bukti_pembayaran, t.is_valid,t.id_transaksi
        FROM tb_sewa s
        INNER JOIN tb_client c ON s.id_client = c.id_client
        INNER JOIN tb_penyewaan pw ON s.id_sewa = pw.id_sewa
        INNER JOIN tb_produk p ON pw.id_produk = p.id_produk
        LEFT JOIN tb_transaksi t ON s.id_sewa = t.id_sewa
        where t.id_transaksi = '$id_transaksi'
        order by s.id_sewa desc;")->result();
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['judul'] = "History";
        $this->load->view('templates/admin/header', $data);
        $this->load->view('client/detail_pengajuan_transaksi', $data);
        $this->load->view('templates/admin/footer');
    }


    function tambah_star()
    {
        $id_sewa = $this->input->post('id_sewa');
        $review_text = $this->input->post('review');
        $rating = $this->input->post('rate');

        $review_data = array(
            'id_sewa' => $id_sewa,
            'review' => $review_text,
            'rating' => $rating
        );

        $this->sewa_model->insert_data($review_data, 'tb_review');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Review Inserted Successfully Thanks
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>');
        redirect('ChistoryClient');
    }
}

/* End of file ChistoryClient.php */
