<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_model extends CI_Model
{

    public function get_count_all($table)
    {
        return $this->db->count_all($table);
    }

    public function get_projects($table)
    {
        $query = $this->db->get($table);

        return $query->result();
    }


    public function get_count_all2($table)
    {
        return $this->db->count_all('id_sewa');
    }

    public function get_projects_produk($table)
    {
        $this->db->select('tb_sewa.id_sewa, tb_client.nama_lengkap, tb_sewa.tgl_sewa, tb_sewa.tgl_selesai, tb_sewa.harga_lunas,tb_sewa.jenis_kegiatan, tb_sewa.is_verif, tb_sewa.dok_sk, tb_transaksi.is_valid,tb_transaksi.id_transaksi, tb_transaksi.bukti_pembayaran, tb_user.role');
        $this->db->from($table);
        $this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
        $this->db->join('tb_user', 'tb_sewa.id_user = tb_user.id_user', 'inner');
        $this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa', 'inner');
        $this->db->join('tb_transaksi', 'tb_sewa.id_sewa = tb_transaksi.id_sewa', 'left');
        $this->db->group_by('id_sewa');

        $this->db->order_by('id_sewa', 'desc'); // Order by id_sewa in descending order
        $query = $this->db->get();
        return $query->result();
    }

    /* End of file Pagination.php */



    public function search_faq($keyword)
    {
        $this->db->like('pertanyaan', $keyword); // Cari berdasarkan kolom 'pertanyaan' yang mengandung keyword
        $this->db->or_like('jawaban', $keyword); // Cari berdasarkan kolom 'jawaban' yang mengandung keyword

        return $this->db->get('tb_faq')->result(); // Ambil hasil pencarian
    }

    public function search_sewa($keyword)
    {
        $this->db->select('tb_sewa.id_sewa, tb_client.nama_lengkap, tb_produk.nama_produk, tb_sewa.tgl_sewa, tb_sewa.tgl_selesai, tb_sewa.jenis_kegiatan, tb_sewa.is_verif');
        $this->db->from('tb_sewa');
        $this->db->join('tb_client', 'tb_sewa.id_client = tb_client.id_client', 'inner');
        $this->db->join('tb_penyewaan', 'tb_sewa.id_sewa = tb_penyewaan.id_sewa', 'inner');
        $this->db->join('tb_produk', 'tb_penyewaan.id_produk = tb_produk.id_produk', 'inner');

        // Kata kunci pencarian
        $keyword = 'kata_kunci';

        // Menambahkan kondisi pencarian menggunakan metode like()
        $this->db->like('tb_sewa.id_sewa', $keyword);
        $this->db->or_like('tb_client.nama_lengkap', $keyword);
        $this->db->or_like('tb_produk.nama_produk', $keyword);
        $this->db->or_like('tb_sewa.tgl_sewa', $keyword);
        $this->db->or_like('tb_sewa.tgl_selesai', $keyword);
        $this->db->or_like('tb_sewa.jenis_kegiatan', $keyword);
        $this->db->or_like('tb_sewa.is_verif', $keyword);

        $query = $this->db->get();
        $results = $query->result();

        return $results;
    }
}
