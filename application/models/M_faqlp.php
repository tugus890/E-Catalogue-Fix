<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_faqlp extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function getFaq()
    {
        return $this->db->get('tb_faq');
    }
}

/* End of file M_faqlp.php */
