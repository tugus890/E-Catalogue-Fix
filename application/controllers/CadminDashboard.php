<?php


defined('BASEPATH') or exit('No direct script access allowed');

class CadminDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('sewa_model');
    }

    public function index()
    {

        //total produk
        $this->sewa_model->admin_login();
        $query = $this->db->query("SELECT COUNT(nama_produk) AS banyak_disewa FROM tb_produk ");
        $data['total_produk'] = $query->result();

        //produk populer
        $query = $this->db->query("SELECT p.nama_produk, COUNT(*) as jumlah_disewa
			FROM tb_produk p
			JOIN tb_penyewaan pw ON p.id_produk = pw.id_produk
			JOIN tb_sewa s ON pw.id_sewa = s.id_sewa
			JOIN tb_transaksi t ON s.id_sewa = t.id_sewa
			WHERE t.is_valid = 1
			GROUP BY p.nama_produk
			ORDER BY jumlah_disewa DESC
			LIMIT 1
			");
        $data['populer'] = $query->result();

        //total pendapatan hari ini
        $query = $this->db->query("SELECT format(sum(nominal),3) AS transaksi_day
			FROM tb_transaksi
			WHERE DATE(tgl_transaksi) = CURDATE() AND is_valid = 1 ");
        $data['pendapatan_hari_ini'] = $query->result();


        //table pendapatan
        $produkStats = $this->sewa_model->getProdukStats();

        $data['produkStats'] = $produkStats;


        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['judul'] = "Dashboard";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $data['judul'] = "Role";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Admin/role', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $data['judul'] = "Role";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Admin/roleAccess', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tb_user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tb_user_access_menu', $data);
        } else {
            $this->db->delete('tb_user_access_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Access Changed!</div>'
        );
    }
}

/* End of file CadminDashboard.php */
