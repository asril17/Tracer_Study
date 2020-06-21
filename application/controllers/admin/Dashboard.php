<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('level') == 'admin') {
            redirect('');
        }
    }

    public function index()
    {
        $data = [
            'level' => $this->session->userdata('level'),
            'title' => 'Dashboard',
            'menu' => 'Dashboard'
        ];
        $this->template->load('layout/template', 'admin/dashboard', $data);
    }
}
