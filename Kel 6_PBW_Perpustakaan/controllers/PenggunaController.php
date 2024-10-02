<?php
require_once 'config/Database.php';
require_once 'models/Pengguna.php';

class PenggunaController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function index() {
        $pengguna = new Pengguna($this->conn);
        $result = $pengguna->getPengguna();

        $data['pengguna'] = $result;
        include_once 'views/pengguna_list.php';
    }

    public function simpan($data) {
        if (empty($data['nama']) || empty($data['email']) || empty($data['no_telepon'])) {
            // Handle error
            return;
        }

        $pengguna = new Pengguna($this->conn);
        $pengguna->nama = $data['nama'];
        $pengguna->email = $data['email'];
        $pengguna->no_telepon = $data['no_telepon'];

        if ($pengguna->tambahPengguna()) {
            header('Location: index.php?controller=pengguna&action=index');
            exit();
        } else {
        }
    }

    public function update($data) {
        if (empty($data['id_pengguna'])) {
            return;
        }

        $pengguna = new Pengguna($this->conn);
        $pengguna->id_pengguna = $data['id_pengguna'];
        $pengguna->nama = $data['nama'];
        $pengguna->email = $data['email'];
        $pengguna->no_telepon = $data['no_telepon'];

        if ($pengguna->editPengguna()) {
            header('Location: index.php?controller=pengguna&action=index');
            exit();
        } else {
        }
    }

    public function delete($id_pengguna) {
        if (empty($id_pengguna)) {
            return;
        }

        $pengguna = new Pengguna($this->conn);
        $pengguna->id_pengguna = $id_pengguna;

        if ($pengguna->hapusPengguna()) {
            header('Location: index.php?controller=pengguna&action=index');
            exit();
        } else {
        }
    }
}
