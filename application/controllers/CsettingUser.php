<?php


defined('BASEPATH') or exit('No direct script access allowed');

class CsettingUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['nama_role'] =  $this->db->get_where('tb_user_role', ['role'])->row_array();


        $data['judul'] = "My Profile";
        $this->load->view('templates/Admin/header', $data);
        $this->load->view('Client/profile', $data);
        $this->load->view('templates/Admin/footer');
    }

    public function profileEdit()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Edit Profile";
            $this->load->view('templates/Admin/header', $data);
            $this->load->view('Client/profileEdit', $data);
            $this->load->view('templates/Admin/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Your profile has been updated</div>'
            );
            redirect('CsettingUser/profile');
        }
    }


    public function changePassword()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nama_role'] =  $this->db->get_where('tb_user_role', ['role'])->row_array();


        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $data['judul'] = "Change Password";
            $this->load->view('templates/Admin/header', $data);
            $this->load->view('Client/changePassword', $data);
            $this->load->view('templates/Admin/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Wrong current password!</div>'
                );
                redirect('CsettingUser/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>'
                    );
                    redirect('CsettingUser/changePassword');
                } else {
                    //password fix
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Password changed!</div>'
                    );
                    redirect('CsettingUser/changePassword');
                }
            }
        }
    }
}

/* End of file CsettingUser.php */
