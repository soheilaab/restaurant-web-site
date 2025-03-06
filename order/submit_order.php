<?php
require '../model/Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $order_details = $_POST['order_details'];

    $db = new Database();
    $pdo = $db->connect();

    $stmt = $pdo->prepare("INSERT INTO orders (name, phone, address, order_details) VALUES (:name, :phone, :address, :order_details)");
    $stmt->execute(['name' => $name, 'phone' => $phone, 'address' => $address, 'order_details' => $order_details]);

    echo "<div class='success-message'>سفارش شما با موفقیت ثبت شد!</div>";
} else {
    echo "<div class='error-message'>خطا در ثبت سفارش.</div>";
}
?>
