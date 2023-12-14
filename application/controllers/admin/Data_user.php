<?php

class Data_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		/* Load Models - Model_1 */
		$this->load->model('sewa_model');
		$this->load->model('pagination_model');
	}

	public function index()
	{

		$this->sewa_model->admin_login();


		//mengeluarkan semua data tugus
		// $data['user'] = $this->sewa_model->get_data('tb_user')->result();

		//pagination tugus :)
		$config['base_url'] = base_url('admin/data_user/index'); // Perbaiki base_url
		$config["total_rows"] = $this->pagination_model->get_count_all('tb_user');
		$config["per_page"] = 5;
		$config["uri_segment"] = 4;

		// $this->pagination->initialize($config);
		// $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		// $data["links"] = $this->pagination->create_links();


		$data['users'] = $this->pagination_model->get_projects('tb_user');

		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['judul'] = "Data User";
		$this->load->view('templates/admin/header', $data);
		$this->load->view('admin/Data_user', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambah_user()
	{
		$this->sewa_model->admin_login();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_user');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_user_aksi()
	{
		$this->sewa_model->admin_login();
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data User Berhasil Diupdate
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/data_user');
		} else {
			$nama			= $this->input->post('nama');
			$email			= $this->input->post('email');
			$role			= $this->input->post('role');
			$password		= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data = array(
				'nama'      	=> $nama,
				'email'			=> $email,
				'role'			=> $role,
				'password'		=> $password
			);

			$this->sewa_model->insert_data($data, 'tb_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data User Berhasil Ditambah
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/data_user');
		}
	}

	public function update_user($id_user)
	{
		$this->sewa_model->admin_login();
		$where = array('id_user' => $id_user);
		$data['user'] = $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id_user'")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_user', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update_user_aksi()
	{
		$this->sewa_model->admin_login();
		$this->_rules2();

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data User Berhasil Diupdate
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/data_users');
			$this->update_user($this->input->post('id_user'));
		} else {
			$id_user 		= $this->input->post('id_user');
			$nama			= $this->input->post('nama');
			$role			= $this->input->post('role');
			$password		= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data = array(
				'nama'      	=> $nama,
				'role'			=> $role,
				'password'		=> $password
			);

			$where = array(
				'id_user' => $id_user
			);

			$this->sewa_model->update_data('tb_user', $data, $where);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data User Berhasil Diupdate
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/data_user');
		}
	}

	public function delete_user($id_user)
	{
		$this->sewa_model->admin_login();
		$where = array('id_user' => $id_user);
		$this->sewa_model->delete_data($where, 'tb_user');

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data User Berhasil Dihapus
			<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('admin/data_user');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', "Nama", 'required');
		$this->form_validation->set_rules('email', "Email", 'required');
		$this->form_validation->set_rules('role', "Role", 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	}
	public function _rules2()
	{
		$this->form_validation->set_rules('nama', "Nama", 'required');
	}
}
