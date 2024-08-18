<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("conndb.php"); 

    if (!isset($_POST['orderDetails'])) {
        echo "No order details received.";
        exit;
    }
    $orderDetails = json_decode($_POST['orderDetails'], true);
    
    if (!$orderDetails) {
        echo "Invalid order details format.";
        exit;
    }

    try {
        $stmt = $pdo->prepare('INSERT INTO orders (room, notes, total_price) VALUES (?, ?, ?)');
        $stmt->execute([$orderDetails['room'], $orderDetails['notes'], $orderDetails['totalPrice']]);

        $orderId = $pdo->lastInsertId();
        $stmt = $pdo->prepare('INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)');
        foreach ($orderDetails['items'] as $item) {
            $stmt->execute([$orderId, $item['name'], $item['quantity'], $item['price']]);
        }

      
        echo '<style>
        body {
            background-color: #f7f2e7;
        }
    </style>';

echo '<div style="font-size: 24px; color: #6f4e37; background:#f7f2e7; text-align: center; margin-top: 20px;">
        Order confirmed!
      </div>';

    } catch (\PDOException $e) {
        echo "Order failed: " . $e->getMessage();
    }
}
?>