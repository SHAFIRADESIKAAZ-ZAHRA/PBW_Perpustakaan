<?php
require_once 'config/Database.php';
require_once 'controllers/BukuController.php';

$database = new Database();
$db = $database->connect();

$controller = $_GET['controller'] ?? 'buku';
$action = $_GET['action'] ?? 'index'; 

$validControllers = ['buku'];
$validActions = ['index', 'simpan', 'hapus', 'update', 'create'];

if (!in_array($controller, $validControllers)) {
    $controller = 'buku';
}

$bukuController = new BukuController($db);
switch ($controller) {
    case 'buku':
        if ($action === 'simpan') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bukuController->create();
            }
        } elseif ($action === 'hapus' && isset($_GET['id_buku'])) {
            $bukuController->delete($_GET['id_buku']);
        } elseif ($action === 'update') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bukuController->update($_POST); 
            }
        } elseif ($action === 'create') {
            include 'views/buku_form.php';
        } else {
            $result = $bukuController->index(); 
            include 'views/buku_list.php'; 
        }
        break;
    default:
        echo "404 - Page not found.";
        break;
}
?>
