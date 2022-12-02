<?php

require('connect.php');

class BookedRoom
{
    public function add($kind_of_room_id,$user_id,$start_time,$end_time,$amount,$total_money)
    {
        $sql = "INSERT INTO roombooked(kind_of_room_id, user_id, start_time, end_time,amount, total_money, status) VALUES ('$kind_of_room_id','$user_id','$start_time','$end_time','$amount','$total_money','Chưa Duyệt')";
        $result = $GLOBALS['connect']->query($sql);
        if ($result) {
            echo '<div class="susbok">Đơn Hàng Đã Được Thêm Vào Lịch Sử</div>';
        } else echo '<div class="susbok">Đơn Hàng Đã Được Thêm Vào Lịch Sử</div>';
    }
    public function getDataBookedRoom(){
        $sql = "SELECT rb.rombooked_id , rb.user_id , rb.kind_of_room_id , rb.start_time ,rb.end_time ,rb.amount ,
        rb.total_money ,rb.status , user.name_user , kr.kind_of_room  FROM 
        (roombooked rb left join kindRoom kr on rb.kind_of_room_id = kr.kind_of_room_id) 
        left join user on rb.user_id = user.user_id WHERE rb.status = 'chưa duyệt' ORDER BY rb.rombooked_id DESC ";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }

    public function getDataRoom($id){
        $sql = "SELECT `room`.`name_room`,`room`.`room_id` FROM `room` where room.`status` = 'Có thể sử dụng' and `kind_of_room_id` = '$id'";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }

    public function searchBookedRoom($data_search){
        $sql = "SELECT rb.rombooked_id , rb.user_id , rb.kind_of_room_id , rb.start_time ,rb.end_time ,rb.amount ,
        rb.total_money ,rb.status , user.name_user , kr.kind_of_room  FROM 
        (roombooked rb left join kindRoom kr on rb.kind_of_room_id = kr.kind_of_room_id) 
        left join user on rb.user_id = user.user_id WHERE rb.status = 'chưa duyệt' and user.name_user like '%$data_search%' ORDER BY rb.rombooked_id DESC ";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
}