<?php

function is_logged_in()
{
    $ci = &get_instance(); // untuk memanggil library CI (di dalam fungsi ini)
    if (!$ci->session->userdata('email')) {
        redirect('Cauth');
    } else {
        $role = $ci->session->userdata('role');
        $menu = $ci->uri->segment(1);


        // apakah sgment 1 controller itu client  
        if ($menu == 'user') {
            $menu = 'client';
        } else if ($menu == 'CadminDashboard') {
            $menu = 'admin';
        }

        $queryMenu = $ci->db->get_where('tb_user_menu', array('menu' => $menu))->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('tb_user_access_menu', [
            'role' => $role,
            'menu_id' => $menu_id
        ]);

        // var_dump($userAccess);
        // die;

        if ($userAccess->num_rows() < 1) {
            redirect('Cauth/blocked');
        }
    }
}

function check_access($role, $menu_id)
{
    $ci = &get_instance();

    $ci->db->where('role', $role);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('tb_user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked= 'checked'";
    }
}