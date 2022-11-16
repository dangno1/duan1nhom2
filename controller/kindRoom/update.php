<?php
    require('../../model/kindRoom.php');

    if(isset($_POST['btn_submit'])) {

        $id = (int)$_GET['id'];
        $name = $_POST['title'];

        if($name == "") {
            $err = "phải nhập hết các cột";
        }
        $id_kindRoom = [
            'kind_of_room_id' => $id,
        ];
        $kind_of_room = [
            'kind_of_room' => $name,
        ];

        $kindRoom = new KindRoom();
        $kindRoom->update($id_kindRoom, $kind_of_room);

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
            <form action="" method="POST">
                <div>
                    <label class="tin" for="">Kind Of Room</label> <br>
                    <input class="the" type="text" name="title">
                    <?php
                    if (isset($_POST['btn_submit'])) {
                        echo $err;
                    }

                    ?>
                </div>
                <div>
                    <input class="nut" name= "btn_submit" type="submit" value="Updata">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
