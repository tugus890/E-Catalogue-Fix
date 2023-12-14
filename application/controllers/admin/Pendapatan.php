<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendapatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->dbutil();
		$this->load->helper('download');
		$this->load->database();
		$this->load->model('pagination_model');
		$this->load->model('sewa_model');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();
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

		$data['judul'] = 'Pendapatan Sewa';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('admin/Pendapatan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function downloadLaporanBulanan()
	{

		// Mendapatkan data dari query
		$this->data['laporan'] = $this->sewa_model->getLaporanBulanan(); // Ganti "laporan_model" dengan nama model yang sesuai
		$this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        $this->load->library('pdfgenerator');

        // filename dari pdf ketika didownload
        $file_pdf = 'invoice';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
		$html = $this->load->view('admin/Cetak_pdf', $this->data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);



		
	}

	public function downloadLaporanDay()
	{


		// Mendapatkan data dari query
		$this->data['laporan'] = $this->sewa_model->getLaporanDay(); // Ganti "laporan_model" dengan nama model yang sesuai
		$this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        $this->load->library('pdfgenerator');

        // filename dari pdf ketika didownload
        $file_pdf = 'invoice';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
		$html = $this->load->view('admin/Cetak_pdf_day', $this->data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
