<?php
require '../model/Database.php';

$db = new Database();
$pdo = $db->connect();

$stmt = $pdo->query("SELECT name, phone, address, order_details, order_date FROM orders ORDER BY order_date DESC");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($orders);
?>
