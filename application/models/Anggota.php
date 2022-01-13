<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Model
{
    public function SemuaData()
    {
       return $this->db->get('tbl_anggota')->result_array();
    }
    public function proses_tambah_data()
    {
        $data = [
        "nama_anggota" => $this->input->post('nama_anggota'),
        "kelas" => $this->input->post('kelas'),
        "alamat" => $this->input->post('alamat'),
        "tgl_lahir" => $this->input->post('tgl_lahir'),
        "kategori_id" => $this->input->post('kategori_id'),
        ];
        $this->db->insert('tbl_anggota' , $data);
    }
    public function hapus_data($id_anggota)
    {
        $this->db->where('id_anggota' ,$id_anggota);
        $this->db->delete('tbl_anggota');
    }
    public function  ambil_id_anggota_tbl_anggota($id_anggota)
    {
        return $this->db->get_where('tbl_anggota', ['id_anggota' => $id_anggota])
        ->row_array();
    }
    public function proses_edit_data()
    {
        $data = [
            "nama_anggota" => $this->input->post('nama_anggota'),
            "kelas" => $this->input->post('kelas'),
            "alamat" => $this->input->post('alamat'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "kategori_id" => $this->input->post('kategori_id'),
        ];
        
        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        $this->db->update('tbl_anggota' , $data);
    }
}
   