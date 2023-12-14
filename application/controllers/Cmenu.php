<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Cmenu extends CI_Controller
{

    public function index()
    {
        $data['judul'] = "Menu Manajemen";
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/Admin/header', $data);
            $this->load->view('Admin/menu', $data);
            $this->load->view('templates/Admin/footer');
        } else {
            $this->db->insert('tb_user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> New menu added!</div>'
            );
            redirect('Cmenu');
        }
    }

    public function subMenu()
    {
        $data['judul'] = "Sub Menu Management";
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/Admin/header', $data);
            $this->load->view('Admin/subMenu', $data);
            $this->load->view('templates/Admin/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('tb_user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> New Submenu added!</div>'
            );
            redirect('Cmenu/subMenu');
        }
    }
}

/* End of file Cmenu.php */
