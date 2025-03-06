<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منوی رستوران</title>
    <link rel="stylesheet" href="menu.css">
    <style>
        .order-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }

        .order-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <div class="header">
            <h1>منوی رستوران</h1>
        </div>
            <?php

            $servername = "YourServerName";
            $username = "YourUserName";
            $password = "YourPassword";
            $dbname = "YourDataBaseName";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("اتصال ناموفق: " . $conn->connect_error);
            }

            $sql = "SELECT id, name, description, price FROM menu_items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<div class='menu-section'>";
                    echo "<div class='menu-item'>";
                    echo "<h2>" . htmlspecialchars($row["name"]) . "</h2>";
                    echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                    echo "<span class='price'>قیمت: " . number_format($row["price"]) . " تومان</span>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>هیچ آیتم منویی پیدا نشد.</p>";
            }

            $conn->close();

            ?>
        <button class="order-button" onclick="window.location.href='../order/order.html'">سفارش دهید</button>
    </div>
</body>
</html>
