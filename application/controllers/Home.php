<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Tambah ';
        $data['tbl_anggota'] = $this->Anggota->SemuaData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_data()
    {
        $data['title'] = 'Halaman Tambah ';
        $data['tbl_anggota'] = $this->Anggota->SemuaData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/tambah_data', $data);
        $this->load->view('templates/footer');
    }
    public function proses_tambah_data()
    {
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama_anggota = $this->input->post('nama_anggota', TRUE);
            $kelas = $this->input->post('kelas', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
            $kategori_id = $this->input->post('kategori_id', TRUE);

            $data = array(
                'nama_anggota' => $nama_anggota,
                'kelas' => $kelas,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'kategori_id' => $kategori_id,
                'gambar' => $gambar,

            );
            $this->db->insert('tbl_anggota', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                               Data berhasil Ditambah!
                               </div>');
            redirect('Home');
        }
    }

    public function hapus_data($id_anggota)
    {
        $this->Anggota->hapus_data($id_anggota);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil di hapus!
       </div>');
        redirect('Home');
    }
    public function edit_data($id_anggota)
    {
        $data['title'] = 'Halaman Edit ';
        $data['tbl_anggota'] = $this->Anggota->ambil_id_anggota_tbl_anggota($id_anggota);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit_data()
    {
        $id_anggota = $this->input->post('id_anggota');
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $nama_anggota = $this->input->post('nama_anggota', TRUE);
            $kelas = $this->input->post('kelas', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
            $kategori_id = $this->input->post('kategori_id', TRUE);

            $data = array(
                'nama_anggota' => $nama_anggota,
                'kelas' => $kelas,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'kategori_id' => $kategori_id,
            );
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('tbl_anggota', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                   Data berhasil Diubah!
                   </div>');
            redirect('Home');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama_anggota = $this->input->post('nama_anggota', TRUE);
            $kelas = $this->input->post('kelas', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
            $kategori_id = $this->input->post('kategori_id', TRUE);

            $data = array(
                'nama_anggota' => $nama_anggota,
                'kelas' => $kelas,
                'alamat' => $alamat,
                'tgl_lahir' => $tgl_lahir,
                'kategori_id' => $kategori_id,
                'gambar' => $gambar,

            );

            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('tbl_anggota', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                       Data berhasil Diubah!
                       </div>');
            redirect('Home');
        }
    }
}
