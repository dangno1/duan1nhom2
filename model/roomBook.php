<?php

require('connect.php');

class BookRoom
{
    public function add($kind_of_room_id,$user_id,$start_time,$end_time,$amount,$total_money)
    {
        $sql = "INSERT INTO roombooked(kind_of_room_id, user_id, start_time, end_time,amount, total_money, status) 
                VALUES ('$kind_of_room_id','$user_id','$start_time','$end_time','$amount','$total_money','Chưa Duyệt')";
        $result = $GLOBALS['connect']->query($sql);
        if ($result) {
            echo '<div class="susbok">Đặt phòng thành công</div>';
        } else echo '<div class="susbok">Đặt phòng thành công</div>';
    }
}