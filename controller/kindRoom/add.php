<?php
    require('../../model/kindRoom.php');

    if(isset($_POST['btn_submit'])) {
        $title = $_POST['title'];

        if($title == "") {
            echo "Phai nhap het cac cot";
        } else {
            $data = [
                'kind_of_room' => $title,
            ];

            $kindRoom = new KindRoom();
            $kindRoom->add($data);
            if($connect) {
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
            <h1>Kind Of Room</h1>
            <hr>
            <form action=""method="POST">
                <div>
                    <label for="">Kind Of Room</label>
                    <input type="text" name="title" id="">
                </div>
                <div>
                    <input type="submit" name="btn_submit" id="" value = "ADD">
                </div>
            </form>
        </div>
    </div>
</body>
</html>