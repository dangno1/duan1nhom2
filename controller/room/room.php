<?php 
    require('../../model/connect.php');
    $sql = "SELECT count(*) FROM `room`";
    $show = $connect->query($sql);
    $show->execute();
   // so ban ghi trong database
    $totalPage = $show->fetchColumn();

    $limit = 10;
    $page = ceil($totalPage / $limit);

    if(isset($_GET['page'])) {
        $paging = $_GET['page'];  
    } else {
        $paging = 1;
    }
    // lay ban ghi tiep theo
    $offset = $limit * ($paging - 1);

    $sql_limit = "SELECT room.room_id,room.name_room,kindroom.kind_of_room, room.status FROM room INNER JOIN kindroom ON room.kind_of_room_id = kindroom.kind_of_room_id limit $limit offset $offset";
    $show_limit = $connect->query($sql_limit);
    $show_limit->execute();
    $list_limit = $show_limit->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="./room.css">
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
                <a href="../roomImage/image.php">
                    <h2>Room Image</h2>
                </a>
                <a href="../user/user.php">
                    <h2>User</h2>
                </a><br>
                <a href="../bookedRoom/bookedroom.php">
                    <h2>Booked Room</h2>
                </a><br>
                <a href="../comment/cmt.php">
                    <h2>Comment</h2>
                </a>
                <a href="../order_detailed/order_detailed.php">
                    <h2>Order Detailed</h2>
                </a>
                <a href="../statistical/statistical.php">
                    <h2>Statistical</h2>
                </a>
            </div>
            <div class="logout">
                <a href="../dangXuat.php">
                    <h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2>
                </a>
            </div>
        </div>
        <div class="content">
            <h1>Room</h1>
            <hr>
            <div class="hangHoa1">
                <button class="nut-add">
                    <a href="add.php">ADD Room</a>
                </button>
                <table>
                    <thead>
                        <tr>
                            <th>ID Room</th>
                            <th>Name Room</th>
                            <th>Kind Of Room ID</th>
                            <th>Status Room</th>
                            <th>Ẩn Phòng</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($list_limit as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item['room_id'] ?></td>
                            <td><?php echo $item['name_room'] ?></td>
                            <td><?php echo $item['kind_of_room'] ?></td>
                            <td><?php echo $item['status'] ?></td>
                            <td><a href="delete.php?id=<?php echo $item['room_id'] ?>"><button>Ẩn</button></a></td>
                            <td><a href="update.php?id=<?php echo $item['room_id'] ?>">Update</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <div class="page">
                    <?php
                        for($i = 1; $i <= $page; $i++) {
                    ?>
                        <ul><a href="room.php?page=<?php echo $i;?>"><?php echo $i; ?></a></ul>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>