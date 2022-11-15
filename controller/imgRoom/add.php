<?php
    require('../../model/imageRoom.php');

    $sql = "SELECT * FROM `room`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();

    if(isset($_POST['btn_submit'])) {

        // anh
        $upaload_dir= 'uploads/';
        $upload_path_images= $upaload_dir . $_FILES['images']['name'];
        move_uploaded_file($_FILES['images']['tmp_name'], $upload_path_images);
        $imgs = $upload_path_images;

        // die('ga');

        $idRoom = $_POST['idRoom'];

        if($imgs == "") {
            echo "Phai nhap het cac cot";
        } else {
            $data = [
                'room_id' => $idRoom,
                'image_room' => $imgs,
            ];

            $imageRoom = new imageRoom();
            $imageRoom->add($data);
            if($connect) {
                header('location:img.php');
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
    <link rel="stylesheet" href="./img.css">
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
                <h2>Room Image</h2>
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
            <h1>Room Image</h1>
            <hr>
            <form action=""method="POST" enctype="multipart/form-data">
                <div>
                    <label for="">Room ID</label>
                    <select name="idRoom" id="">
                        <?php
                        foreach ($list as $value) {
                            ?>
                                <option value="<?php echo $value['room_id'] ?>"><?php echo $value['kind_of_room'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Img Room</label>
                    <input type="file" name="images" id="">
                </div>
                <div>
                    <input type="submit" name="btn_submit" id="" value = "ADD">
                </div>
            </form>
        </div>
    </div>
</body>
</html>