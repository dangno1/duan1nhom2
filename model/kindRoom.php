<?php

require('connect.php');

class KindRoom
{
    public function add($data)
    {
        $title = $data['kind_of_room'];
        $price = $data['price'];
        $describe = $data['describe'];
        $image = $data['image'];

        $sql = "INSERT INTO `kindRoom` (`kind_of_room_id`, `kind_of_room`, `price`, `describe`, `image`) 
        VALUES (NULL, '{$title}', '{$price}', '{$describe}', '{$image}')";

        $conn = $GLOBALS['connect'];
        $conn->exec($sql);

        return $conn->lastInsertId();
    }
    public function update($id_kindRoom, $kind_of_room)
    {
        $id = $id_kindRoom['kind_of_room_id'];

        $title = $kind_of_room['kind_of_room'];
        $price = $kind_of_room['price'];
        $describe = $kind_of_room['describe'];
        $image = $kind_of_room['image'];

        $sql = "UPDATE `kindRoom` SET `kind_of_room` = '{$title}', `price` = '{$price}', `describe` = '{$describe}', `image` = '{$image}' 
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