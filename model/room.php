<?php

require('connect.php');

class Room
{
    public function add($data)
    {
        $ten = $data['kind_of_room'];
        $anh = $data['image_room'];

        $moTa = null;
        if(isset($data['describe_room'])) {
            $moTa = $data['describe_room'];
        }
        
        $gia = $data['price_room'];
        $idKindRoom = $data['kind_of_room_id'];
        $trangThai = $data['status'];

        $sql = "INSERT INTO `room` (`room_id`, `kind_of_room`, `image_room`, `describe_room`, `price_room`, `kind_of_room_id`, `status`) 
        VALUES (NULL, '{$ten}', '{$anh}', '{$moTa}', '{$gia}', '{$idKindRoom}', '{$trangThai}')";
        
        //Call global variable
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }

    public function update($roomId, $data)
    {
        $id = $roomId['room_id'];

        $ten = $data['kind_of_room'];
        $moTa = $data['describe_room'];
        $gia = $data['price_room'];
        $idKindRoom = $data['kind_of_room_id'];
        $trangThai = $data['status'];

        $sql = "UPDATE `room` SET `kind_of_room` = '{$ten}',
        `describe_room` = '{$moTa}', `price_room` = '{$gia}', `kind_of_room_id` = '{$idKindRoom}', `status` = '{$trangThai}' 
        WHERE `room`.`room_id` = {$id}";

        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }

    public function delete($roomId)
    {
        $id = $roomId['room_id'];
        $sql = "DELETE FROM `room` WHERE `room`.`room_id` = {$id}";
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }
}