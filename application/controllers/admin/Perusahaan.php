<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('level') == 'admin') {
            redirect('');
        }
        $this->load->model('model_perusahaan');
    }

    public function index()
    {
        $data = [
            'level' => $this->session->userdata('level'),
            'title' => 'Perusahaan',
            'menu' => 'Master Data / Perusahaan'
        ];

        $data['list'] = $this->model_perusahaan->get_perusahaan();
        $this->template->load('layout/template', 'admin/perusahaan', $data);
    }

    public function insert()
    {
        // $p = $this->input->post();
        $insert = $this->model_perusahaan->insert_perusahaan();

        if ($insert) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-check"></i> Data Berhasil Ditambahkan</p></div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-ban"></i> Data Gagal Ditambahkan</p></div>');
        }
        redirect('perusahaan');
    }

    public function update()
    {
        $update = $this->model_perusahaan->update_perusahaan();

        if ($update) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-check"></i> Data Berhasil Diubah</p></div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-ban"></i> Data Gagal Diubah</p></div>');
        }
        redirect('perusahaan');
    }

    public function delete($id)
    {

        $query = $this->db->where('id_perusahaan', $id)
            ->delete('tbl_perusahaan');

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-check"></i> Data Berhasil Dihapus</p></div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p style="margin-bottom: 0rem !important"><i class="icon fas fa-ban"></i> Data Gagal Dihapus</p></div>');
        }

        redirect('perusahaan');
    }



    //------------------------ LOWONGAN --------------------------------//
    public function index_lowongan()
    {
        $data = [
            'level' => $this->session->userdata('level'),
            'title' => 'Lowongan',
            'menu' => 'Master Data / Lowongan'
        ];
        $data['perusahaan'] = $this->model_perusahaan->get_perusahaan();
        $data['list'] = $this->model_perusahaan->get_lowongan();
        $this->template->load('layout/template', 'admin/lowongan', $data);
    }

    public function insert_lowongan()
    {
        // $p = $this->input->post();
        $insert = $this->model_perusahaan->insert_lowongan();

        if ($insert) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-check"></i> Data Berhasil Ditambahkan</p></div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-ban"></i> Data Gagal Ditambahkan</p></div>');
        }
        redirect('lowongan');
    }

    public function update_lowongan()
    {
        $update = $this->model_perusahaan->update_lowongan();

        if ($update) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-check"></i> Data Berhasil Diubah</p></div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-ban"></i> Data Gagal Diubah</p></div>');
        }
        redirect('lowongan');
    }

    public function delete_lowongan($id)
    {

        $query = $this->db->where('id_lowongan', $id)
            ->delete('tbl_lowongan');

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="margin-bottom: 0rem !important"><i class="icon fas fa-check"></i> Data Berhasil Dihapus</p></div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p style="margin-bottom: 0rem !important"><i class="icon fas fa-ban"></i> Data Gagal Dihapus</p></div>');
        }

        redirect('lowongan');
    }
}
