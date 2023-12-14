<?php


class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		/* Load Models - Model_1 */
		$this->load->model('sewa_model');
	}
	public function index()
	{
		$this->load->model('pagination_model');
		// $this->sewa_model->admin_login();
		$data['produk'] = $this->db->query("SELECT id_produk, nama_produk FROM tb_produk")->result();
		$data['sewa']   = $this->pagination_model->get_projects_produk('tb_sewa');
		$data['judul']  = "Pengajuan Sewa";
		$data['user']   = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/Admin/header', $data);
		$this->load->view('Admin/Data_transaksi', $data);
		$this->load->view('templates/Admin/footer');
	}

	public function detail($id_sewa)
	{
		$data['sewa'] = $this->db->query("SELECT
			tb_sewa.id_sewa,
			tb_client.nama_lengkap,
			tb_produk.nama_produk,
			tb_sewa.tgl_sewa,
			tb_sewa.tgl_selesai,
			tb_sewa.jenis_kegiatan,
			tb_sewa.is_verif,
			tb_client.no_telepon,
			tb_sewa.catatan,
			tb_sewa.jenis_kegiatan,
			tb_sewa.harga_dp,
			tb_sewa.harga_lunas,
			tb_client.nik,
			tb_sewa.dok_sk,
			tb_transaksi.id_transaksi
		  FROM 
			tb_sewa
			INNER JOIN tb_client ON tb_sewa.id_client = tb_client.id_client
			INNER JOIN tb_penyewaan ON tb_sewa.id_sewa = tb_penyewaan.id_sewa
			INNER JOIN tb_produk ON tb_penyewaan.id_produk = tb_produk.id_produk
			LEFT JOIN tb_transaksi ON tb_transaksi.id_sewa = tb_sewa.id_sewa
			WHERE tb_sewa.id_sewa = '$id_sewa';")->row();

		$data['produk'] = $this->db->query("SELECT
			tb_produk.nama_produk
		  FROM 
			tb_penyewaan
			INNER JOIN tb_produk ON tb_penyewaan.id_produk = tb_produk.id_produk
			WHERE tb_penyewaan.id_sewa = '$id_sewa';")->result();

		$data['nominal'] = $this->db->query("SELECT SUM(nominal) as nominal  FROM tb_transaksi WHERE id_sewa = '" . $id_sewa . "'")->row();
		$data['LUNAS']   = $this->db->query("SELECT * FROM tb_transaksi WHERE id_sewa = '" . $id_sewa . "' AND pilihan_pembayaran = 'LUNAS'")->row();
		$data['DP']      = $this->db->query("SELECT *  FROM tb_transaksi WHERE id_sewa = '" . $id_sewa . "' AND pilihan_pembayaran = 'DP'")->row();
		$this->sewa_model->admin_login();
		$data['judul'] = "Pengajuan Sewa";
		$this->load->view('templates/Admin/header', $data);
		$this->load->view('Admin/Detail_pengajuan_sewa', $data);
		$this->load->view('templates/Admin/footer');
	}

	public function detail_pembayaran($id_transaksi)
	{
		$data['sewa'] = $this->db->query("SELECT s.harga_dp,s.harga_lunas,s.is_verif,c.nik, c.no_telepon,s.catatan, s.id_sewa, c.nama_lengkap, p.nama_produk, s.tgl_sewa, s.tgl_selesai, s.jenis_kegiatan, t.bukti_pembayaran, t.is_valid,t.id_transaksi
			FROM tb_sewa s
			INNER JOIN tb_client c ON s.id_client = c.id_client
			INNER JOIN tb_penyewaan pw ON s.id_sewa = pw.id_sewa
			INNER JOIN tb_produk p ON pw.id_produk = p.id_produk
			LEFT JOIN tb_transaksi t ON s.id_sewa = t.id_sewa
			where t.id_transaksi = '$id_transaksi'
			order by s.id_sewa desc;")->result();
		$this->sewa_model->admin_login();
		$this->load->view('template_admin/header');
		$this->load->view('admin/Detail_pengajuan_transaksi', $data);
		$this->load->view('template_admin/footer');
	}


	public function search()
	{
		$this->sewa_model->admin_login();

		$keyword = $this->input->post('keyword'); // Ambil keyword pencarian dari form

		// Panggil method model untuk melakukan pencarian
		$data['sewa'] = $this->pagination_model->search_sewa($keyword);
		$data["links"] = '';
		// Load view dengan data hasil pencarian
		$data['judul'] = "Hasil Pencarian sewa";
		$this->load->view('template_admin/header');
		$this->load->view('admin/Data_Transaksi', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_internal($id_sewa)
	{
		$this->sewa_model->admin_login();

		$data['id_client'] = $this->db->query("SELECT id_client FROM tb_sewa WHERE id_sewa ='$id_sewa'")->row()->id_client;
		$tambah_internal = array(
			'id_sewa'            => $id_sewa,
			'id_client'          => $data['id_client'],
			'pilihan_pembayaran' => '0',
			'nominal'            => '0',
			'bukti_pembayaran'   => '0',
			'tgl_transaksi'      => date('Y-m-d H:i:s'),
			'is_valid'           => '1',
		);

		$this->db->insert('tb_transaksi', $tambah_internal);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Internal Berhasil Ditambah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');

		redirect('admin/Transaksi');
	}

	public function tambah_sewa_aksi()
	{
		// tambah sewa aksi khusus admin untuk internal
		$this->sewa_model->admin_login();
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Sewa Gagal Ditambahkan
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('admin/data_sewa');
		} else {

			// $nama_produk = $this->input->post('nama_produk');
			$id_user        = $this->session->userdata('id_user');
			$nama_lengkap   = $this->input->post('nama_lengkap');
			$tgl_sewa       = $this->input->post('tgl_sewa');
			$tgl_selesai    = $this->input->post('tgl_selesai');
			$jenis_kegiatan = $this->input->post('jenis_kegiatan');
			$id_produk      = $this->input->post('nama_produk');

			$data_nama = array(
				'nama_lengkap' => $nama_lengkap,
				'id_user'      => $id_user
			);
			$this->db->insert('tb_client', $data_nama);
			if ($this->db->affected_rows() > 0) {
				$id_client = $this->db->insert_id(); // Get the last inserted ID

				$data_sewa = array(
					'id_client'      => $id_client,
					'id_user'        => $id_user,
					'tgl_sewa'       => $tgl_sewa,
					'tgl_selesai'    => $tgl_selesai,
					'jenis_kegiatan' => $jenis_kegiatan,
					'is_verif'       => 1,
					'dok_sk'         => 'no-sk'

				);

				$this->db->insert('tb_sewa', $data_sewa);
				if ($this->db->affected_rows() > 0) {
					$id_sewa = $this->db->insert_id(); // Get the last inserted ID
				} else {
					echo 'Insert failed';
				}
			}

			$data_penyewaan = array(
				'id_produk' => $id_produk,
				'id_sewa' => $id_sewa
			);

			$this->sewa_model->insert_data_sewa($data_penyewaan);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Transaksi Berhasil Ditambah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('admin/transaksi/index');
		}
	}


	public function upload_SK()
	{
		$this->sewa_model->admin_login();

		$id_sewa = $this->input->post('id_sewa');
		$dok_sk  = $_FILES['dok_sk']['name'];

		if ($dok_sk) {
			$config['upload_path']   = './assets/sk';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 2048;           // Maximum file size in kilobytes
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('dok_sk')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $error . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url('admin/transaksi/detail/' . $id_sewa));
			}

			$dok_sk = $this->upload->data('file_name');
		}

		$data = array(
			'dok_sk' => $dok_sk
		);

		$where = array(
			'id_sewa' => $id_sewa
		);

		$this->sewa_model->update_data('tb_sewa', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Upload SK Berhasil Ditambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');

		redirect(base_url('admin/transaksi/detail/' . $id_sewa));
	}

	public function approved($id_sewa)
	{
		$this->sewa_model->admin_login();

		$is_verif			= 1;

		$data = array(
			'is_verif'      	=> $is_verif,

		);

		$where = array(
			'id_sewa' => $id_sewa
		);

		$this->sewa_model->approved_model($data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Approved
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		redirect('admin/transaksi');
	}

	public function approved_pembayaran($id_transaksi)
	{
		$this->sewa_model->admin_login();

		$is_valid			= 1;

		$data = array(
			'is_valid'      	=> $is_valid,

		);

		$where = array(
			'id_transaksi' => $id_transaksi
		);

		$this->sewa_model->approved_model_transaksi($data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Approved
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		redirect('admin/transaksi');
	}

	public function deny($id_sewa)
	{
		$this->sewa_model->admin_login();

		$is_verif			= 0;

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
		redirect('admin/transaksi');
	}

	public function deny_pembayaran($id_transaksi)
	{
		$this->sewa_model->admin_login();

		$is_valid			= 0;

		$data = array(
			'is_valid'      	=> $is_valid,

		);

		$where = array(
			'id_transaksi' => $id_transaksi
		);

		$this->sewa_model->deny_model_transaksi($data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Deny
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
		redirect('admin/transaksi');
	}


	public function pembayaran($id)
	{
		$this->sewa_model->admin_login();
		$where = array('id_rental' => $id);
		$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/konfirmasi_pembayaran', $data);
		$this->load->view('templates_admin/footer');
	}

	public function cek_pembayaran()
	{
		$this->sewa_model->admin_login();
		$id 				= $this->input->post('id_rental');
		$status_pembayaran	= $this->input->post('status_pembayaran');

		$data = array(
			'status_pembayaran'	=> $status_pembayaran
		);

		$where = array(
			'id_rental'		=> $id
		);

		$this->sewa_model->update_data('transaksi', $data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Pembayaran telah dikonfirmasi
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/transaksi');
	}


	public function download_pembayaran($bukti_pembayaran)
	{
		$this->sewa_model->admin_login();
		$this->load->helper('download');
		$file = './assets/bukti/' . $bukti_pembayaran; // Menambahkan titik (.) di awal path file
		force_download($file, NULL);
	}


	public function transaksi_selesai($id)
	{
		$this->sewa_model->admin_login();
		$where = array('id_rental' => $id);
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi_selesai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function transaksi_selesai_aksi()
	{
		$this->sewa_model->admin_login();
		$id 					= $this->input->post('id_rental');
		$tanggal_pengembalian	= $this->input->post('tanggal_pengembalian');
		$status_rental 			= $this->input->post('status_rental');
		$status_pengembalian	= $this->input->post('status_pengembalian');
		$tanggal_kembali		= $this->input->post('tanggal_kembali');
		$denda					= $this->input->post('denda');

		$x						= strtotime($tanggal_pengembalian);
		$y						= strtotime($tanggal_kembali);
		$selisih				= abs($x - $y) / (60 * 60 * 24);
		$total_denda			= $selisih * $denda;


		$data = array(
			'tanggal_pengembalian'	=> $tanggal_pengembalian,
			'status_rental'			=> $status_rental,
			'status_pengembalian'	=> $status_pengembalian,
			'total_denda'			=> $total_denda
		);

		$where = array('id_rental' => $id);



		$this->sewa_model->update_data('transaksi', $data, $where);
		if ($status_rental == 'Selesai') {
			$id_mobil = $this->input->post('id_mobil');
			$data2	= array('status'   => '1');
			$where2 = array('id_mobil'  => $id_mobil);
			$this->sewa_model->update_data('mobil', $data2, $where2);
		} else {
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi selesai
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');

		redirect('admin/transaksi');
	}

	public function batal_transaksi($id)
	{
		$this->sewa_model->admin_login();
		$where = array('id_rental' => $id);
		$data  = $this->sewa_model->get_where($where, 'transaksi')->row();

		$where2 = array('id_mobil' => $data->id_mobil);
		$data2	= array('status'   => '1');

		$this->sewa_model->update_data('mobil', $data2, $where2);
		$this->sewa_model->delete_data($where, 'transaksi');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil dibatalkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/transaksi');
	}
	public function _rules()
	{


		$this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required');
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('jenis_kegiatan', 'jenis_kegiatan', 'required');
	}
}
