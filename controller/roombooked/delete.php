<?php
    require '../../model/roomBook.php';
    if (isset($_GET['id'])) {
        $id_booked = $_GET['id'];
        $delete = new BookRoom();
        $delete->delete($id_booked);
    }