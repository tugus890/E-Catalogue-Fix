<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    /* Load Models - Model_1 */
    $this->load->model('sewa_model');
    $this->load->model('pagination_model');
  }

  /* End of file Jadwal.php */

  public function index()
  {
    $this->sewa_model->admin_login();
    // $data['produk'] = $this->db->query("SELECT id_produk, nama_produk FROM tb_produk")->result();


    // $this->load->library('pagination');
    // $this->load->database();

    // $config['base_url'] = base_url('admin/transaksi/index');
    // $config['total_rows'] = $this->pagination_model->get_count_all('tb_sewa');
    // $config['per_page'] = 2;
    // $config['uri_segment'] = 4;

    // $this->pagination->initialize($config);
    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    // $data['links'] = $this->pagination->create_links();



    $data['jadwal'] = $this->db->query("SELECT t.id_transaksi, p.nama_produk, t.is_valid, c.nama_lengkap, s.tgl_sewa, s.tgl_selesai
    FROM tb_transaksi t
    JOIN tb_penyewaan pw ON t.id_sewa = pw.id_sewa
    JOIN tb_produk p ON pw.id_produk = p.id_produk
    JOIN tb_client c ON t.id_client = c.id_client
    JOIN tb_sewa s ON pw.id_sewa = s.id_sewa;")->result();


    // $data['sewa'] = $this->pagination_model->get_projects_produk('tb_sewa',$config["per_page"], $page);   
    $data['user'] = $this->db->get_where('tb_user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['judul'] = "Jadwal";
    $this->load->view('templates/admin/header', $data);
    $this->load->view('admin/Data_jadwal', $data);
    $this->load->view('templates/admin/footer');
  }
  public function delete_jadwal($id_transaksi)
  {
    $this->sewa_model->admin_login();
    $where = array('id_transaksi' => $id_transaksi);
    $this->sewa_model->delete_data($where, 'tb_transaksi');


    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Data transaksi Berhasil Dihapus
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
    redirect('admin/jadwal');
  }
}
