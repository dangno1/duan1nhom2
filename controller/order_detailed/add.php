<?php
require '../../model/OrderDetailed.php';
if (isset($_POST['room_order']) && isset($_GET['rombooked_id'])){
    $room_id = $_POST['room_order'];
    $roombooked_id = $_GET['rombooked_id'];
}
$order = new orderDetailed();
$order->add($room_id,$roombooked_id,'Đang sử dụng');
$order->updateStatusRoombook($roombooked_id);
$order->updateStatusRoom($room_id,'Bảo trì');
$list_order_detailed = $order->getDataOrderDetailed();
?>
<script>
alert('thêm thành công')
window.location = "../bookedRoom/bookedroom.php";
</script>