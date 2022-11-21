<?php
    require('../../model/kindRoom.php');
    require('../../model/imageRoom.php');
    require('../../library/Image.php');

    $id = (int)$_GET['id'];
    // lay du lieu cu
    $sql = "SELECT * FROM `kindRoom` WHERE kind_of_room_id = {$id}";
    $result = $GLOBALS['connect']->query($sql);
    $listKindRoom = $result->fetch();

    if(isset($_POST['btn_submit'])) {

        $title = $_POST['title'];
        $price = $_POST['price'];
        $describe = $_POST['describe'];
    
        // upload thumnail
        $uploadThumnail = new Image();
        $uploadPathThumnail = $uploadThumnail->upload($_FILES['anh']['tmp_name'], $_FILES['anh']['name']);

        // upload Image
        $imageNames = [];
        foreach ($_FILES['images']['name'] as $key => $name) {
            // $uploadPathImage= $upaloadDir . $name;
            // move_uploaded_file($_FILES['images']['tmp_name'][$key], $uploadPathImage);
            if(!empty($_FILES['images']['tmp_name'][$key]) && !empty($name)) {
                $uploadImage = new Image();
                $uploadPathImage = $uploadImage->upload($_FILES['images']['tmp_name'][$key], $name);
                $imageNames[] = $uploadPathImage;
            }
        }

        if($title == "") {
            $err = "phải nhập hết các cột";
        }
        $id_kindRoom = [
            'kind_of_room_id' => $id,
        ];
        $kind_of_room = [
            'kind_of_room' => $title,
            'price' => $price,
            'describe' => $describe,
            'image' => $uploadPathThumnail,
        ];

        $kindRoom = new KindRoom();
        $kindRoom->update($id_kindRoom, $kind_of_room);

        // Img Room
        $Id = [
            'room_image_id' => $id,
        ];

        foreach($imageNames as $imagePath) {
            $imageRoomData = [
                // 'room_id' => $roomId,
                'image_room' => $imagePath,
            ];
            $imageRoom = new imageRoom();
            $imageRoom->update($Id, $imageRoomData);
        }
        // echo "<pre/>";
        // var_dump($imageNames);
        // die;

        if($connect) {
            header('location:kindRoom.php');
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
    <title>Update</title>
</head>
<body>
    <div class="admin">
        <div class="category">
            <div class="logo">
                <a href="../quanTri.php"><img src="../../view/img/logo.png" alt=""></a>
            </div>
            <hr>
            <div class="category-1">
                <a href="./kindRoom.php"><h2 class="kind">Kind Of Room</h2></a>
                <a href="../room/room.php"><h2>Room</h2></a> <br>
                <a href="../user/user.php"><h2>User</h2></a> <br>
                <h2>Roombooked</h2>
                <h2>Comment</h2>
                <h2>Statistical</h2>
            </div>
            <div class="logout">
                <a href="../../index.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
            </div>
        </div>
        <div class="content">
            <h1>Kind Of Room</h1>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label class="tin" for="">Kind Of Room</label> <br>
                    <input class="the" type="text" name="title" required value="<?php echo $listKindRoom['kind_of_room']?>">
                </div>
                <div>
                    <label class="tin" for="">Price</label>
                    <input class="the" type="text" name="price" required value="<?php echo $listKindRoom['price']?>">
                </div>
                <div>
                    <label class="tin" for="">Describe</label>
                    <input class="the" type="text" name="describe" required value="<?php echo $listKindRoom['describe']?>">
                </div>
                <div>
                    <label class="tin" for="">Image</label>
                    <input class="the" type="file" name="anh" required value="<?php echo $listKindRoom['image']?>">
                    <img src="<?php echo $listKindRoom['image']?>" width="200px" height="200px">
                </div>
                <div>
                    <label for="">Image Room</label><br>
                    <input type="file" name="images[]" id=""><br>
                    <input type="file" name="images[]" id=""><br>
                    <input type="file" name="images[]" id="">
                </div>
                <div>
                    <input class="nut" name= "btn_submit" type="submit" value="Updata">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
