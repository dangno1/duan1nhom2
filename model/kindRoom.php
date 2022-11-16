<?php

require('connect.php');

class KindRoom
{
    public function add($data)
    {
        $title = $data['kind_of_room'];

        $sql = "INSERT INTO `kindRoom` (`kind_of_room_id`, `kind_of_room`) 
        VALUES (NULL, '{$title}')";
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }
    public function update($id_kindRoom, $kind_of_room)
    {
        $id = $id_kindRoom['kind_of_room_id'];
        $name = $kind_of_room['kind_of_room'];

        $sql = "UPDATE `kindRoom` SET `kind_of_room` = '{$name}' 
        WHERE `kindRoom`.`kind_of_room_id` = {$id}";
        
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }
    public function delete($id_kindRoom)
    {
        $id = $id_kindRoom['kind_of_room_id'];
        $sql = "DELETE FROM `kindRoom` 
        WHERE `kindRoom`.`kind_of_room_id` = {$id}";
        $result = $GLOBALS['connect']->query($sql);

        return $result;
    }

    public function show_kindRoom()
    {
        $sql = "SELECT * FROM `kindRoom`";
        $result = $GLOBALS['connect']->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
}