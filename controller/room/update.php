<?php
    require('../../model/room.php');
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM `kindRoom`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();

    if(isset($_POST['btn_submit'])) {
        $ten = $_POST['title'];
        $moTa = $_POST['moTa'];
        $gia = $_POST['gia'];
        $idKindRoom = $_POST['idKindRoom'];
        $trangThai = $_POST['trangThai'];
        $roomId = [
            'room_id' => $id,
        ];
        $data = [
            'kind_of_room' => $ten,
            'describe_room' => $moTa,
            'price_room' => $gia,
            'kind_of_room_id' => $idKindRoom,
            'status' => $trangThai,
        ];

        $room = new Room();
        $room->update($roomId, $data);
        if($connect) {
            header('location:room.php');
        }

    }
$sql = "SELECT * FROM `room` where room_id = '$id'";
$show = $connect->query($sql);
$show->execute();
$list_room = $show->fetch();
$kindroom = $list_room['kind_of_room_id'];

//-------------------------------------------------

$sql = "SELECT * FROM `kindRoom` where kind_of_room_id = '$kindroom'";
$show = $connect->query($sql);
$show->execute();
$list_kindroom = $show->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="./room.css">
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
                <h2 class="kind">Kind Of Romm</h2>
                <h2>Room</h2>
                <h2>User</h2>
                <h2>Roombooked</h2>
                <h2>Comment</h2>
                <h2>Statistical</h2>
            </div>
            <div class="logout">
                <a href="../../index.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
            </div>
        </div>
        <div class="content">
            <h1>Our Room</h1>
            <hr>
            <form action=""method="POST" enctype="multipart/form-data">
                <div>
                    <label for="">Name Room</label>
                    <input type="text" name="title" id="" required value="<?=$list_room['kind_of_room']?>">
                </div>
                <div>
                    <label for="">Img Room</label><br>
                    <img src="<?=$list_room['image_room']?>" width="30%" alt=""><br>
                </div>
                <div>
                    <label for="">Describe Room</label>
                    <input type="text" name="moTa" id="" required value="<?=$list_room['describe_room']?>">
                </div>
                <div>
                    <label for="">Price_Room</label>
                    <input type="text" name="gia" id="" required value="<?=$list_room['price_room']?>">
                </div>
                <div>
                    <label for="">Kind Of Room ID</label>
                    <select name="idKindRoom" id="" required>
                        <option selected value="<?=$list_kindroom['kind_of_room_id']?>"><?=$list_kindroom['kind_of_room']?></option>
                        <?php
                        foreach ($list as $value) {
                            ?>
                                <option value="<?=$value['kind_of_room_id'] ?>"><?=$value['kind_of_room'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Status_Room</label>
                    <select name="trangThai">
                        <option selected value="<?=$list_room['status']?>"><?=$list_room['status']?></option>
                        <option value="Còn trống">Còn trống</option>
                        <option value="Đã được đặt">Đã được đặt</option>
                    </select>
                </div>
                <div class="submit">
                    <input type="submit" name="btn_submit" id="" value = "Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>