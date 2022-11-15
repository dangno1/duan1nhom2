<?php
    require('../../model/imageRoom.php');

    $id = (int)$_GET['id'];

    $id_ImageRoom = [
        'room_image_id' => $id,
    ];

    $idImg = new imageRoom();
    $idImg->delete($id_ImageRoom);

    if($connect) {
        header('location:img.php');
    }
?>