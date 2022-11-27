<?php

require('connect.php');

class orderDetails 
{
    public function add($data)
    {
        $idRoombooked = $data['rombooked_id'];
        $kindOfRoom = $data['kind_of_room'];
        $username = $data['username'];
        $startTime = $data['start_time'];
        $endTime = $data['end_time'];
        $amount = $data['amount'];
        $toalMoney =  $data['total_money'];
        $nameRoom = $data['name_room'];

        $sql = "INSERT INTO `orderDetails`(`rombooked_id`, `kind_of_room`, `username`, `start_time`, `end_time`, `amount`, `total_money`, `name_room`) 
        VALUES ('{$idRoombooked}','{$kindOfRoom}','{$username}','{$startTime}','{$endTime}','{$amount}','{$toalMoney}','{$nameRoom}')";

        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }
}