<?php
    require('../../model/room.php');
    require('../../model/kindRoom.php');
    require('../../model/imageRoom.php');
    require('../../library/Image.php');

    $id = (int)$_GET['id'];
    $room = new Room();
    $kindRoom = new KindRoom();
    $list_room = $room->show_room_whereID($id);
    $id_kindroom = $list_room['kind_of_room_id'];
    $list_kindroom = $kindRoom->show_kindRoom();
    $list_kindroom_id = $room->show_kindRoom_whereID($id_kindroom);
    if(isset($_POST['btn_submit'])) {

        $ten = $_POST['title'];
        $moTa = $_POST['moTa'];
        $gia = $_POST['gia'];

        $idKindRoom = $_POST['idKindRoom'];
        $trangThai = $_POST['trangThai'];

        // upload thumnail
        $uploadThumnail = new Image();
        $uploadPathThumnail = $uploadThumnail->upload($_FILES['thumbnail']['tmp_name'], $_FILES['thumbnail']['name']);


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

        $roomId = [
            'room_id' => $id,
        ];
        $data = [
            'name_room' => $ten,
            'image_room' => $uploadPathThumnail,
            'describe_room' => $moTa,
            'price_room' => $gia,
            'kind_of_room_id' => $idKindRoom,
            'status' => $trangThai,
        ];

        $room->update($roomId, $data);

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
        if(isset($connect)) {
            header('location:room.php');
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
    <link rel="stylesheet" href="./room.css">
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
                <a href="../kindRoom/kindRoom.php">
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
            <h1>Our Room</h1>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="">Name Room</label>
                    <input type="text" name="title" id="" required value="<?php echo $list_room['name_room']?>">
                </div>
                <div>
                    <label for="">Thumbnail</label><br>
                    <input type="file" name="thumbnail" id="" required value="<?php echo $list_room['image_room']?>">
                    <img src="<?php echo $list_room['image_room']?>" width="100px" height="100px">
                </div>
                <div>
                    <label for="">Image Room</label><br>
                    <input type="file" name="images[]" id=""><br>
                    <input type="file" name="images[]" id=""><br>
                    <input type="file" name="images[]" id="">
                </div>
                <div>
                    <label for="">Describe Room</label>
                    <textarea name="moTa" id="" cols="150" rows="5" required
                        value="<?php echo $list_room['describe_room']?>"></textarea>
                </div>
                <div>
                    <label for="">Price_Room</label>
                    <input type="text" name="gia" id="" required value="<?php echo $list_room['price_room']?>">
                </div>
                <div>
                    <label for="">Kind Of Room ID</label>
                    <select name="idKindRoom" id="" required>
                        <option selected value="<?php echo $list_kindroom_id['kind_of_room_id']?>">
                            <?php echo $list_kindroom_id['kind_of_room']?></option>
                        <?php
                            foreach ($list_kindroom as $value) {
                        ?>
                        <option value="<?php echo $value['kind_of_room_id'] ?>"><?php echo $value['kind_of_room'] ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Status_Room</label>
                    <select name="trangThai">
                        <option selected value="<?php echo $list_room['status']?>"><?php echo $list_room['status']?>
                        </option>
                        <option value="Còn trống">Còn trống</option>
                        <option value="Đã được đặt">Đã được đặt</option>
                    </select>
                </div>
                <?php
                    if (isset($_POST['btn_submit'])) {
                        echo $err;
                    }
                ?>
                <div class="submit">
                    <input class="nut" type="submit" name="btn_submit" id="" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>


</html>