<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('v_auth/login');
            $this->load->view('layouts/auth_footer');
            
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // jika ada usernya
        if($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        "email" => $user['email'],
                        "role_id" => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // cek admin atau member
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('message', 'Login');
                        redirect('admin');
                    } elseif($user['role_id'] == 3) {
                        $this->session->set_flashdata('message', 'Login');
                        redirect('writer');
                    } else {
                        $this->session->set_flashdata('message', 'Login');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password dude. Try again!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email has not been registered.</div>');
            redirect('auth');
        }

    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            "is_unique" => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => "Password doesn't matches",
            'min_length' => "Password too short"
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('v_auth/registration');
            $this->load->view('layouts/auth_footer');
        } else {
            $email = $this->input->post('email');
            $data = [
                'name' => htmlspecialchars($this->input->post('name'), true),
                'email' => htmlspecialchars($email, true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'activation');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have registered your account. Please activate yout account.</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type) {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aldiakbar373@gmail.com',
            'smtp_pass' => 'cucok1234',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('aldiakbar373@gmail.com', 'SIWIKODE GROUP');
        $this->email->to($this->input->post('email'));
        
        // cek type email
        if ($type == 'activation') {
            $this->email->subject('Activation Account');
            $this->email->message('Hey Fellas!
            You can click this link to activate your account.
            <a href="' . base_url() . 'auth/activation?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
            
        } elseif($type = 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Hey Fellas!
            You can click this link to reset your password.
            <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        

        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function activation() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user= $this->db->get_where('user', ['email' => $email])->row_array();

        if($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60*60*24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have activated your account. Please login!.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_tokem', ['email' => $email]);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You have registered your account. Please login.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Activation account failed. Wrong token!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Activation account failed. Wrong email!</div>');
            redirect('auth');
        }

    }
    
    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out.</div>');
        redirect('auth');
    }

    public function blocked() {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword() {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('v_auth/forgot-password');
            $this->load->view('layouts/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email], ['is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please check your email to reset your password.</div>');
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your email has not registered or activated.</div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user= $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed. Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed. Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword() {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('layouts/auth_header', $data);
            $this->load->view('v_auth/change-password');
            $this->load->view('layouts/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->db->delete('user_token', ['email' => $email]);
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed. Please Login.</div>');
            redirect('auth');
        }
    }

}
