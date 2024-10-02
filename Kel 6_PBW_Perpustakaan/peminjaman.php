<?php
session_start(); 
require_once 'config/Database.php';
require_once 'controllers/PeminjamanController.php';

$db = (new Database())->connect();
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'peminjam':
        $peminjamanController = new PeminjamanController($db);
        $peminjamanList = $peminjamanController->listPeminjaman();
        include 'views/peminjam_list.php'; 
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $_POST['id_user'];
            $id_buku = $_POST['id_buku'];
            $peminjamanController = new PeminjamanController($db);
            $peminjamanController->storePeminjaman($id_user, $id_buku);
            
            $pengguna = $peminjamanController->getPenggunaById($id_user);
            $buku = $peminjamanController->getBukuById($id_buku);
            $_SESSION['message'] = "Berhasil meminjam buku '{$buku['judul']}' oleh '{$pengguna['nama']}' pada " . date('Y-m-d');
            
            header("Location: index.php?action=peminjam");
            exit();
        }
        break;

    default:
        $peminjamanController = new PeminjamanController($db);
        $penggunaList = $peminjamanController->listPeminjam();
        $bukuList = $peminjamanController->listBuku();
        include 'views/peminjaman_form.php';
        break;
}
