<?php

require('connect.php');

class orderDetailed
{
    public  function add($room_id, $roombooked_id,$status)
    {
        $sql = "INSERT INTO `order_detailed`(`room_id` , `rombooked_id` , `order_status`) VALUES ('$room_id' , '$roombooked_id' , '$status')";
        $result = $GLOBALS['connect']->query($sql);
        if ($result) {
            echo '<div class="susbok">Đặt phòng thành công</div>';
        }
    }

    public function updateStatusRoombook($roombooked_id){
        $sql = "UPDATE `roombooked` SET `status` = 'Đã duyệt' WHERE rombooked_id = '$roombooked_id'";
        $GLOBALS['connect']->query($sql);
    }

    public function updateStatusRoom($room_id, $status){
        $sql = "UPDATE `room` SET `status`='$status' WHERE room_id = '$room_id'";
        $GLOBALS['connect']->query($sql);
    }

    public function getDataOrderDetailed()
    {
        $sql = "SELECT r.name_room , r.room_id , od.id_order_detailed , od.order_status , kr.kind_of_room , us.name_user, 
        rb.start_time , rb.end_time , rb.amount , rb.total_money , rb.status  FROM (((order_detailed od left JOIN 
        roombooked rb ON od.rombooked_id = rb.rombooked_id) left JOIN user us ON us.user_id = rb.user_id) left JOIN 
        kindroom kr ON kr.kind_of_room_id = rb.kind_of_room_id) left JOIN room r ON r.room_id = od.room_id where order_status = 'Đang sử dụng' ORDER BY od.id_order_detailed DESC;";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }

    public function updateStatusOrderDetailed($order_id)
    {
        $sql = "UPDATE `order_detailed` SET `order_status` = 'Đã trả phòng' WHERE id_order_detailed  = '$order_id'";
        $GLOBALS['connect']->query($sql);
    }

    public function searchOrderDetailed($data_search){
        $sql = "SELECT r.name_room , r.room_id , od.id_order_detailed , od.order_status , kr.kind_of_room , us.name_user, 
        rb.start_time , rb.end_time , rb.amount , rb.total_money , rb.status  FROM (((order_detailed od left JOIN 
        roombooked rb ON od.rombooked_id = rb.rombooked_id) left JOIN user us ON us.user_id = rb.user_id) left JOIN 
        kindroom kr ON kr.kind_of_room_id = rb.kind_of_room_id) left JOIN room r ON r.room_id = od.room_id where order_status = 'Đang sử dụng' and us.name_user like '%$data_search%' ORDER BY od.id_order_detailed DESC;";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }

}