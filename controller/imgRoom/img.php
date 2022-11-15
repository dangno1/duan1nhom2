<?php 
    require('../../model/connect.php');
    $sql = "SELECT * FROM `roomImage`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Img</title>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="img.css">
</head>
<body>
    <div class="admin">
        <div class="category">
            <div class="logo">
                <a href="../quanTri.php"><img src="../../view/img/logo.png" alt=""></a>
            </div>
            <hr>
            <div class="category-1">
                <a href="../kindRoom.php"><h2 class="kind">Kind Of Room</h2></a>
                <a href="../room/room.php"><h2>Room</h2></a>
                <a href="./img.php"><h2>Image Room</h2></a>
                <h2>User</h2>
                <h2>Roombooked</h2>
                <a href="../comment/cmt.php"><h2>Comment</h2></a>
                <h2>Statistical</h2>
            </div>
            <div class="logout">
                <a href="../../index.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
            </div>
        </div>
        <div class="content">
            <h1>Room Image</h1>
            <hr>
            <div class="hangHoa">
                <button class="add">
                    <a href="add.php">Add</a>
                </button>
                <table>
                    <thead>
                        <tr>
                            <th>Room Image ID</th>
                            <th>Room ID</th>
                            <th>Room Image</th>
                            <th>Delete and Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($list as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item['room_image_id'] ?></td>
                            <td><?php echo $item['room_id'] ?></td>
                            <td><img src="<?php echo $item['image_room'] ?>" alt=""width="100px" height="100px"></td>
                            <td>
                                <a onclick="return confirm('Do you want delete?')" href="delete.php?id=<?php echo $item['room_image_id'] ?>">Delete</a>
                                <a href="update.php?id=<?php echo $item['room_image_id'] ?>">Update</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>