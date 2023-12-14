<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cauth extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {


        if ($this->session->userdata('email')) {
            redirect('user/dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Login Page';
            $this->load->view('templates/Auth/header', $data);
            $this->load->view('Auth/login', $data);
            $this->load->view('templates/Auth/footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == 1) {
                        redirect('CadminDashboard');
                    } else if ($user['role'] == 2) {
                        redirect('user/dashboard');
                    } else {
                        redirect('CpimpinanDashboard');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert"> Wrong Password!</div>'
                    );
                    redirect('Cauth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert"> This email has not been activated!</div>'
                );
                redirect('Cauth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Email is not registered!</div>'
            );
            redirect('Cauth');
        }
    }


    public function generateRandomString($length = 32)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function register()
    {


        if ($this->session->userdata('email')) {
            redirect('user/dashboard');
        }
        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Register Page';
            $this->load->view('templates/Auth/header', $data);
            $this->load->view('Auth/register', $data);
            $this->load->view('templates/Auth/footer');
        } else {
            $email = $this->input->post('email', true);
            $data =
                [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($email),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role' => '2',
                    'is_active' => 0
                ];


            // token
            $token = $this->generateRandomString();
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            // var_dump($data);
            // die;
            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Congratulations! your account has been created. Please activate your account!.</div>'
            );
            redirect('Cauth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'adistarayudha400@gmail.com',
            'smtp_pass' => 'ntizbjezjuodchif',
            'smtp_port' => '465',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('adistarayudha400@gmail.com', 'Yudha Adistara');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a 
            href="' . base_url() . 'Cauth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a 
            href="' . base_url() . 'Cauth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');

                    $this->db->delete('tb_user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please Login </div>'
                    );
                    redirect('Cauth');
                } else {

                    $this->db->delete('tb_user', ['email' => $email]);
                    $this->db->delete('tb_user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert"> Account activation failed! Token expired.!</div>'
                    );
                    redirect('Cauth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert"> Account activation failed! Wrong email.!</div>'
                );
                redirect('Cauth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Account activation failed! Wrong email.!</div>'
            );
            redirect('Cauth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> You has been logged out!</div>'
        );
        redirect('Cauth');
    }

    public function blocked()
    {
        $data['judul'] = 'Access Blocked';
        $this->load->view('Auth/blocked', $data);
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Forgot Password';
            $this->load->view('templates/Auth/header', $data);
            $this->load->view('Auth/forgotPassword', $data);
            $this->load->view('templates/Auth/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tb_user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = $this->generateRandomString();
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('tb_user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert"> Please check your email to reset your password!</div>'
                );
                redirect('Cauth/forgotPassword');
            }

            if ($user) {
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert"> Email is not registered or activated!</div>'
                );
                redirect('Cauth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert"> Reset password failed! Wrong token!.</div>'
                );
                redirect('Cauth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert"> Reset password failed! Wrong email!.</div>'
            );
            redirect('Cauth');
        }
    }

    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('Cauth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Change Password';
            $this->load->view('templates/Auth/header', $data);
            $this->load->view('Auth/changePassword', $data);
            $this->load->view('templates/Auth/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');


            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Password has been changed!.</div>'
            );
            redirect('Cauth');
        }
    }
}



/* End of file Cauth.php */