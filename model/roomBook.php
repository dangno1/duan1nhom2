<?php

require('connect.php');

class BookRoom
{
    public function add($room_id,$user_id,$start_time,$end_time,$total_money)
    {
        $sql = "INSERT INTO roombooked(room_id, user_id, start_time, end_time, total_money) 
                VALUES ('$room_id','$user_id','$start_time','$end_time','$total_money')";
        $result = $GLOBALS['connect']->query($sql);
        if ($result) {
            echo '<div class="susbok">Đặt phòng thành công</div>';
        }
    }

    public function delete($id_booked)
    {
        $sql = "DELETE FROM `roombooked` WHERE rombooled_id = '$id_booked'";
        $result = $GLOBALS['connect']->query($sql);
        if ($result) {
            header('location: roomBook.php');
        }
    }
}