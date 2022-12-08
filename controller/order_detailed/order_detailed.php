<?php
require '../../model/OrderDetailed.php';
$order = new orderDetailed();

if (isset($_POST['search_detailed'])){
    $data_search = $_POST['search_detailed'];
    $data_search == '' ? $list_order_detailed = $order->getDataOrderDetailed() : $list_order_detailed = $order->searchOrderDetailed($data_search);
} else {
    $list_order_detailed = $order->getDataOrderDetailed();
}
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("Y-m-d");
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
    <link rel="stylesheet" href="./order_detailed.css">
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
            <div>
                <h1>Order Detailed</h1>
            </div>
            <hr>
            <div class="hangHoa">
                <form action="" method="post" enctype="multipart/form-data" class="search">
                    <input type="text" name="search_detailed" placeholder="phone number...">
                    <input type="submit" value="Tìm kiếm">
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Kind of room</th>
                            <th>Room</th>
                            <th>User name</th>
                            <th>Number phone</th>
                            <th>start time</th>
                            <th>End time</th>
                            <th>Amount</th>
                            <th>Total money</th>
                            <th>Trả phòng</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                foreach ($list_order_detailed as $item) {
                ?>
                        <tr>
                            <td><?=$item['id_order_detailed']?></td>
                            <td><?=$item['kind_of_room']?></td>
                            <td><?=$item['name_room']?></td>
                            <td><?=$item['name_user']?></td>
                            <td><?=$item['phone_number_user']?></td>
                            <td><?=$item['start_time']?></td>
                            <td><?=$item['end_time']?></td>
                            <td><?=$item['amount']?> người</td>
                            <td><?=$item['total_money']?> VND</td>
                            <td>
                                <?php
                                if ($date >= $item['end_time'] && $item['order_status'] == 'Đang Sử Dụng'){
                                ?>
                                <a
                                    href="update.php?room_id=<?=$item['room_id']?>&order_id=<?=$item['id_order_detailed']?>"><button>Trả
                                        phòng</button></a>
                                <?php
                                }else {
                                    echo '<input disabled type="submit" name="traphong" value="Trả phòng" >                                         ';
                                }
                                ?>
                            </td>
                            <td><?=$item['order_status']?></td>
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

</html>