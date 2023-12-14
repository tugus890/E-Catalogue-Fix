<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ClandingPage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_faqlp');
        // $this->load->model('sewa_model');
        $this->load->model('pagination_model');
    }

    public function index()
    {
        $data['review'] = $this->db->query("SELECT tb_review.*, tb_client.nama_lengkap 
        FROM tb_review 
        INNER JOIN tb_sewa ON tb_sewa.id_sewa = tb_review.id_sewa 
        INNER JOIN tb_client ON tb_sewa.id_client = tb_client.id_client 
        LIMIT 10
        ")->result();

        $data['faq'] = $this->M_faqlp->getFaq()->result_array();

        $data['produk'] = $this->pagination_model->get_projects('tb_produk');


        $data['judul'] = "Welcome";
        $this->load->view('templates/LandingPage/header', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/LandingPage/footer', $data);
    }
}

/* End of file CLandingPage.php */
