<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InfoLowongan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('level') == 'alumni') {
            redirect('');
        }
        $this->load->model('model_alumni');
    }

    public function index()
    {
        $data = [
            'level' => $this->session->userdata('level'),
            'title' => 'Dashboard',
            'menu' => 'Dashboard'
        ];
        // dd($data);
        // die;
        $this->template->load('layout/alumniDashboard', 'alumni/infoLowongan', $data);
    }
}
