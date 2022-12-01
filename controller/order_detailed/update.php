<?php
require '../../model/OrderDetailed.php';
$order = new orderDetailed();
if (isset($_GET['room_id'])){
    $room_id = $_GET['room_id'];
    $order_id = $_GET['order_id'];
    $order->updateStatusRoom($room_id, 'Có thể sử dụng');
    $order->updateStatusOrderDetailed($order_id);
    header('location: order_detailed.php');
}
