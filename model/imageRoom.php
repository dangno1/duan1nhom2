<?php

require('connect.php');

class imageRoom
{
    public function add($data)
    {
        $imgs = $data['image_room'];
        $idRoom = $data['room_id'];

        $sql = "INSERT INTO `roomImage` (`room_image_id`, `room_id`, `image_room`) 
        VALUES (NULL, '{$idRoom}', '{$imgs}')";

        //Call global variable
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }

    public function update($Id, $imageRoomData) 
    {
        $id = $Id['room_image_id'];

        // $idRoom = $data['room_id'];
        $imgs = $imageRoomData['image_room'];
        
        $sql = "UPDATE `roomImage` SET  `image_room` = '{$imgs}' 
        WHERE `roomImage`.`room_id` = {$id}";

        $result = $GLOBALS['connect']->query($sql);
        return $result;
        // $conn = $GLOBALS['connect'];
        // $conn->exec($sql);

        // return $conn->lastInsertId();

    }

    public function delete($id_ImageRoom)
    {
        $id = $id_ImageRoom['room_image_id'];
        $sql = "DELETE FROM `roomImage` WHERE 
        `roomImage`.`room_image_id` = {$id}";
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }
}