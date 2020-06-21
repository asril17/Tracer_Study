<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        if ($email == $user['email']) {
            if ($password == $user['password']) {
                $data = [
                    'nama_lengkap' => $user['nama_lengkap'],
                    'email' => $user['email'],
                    'level' => $user['level'],
                    'login' => true
                ];
                // $this->session->set_userdata('login');
                $this->session->set_userdata($data);
                if ($data['level'] == 'admin') {
                    $this->session->set_flashdata('login', 'Selamat Datang');
                    redirect('admin');
                } elseif ($data['level'] == 'alumni') {
                    $this->session->set_flashdata('login', 'Selamat Datang');
                    redirect('alumniPage');
                } else {
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div style="max-height:10%" class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fas fa-exclamation-triangle"></i> Maaf! Password Salah</p></div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fas fa-ban"></i> Maaf! Email Tidak Terdaftar</p></div>');
            redirect('Auth');
        }
    }

    // public function registrasi()
    // {
    //     $this->load->view('template/auth_header');
    //     $this->load->view('auth/registrasi');
    //     $this->load->view('template/auth_footer');
    // }

    public function logout()
    {
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login');
        $this->session->set_flashdata('logout', 'berhasil');
        redirect('Auth');
    }
}
