<?php

class Model_perusahaan extends CI_model
{
    public function get_perusahaan()
    {
        return $this->db->get('tbl_perusahaan')->result();
    }

    public function insert_perusahaan()
    {
        $p = $this->input->post();
        $data = [
            'nama_perusahaan' => $p['nama_perusahaan'],
            'alamat' => $p['alamat'],
            'bidang' => $p['bidang']
        ];

        $this->db->insert('tbl_perusahaan', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update_perusahaan()
    {
        $p = $this->input->post();
        $data = [
            'nama_perusahaan' => $p['nama_perusahaan'],
            'alamat' => $p['alamat'],
            'bidang' => $p['bidang']
        ];

        $this->db->where('id_perusahaan', $p['id'],)
            ->update('tbl_perusahaan', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    // ------------- LOWONGAN ----------------- //
    public function get_lowongan()
    {
        return $this->db->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan = tbl_lowongan.id_perusahaan')
            ->get('tbl_lowongan')->result();
    }

    public function insert_lowongan()
    {
        $p = $this->input->post();
        $data = [
            'id_perusahaan' => $p['id_perusahaan'],
            'bagian' => $p['bagian'],
            'nama_narahubung' => $p['nama_hrd'],
            'no_narahubung' => $p['no_hrd'],
            'keterangan' => $p['keterangan'],
        ];

        $this->db->insert('tbl_lowongan', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update_lowongan()
    {
        $p = $this->input->post();
        $data = [
            'id_perusahaan' => $p['id_perusahaan'],
            'bagian' => $p['bagian'],
            'nama_narahubung' => $p['nama_hrd'],
            'no_narahubung' => $p['no_hrd'],
            'keterangan' => $p['keterangan'],
        ];

        $this->db->where('id_lowongan', $p['id'],)
            ->update('tbl_lowongan', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
}
