<?php
require('../../model/kindRoom.php');
require('../../model/imageRoom.php');
require('../../library/Image.php');

if (isset($_POST['btn_submit'])) {

    $title = $_POST['title'];
    $price = $_POST['price'];
    $describe = $_POST['describe'];

    if ($title == "") {
        $err = "phải nhập hết các cột";
    } else {

        // upload thumnail
        $uploadThumnail = new Image();
        $uploadPathThumnail = $uploadThumnail->upload($_FILES['anh']['tmp_name'], $_FILES['anh']['name']);

        // upload Image
        $imageNames = [];
        foreach ($_FILES['images']['name'] as $key => $name) {
            if(!empty($_FILES['images']['tmp_name'][$key]) && !empty($name)) {
                $uploadImage = new Image();
                $uploadPathImage = $uploadImage->upload($_FILES['images']['tmp_name'][$key], $name);
                $imageNames[] = $uploadPathImage;
            }
        }

        $data = [
            'kind_of_room' => $title,
            'price' => $price,
            'describe' => $describe,
            'image' => $uploadPathThumnail,
        ];

        $kindRoom = new KindRoom();
        $roomId = $kindRoom->add($data);

        // Img Room
        foreach($imageNames as $imagePath) {
            $imageRoomData = [
                'kind_of_room_id' => $roomId,
                'image_room' => $imagePath,
            ];
            $imageRoom = new imageRoom();
            $imageRoom->add($imageRoomData);
        }

        if ($connect) {
            header('location:kindRoom.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="./kindRoom.css">
    <link rel="stylesheet" href="add.css">
    <title>Add</title>
</head>

<body>
    <div class="admin">
        <div class="category">
            <div class="logo">
                <a href="../quanTri.php"><img src="../../view/img/logo.png" alt=""></a>
            </div>
            <hr>
            <div class="category-1">
                <a href="./kindRoom.php">
                    <h2 class="kind">Kind Of Room</h2>
                </a>
                <a href="../room/room.php">
                    <h2>Room</h2>
                </a> <br>
                <a href="../user/user.php">
                    <h2>User</h2>
                </a> <br>
                <h2>Roombooked</h2>
                <h2>Comment</h2>
                <h2>Statistical</h2>
            </div>
            <div class="logout">
                <a href="../../index.php">
                    <h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2>
                </a>
            </div>
        </div>
        <div class="content">
            <h1>Kind Of Room</h1>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label class="tin" for="">Kind Of Room</label> 
                    <input class="the" type="text" name="title" id="">
                </div>
                <div>
                    <label class="tin" for="">Price</label>
                    <input class="the" type="text" name="price" id="">
                </div>
                <div>
                    <label class="tin" for="">Describe</label><br>
                    <textarea name="moTa" id="" cols="192" rows="7" placeholder="Describe Room"></textarea>
                </div>
                <div>
                    <label class="tin" for="">Thumbnail</label>
                    <input class="the" type="file" name="anh" id="">
                </div>
                <!-- nhieu anh  -->
                <div>
                    <label class="tin" for="">Image Room</label><br>
                    <input class="the" type="file" name="images[]" id=""><br>
                    <input class="the" type="file" name="images[]" id=""><br>
                    <input class="the" type="file" name="images[]" id="">
                </div>
                <!--  -->
                    <input class="nut" type="submit" name="btn_submit" id="" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</body>

</html>