<?php

class Model_alumni extends CI_model
{
    public function get_alumni()
    {
        return $this->db->get('tbl_alumni')->result();
    }

    public function insert_alumni()
    {
        $p = $this->input->post();
        $data = [
            'nim' => $p['nim'],
            'nama_alumni' => $p['nama_lengkap'],
            'alamat' => $p['alamat'],
            'no_telepon' => $p['no_telp'],
            'email' => $p['email'],
            'jenis_kelamin' => $p['jenis_kelamin'],
            'pin' => $p['pin'],
            'tahun_lulus' => $p['tahun_lulus'],
            'jurusan' => $p['jurusan'],
            'status_pekerjaan' => $p['status_pekerjaan'],
            'bagian' => $p['posisi'],
            'alamat_kantor' => $p['alamat_kantor'],
            'no_telepon_kantor' => $p['no_telp_kantor'],
        ];

        $this->db->insert('tbl_alumni', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update_alumni()
    {
        $p = $this->input->post();
        $data = [
            'nama_alumni' => $p['nama_lengkap'],
            'alamat' => $p['alamat'],
            'no_telepon' => $p['no_telp'],
            'email' => $p['email'],
            'jenis_kelamin' => $p['jenis_kelamin'],
            'pin' => $p['pin'],
            'tahun_lulus' => $p['tahun_lulus'],
            'jurusan' => $p['jurusan'],
            'status_pekerjaan' => $p['status_pekerjaan'],
            'bagian' => $p['posisi'],
            'alamat_kantor' => $p['alamat_kantor'],
            'no_telepon_kantor' => $p['no_telp_kantor'],
        ];

        $this->db->where('nim', $p['nim'],)
            ->update('tbl_alumni', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
}
