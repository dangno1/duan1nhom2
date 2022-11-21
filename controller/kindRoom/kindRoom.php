<?php
    require('../../model/connect.php');
    $sql = "SELECT * FROM `kindRoom`";
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
    <title>Quan Tri Kind Of Room</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="./kindRoom.css">
</head>

<body>
    <div class="admin">
        <div class="category">
            <div class="logo">
                <a href="../quanTri.php"><img src="../../view/img/logo.png" alt=""></a>
            </div>
            <hr>
            <div class="category-1">
                <a href="../kindRoom/kindRoom.php"><h2 class="kind">Kind Of Room</h2></a>
                <a href="../room/room.php"><h2>Room</h2></a> <br>
                <a href="../roomImage/image.php"><h2>Room Image</h2></a>
                <a href="../user/user.php"><h2>User</h2></a><br>
                <h2>Roombooked</h2>
                <a href="../comment/cmt.php"><h2>Comment</h2></a>
                <h2>Statistical</h2>
            </div>
            <div class="logout">
                <a href="../../index.php">
                    <h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2>
                </a>
            </div>
        </div>
        <div class="content">
            <div>
                <h1>Kind Of Room</h1>
            </div>
            <hr>
            <div class="hangHoa">
                <button class="nut-add">
                    <a href="add.php">ADD</a>
                </button>
                <table>
                    <thead>
                        <tr>
                        <th>Kind Of Room ID</th>
                            <th>Kind Of Room</th>
                            <th>Price</th>
                            <th>Describe</th>
                            <th>Image</th>
                            <th>Delete and Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                            <tr>
                            <td><?php echo $item['kind_of_room_id'] ?></td>
                            <td><?php echo $item['kind_of_room'] ?></td>
                            <td><?php echo $item['price'] ?></td>
                            <td><?php echo $item['describe'] ?></td>
                            <td><img src="<?php echo $item['image'] ?>" width="100px" height="100px"></td>
                                <td>
                                    <a onclick="return confirm('Do you want delete?')" href="delete.php?id=<?php echo $item['kind_of_room_id'] ?>">Delete</a>
                                    <a href="update.php?id=<?php echo $item['kind_of_room_id'] ?>">Update</a>
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