<?php

class Matkul extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['mk'] = $this->model('Matkul_model')->getAllMatkul();
        $this->view('templates/header', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['mk'] = $this->model('Matkul_model')->cariDataMatkul();
        $this->view('templates/header', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Matkul_model')->tambahDataMatkul($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mata Kuliah';
        $data['mk'] = $this->model('Matkul_model')->getMatkulById($id);
        $this->view('templates/header', $data);
        $this->view('matkul/detail', $data);
        $this->view('templates/footer');
    }

    public function getubah()
    {
        echo json_encode($this->model('Matkul_model')->getMatkulById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Matkul_model')->ubahMatkulById($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Matkul_model')->hapusDataChildMatkul($id) >= 0) {
            if ($this->model('Matkul_model')->hapusDataMatkul($id) > 0) {
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/matkul');
                exit;
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/matkul');
                exit;
            }
        }
    }

    public function all()
    {
        $data['judul'] = 'Daftar Mata Kuliah Mahasiswa';
        $data['all'] = $this->model('Matkul_model')->getAll();
        // $data['matkul'] = $this->model('Mahasiswa_model')->getStudiById($data['all']['id']);
        $this->view('templates/header', $data);
        $this->view('matkul/daftar', $data);
        $this->view('templates/footer');
    }
}
