<?php

require('connect.php');

class BookedRoom
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
<?php

require('connect.php');

class BookedRoom
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

    public function getDateBookedRoom(){
        $sql = "SELECT rb.rombooked_id , rb.user_id , rb.start_time ,rb.end_time ,rb.amount ,
        rb.total_money ,rb.status , user.name_user , kr.kind_of_room  FROM 
        (roombooked rb left join kindRoom kr on rb.kind_of_room_id = kr.kind_of_room_id) 
        left join user on rb.user_id = user.user_id";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
}
    public function getDateBookedRoom(){
        $sql = "SELECT rb.rombooked_id , rb.user_id , rb.start_time ,rb.end_time ,rb.amount ,
        rb.total_money ,rb.status , user.name_user , kr.kind_of_room  FROM 
        (roombooked rb left join kindroom kr on rb.kind_of_room_id = kr.kind_of_room_id) 
        left join user on rb.user_id = user.user_id";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
}