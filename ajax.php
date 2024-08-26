<?php
require_once("basket.php");

session_start();

// Get basket from session
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = new Basket();
}
$basket = $_SESSION['basket'];

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['type'] ?? '') {
        case 'addProduct':
            $basket->addProduct($_POST['product'] ?? '');
            break;
        case 'removeProduct':
            $basket->removeProduct($_POST['product'] ?? '');
            break;
        case 'getTotalCost':
            $data['total_cost'] = $basket->getTotalCost();
            break;
        default:
            $data['error'] = 'Invalid action type';
    }
} else {
    $data['error'] = 'Invalid request method';
}

// Store basket in session
$_SESSION['basket'] = $basket;

header('Content-Type: application/json');
echo json_encode($data);