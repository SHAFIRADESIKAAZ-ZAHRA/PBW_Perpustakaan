<?php
require_once 'controllers/PenggunaController.php';

$controller = $_GET['controller'] ?? 'pengguna';
$action = $_GET['action'] ?? 'index';

$validControllers = ['pengguna', 'buku', 'peminjaman'];
$validActions = ['index', 'simpan', 'hapus', 'update'];

if (!in_array($controller, $validControllers)) {
    $controller = 'pengguna';
}

if (!in_array($action, $validActions)) {
    $action = 'index';
}

switch ($controller) {
    case 'pengguna':
        $penggunaController = new PenggunaController();
        if ($action === 'simpan') {
            $penggunaController->simpan($_POST);
        } elseif ($action === 'delete' && isset($_GET['id'])) {
            $penggunaController->delete($_GET['id']);
        } elseif ($action === 'update') {
            $penggunaController->update($_POST);
        } else {
            $penggunaController->index(); 
        }
        break;
    default:

}
