<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['subMenu'] = $this->menu->getSubMenu();

        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['judul'] = "Dashboard";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Client/index', $data);
        $this->load->view('templates/Admin/footer');
    }
}

/* End of file CdashboardClient.php */