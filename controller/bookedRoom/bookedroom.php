<?php
    require('../../model/connect.php');
    require('../../model/bookedRoom.php');
    require('../../model/room.php');
    $bookedRoom = new BookedRoom();
    $list = $bookedRoom->getDataBookedRoom();
    if (isset($_POST['search_detailed'])){
        $data_search = $_POST['search_detailed'];
        $list = $bookedRoom->searchBookedRoom($data_search);
    } else if ($list < 0){
        $list = '';
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
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
    <link rel="stylesheet" href="./bRoom.css">
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
                <h1>Booked Room</h1>
            </div>
            <hr>
            <div class="hangHoa">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="search_detailed" placeholder="Nhập User name...">
                    <input type="submit" value="Tìm kiếm">
                </form>
                <table>
                    <thead>
                        <tr>
                            <th class="id">id</th>
                            <th>Kind of room</th>
                            <th>User name</th>
                            <th>start time</th>
                            <th>End time</th>
                            <th>Amount</th>
                            <th>Total money</th>
                            <th>Trạng thái</th>
                            <th>Xếp phòng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                       
                            foreach ($list as $item) {
                            ?>
                        <tr>
                            <td class="id"><?=$item['rombooked_id']?></td>
                            <td><?=$item['kind_of_room']?></td>
                            <td><?=$item['name_user']?></td>
                            <td><?=$item['start_time']?></td>
                            <td><?=$item['end_time']?></td>
                            <td><?=$item['amount']?> người</td>
                            <td><?=$item['total_money']?></td>
                            <td><?=$item['status']?></td>
                            <td>
                                <form action="../order_detailed/add.php?rombooked_id=<?=$item['rombooked_id']?>&amount=<?=$item['amount']?>&amount_max=<?=$item['quantity_max']?>"
                                    method="post" enctype="multipart/form-data">
                                    <?php
                                        $date = date("Y-m-d");
                                        $date_start = date("{$item['start_time']}");
                                        if ($date >= $date_start) {
                                    ?>

                                    <select name="room_order">
                                        <?php
                                                $list_room = $bookedRoom->getDataRoom($item['kind_of_room_id']);
                                                foreach ($list_room as $value_room) {
                                                    ?>
                                        <option value="<?=$value_room['room_id']?>"><?=$value_room['name_room']?>
                                        </option>
                                        <?php
                                                }
                                                ?>
                                    </select>
                                    <button type="submit">OK</button>

                                    <?php
                                            } else{
                                        ?>

                                    <select disabled>
                                        <option value="">Đang chờ</option>
                                    </select>
                                    <?php
                                            }
                                        ?>
                                </form>
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

</html>