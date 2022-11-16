<?php

require('connect.php');

class BookRoom
{
    public function bookRoom($room_id,$user_id,$start_time,$end_time,$total_money)
    {
        $sql = "INSERT INTO roombooked(room_id, user_id, start_time, end_time, total_money) 
                VALUES ('$room_id','$user_id','$start_time','$end_time','$total_money')";
        $result = $GLOBALS['connect']->query($sql);
        if ($result) {
            echo '<div class="susbok">Đặt phòng thành công</div>';
        }
    }
}