<?php
require_once 'config/Database.php';
require_once 'controllers/PeminjamanController.php';

$db = (new Database())->connect(); 
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'peminjam':
        $peminjamanController = new PeminjamanController($db);
        $penggunaList = $peminjamanController->listPeminjam();
        include 'views/peminjam_list.php';
        break;

    default:
        include 'views/peminjaman_form.php';
        break;
}
?>
