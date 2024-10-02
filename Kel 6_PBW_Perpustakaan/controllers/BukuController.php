<?php
require_once 'models/Buku.php';

class BukuController {
    private $buku;

    public function __construct($db) {
        $this->buku = new Buku($db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['judul'], $_POST['penulis'], $_POST['tahun_terbit'], $_POST['status'])) {
                $data = [
                    'judul' => $_POST['judul'],
                    'penulis' => $_POST['penulis'],
                    'penerbit' => $_POST['penerbit'] ?? null, 
                    'tahun_terbit' => $_POST['tahun_terbit'],
                    'status' => $_POST['status']
                ];
    
                if ($this->buku->create($data)) {
                    echo "Buku berhasil ditambahkan.";
                    header("Location: buku.php");
                    exit();
                } else {
                    echo "Gagal menambahkan buku.";
                }
            } else {
                echo "Semua field wajib diisi.";
            }
        }
    }

    public function index() {
        return $this->buku->read();
    }

    public function delete($id_buku) {
        if ($this->buku->delete($id_buku)) {
            echo "Buku berhasil dihapus.";
            header("Location: buku.php");
            exit();
        } else {
            echo "Gagal menghapus buku.";
        }
    }
}
?>
