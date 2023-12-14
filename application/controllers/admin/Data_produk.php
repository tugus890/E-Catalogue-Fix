<?php


class Data_produk extends CI_Controller
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

        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['produk'] = $this->pagination_model->get_projects('tb_produk');
        $data['judul'] = "Data Produk";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Admin/Data_produk', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function tambah_produk_aksi()
    {
        $this->sewa_model->admin_login();
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data produk Gagal Ditambahkan
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/data_produk');
        } else {
            $id_produk        = $this->input->post('id_produk');
            $nama_produk      = $this->input->post('nama_produk');
            $harga_dp         = $this->input->post('harga_dp');
            $harga_lunas      = $this->input->post('harga_lunas');
            $deskripsi_produk = $this->input->post('deskripsi_produk');
            $foto_produk1     = $_FILES['foto_produk1']['name'];
            $foto_produk2     = $_FILES['foto_produk2']['name'];
            $foto_produk3     = $_FILES['foto_produk3']['name'];

            $data = array(
                'nama_produk'      => $nama_produk,
                'harga_dp'         => $harga_dp,
                'harga_lunas'      => $harga_lunas,
                'deskripsi_produk' => $deskripsi_produk,
            );

            // Upload foto_produk1
            if (!empty($foto_produk1)) {
                $config['upload_path']   = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
                $config['max_size']      = '2048';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto_produk1')) {
                    echo "Foto produk pertama gagal diunggah!";
                } else {
                    $foto_produk1 = $this->upload->data('file_name');
                    $data['foto_produk1'] = $foto_produk1;
                }
            }

            // Upload foto_produk2
            if (!empty($foto_produk2)) {
                $config['upload_path']   = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
                $config['max_size']      = '2048';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto_produk2')) {
                    echo "Foto produk kedua gagal diunggah!";
                } else {
                    $foto_produk2 = $this->upload->data('file_name');
                    $data['foto_produk2'] = $foto_produk2;
                }
            }

            // Upload foto_produk3
            if (!empty($foto_produk3)) {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png|JPEG';
                $config['max_size'] = '2048';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto_produk3')) {
                    echo "Foto produk ketiga gagal diunggah!";
                } else {
                    $foto_produk3 = $this->upload->data('file_name');
                    $data['foto_produk3'] = $foto_produk3;
                }
            }

            $this->sewa_model->insert_data($data, 'tb_produk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data produk Berhasil Ditambahkan
              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect('admin/data_produk');
        }
    }


    public function update_produk($id_produk)
    {
        $this->sewa_model->admin_login();
        $where = array('id_produk' => $id_produk);
        $data['produk'] = $this->db->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_produk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_produk_aksi()
    {
        $this->sewa_model->admin_login();
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data produk Gagal Ditambahkan
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('admin/data_produk');
            // $this->update_produk($this->input->post('id_produk'));
        } else {
            $id_produk        = $this->input->post('id_produk');
            $nama_produk      = $this->input->post('nama_produk');
            $harga_dp         = $this->input->post('harga_dp');
            $harga_lunas      = $this->input->post('harga_lunas');
            $deskripsi_produk = $this->input->post('deskripsi_produk');
            $foto_produk1     = $_FILES['foto_produk1']['name'];
            $foto_produk2     = $_FILES['foto_produk2']['name'];
            $foto_produk3     = $_FILES['foto_produk3']['name'];

            $config['upload_path']   = './assets/upload';
            $config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG';
            $config['max_size']      = '2048';

            $this->load->library('upload', $config);

            if (!empty($foto_produk1)) {
                if (!$this->upload->do_upload('foto_produk1')) {
                    echo "Foto produk pertama gagal diunggah!";
                } else {
                    $foto_produk1 = $this->upload->data('file_name');
                    $this->db->set('foto_produk1', $foto_produk1);
                }
            }


            if (!empty($foto_produk2)) {
                if (!$this->upload->do_upload('foto_produk2')) {
                    echo "Foto produk kedua gagal diunggah!";
                } else {
                    $foto_produk2 = $this->upload->data('file_name');
                    $this->db->set('foto_produk2', $foto_produk2);
                }
            }

            if (!empty($foto_produk3)) {
                if (!$this->upload->do_upload('foto_produk3')) {
                    echo "Foto produk ketiga gagal diunggah!";
                } else {
                    $foto_produk3 = $this->upload->data('file_name');
                    $this->db->set('foto_produk3', $foto_produk3);
                }
            }


            $data = array(

                'nama_produk'      => $nama_produk,
                'harga_dp'         => $harga_dp,
                'harga_lunas'      => $harga_lunas,
                'deskripsi_produk' => $deskripsi_produk,

            );


            if (!empty($foto_produk1)) {
                $data['foto_produk1'] = $foto_produk1;
            }

            if (!empty($foto_produk2)) {
                $data['foto_produk2'] = $foto_produk2;
            }

            if (!empty($foto_produk3)) {
                $data['foto_produk3'] = $foto_produk3;
            }

            $where = array(
                'id_produk' => $this->input->post('id_produk')
            );

            $this->sewa_model->update_data('tb_produk', $data, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data produk Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

            redirect('admin/data_produk');
        }
    }

    public function _rules()
    {


        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga_dp', 'Harga DP', 'required|numeric');
        $this->form_validation->set_rules('harga_lunas', 'Harga Lunas', 'required|numeric');
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi', 'required');
    }


    public function detail_produk($id)
    {
        $this->sewa_model->admin_login();

        $data['detail'] = $this->sewa_model->ambil_id_produk($id);
        $data['type']   = $this->sewa_model->get_data('type')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/Data_produk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete_produk($id_produk)
    {
        $this->sewa_model->admin_login();

        $where = array('id_produk' => $id_produk);
        $this->sewa_model->delete_data($where, 'tb_produk');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data produk Berhasil Dihapus
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
        redirect('admin/data_produk');
    }
}
