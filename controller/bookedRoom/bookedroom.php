<?php
    require('../../model/connect.php');
    require('../../model/bookedRoom.php');
    require('../../model/room.php');
    require('../../model/orderDetails.php');
    $bookedRoom = new BookedRoom();
    $list = $bookedRoom->getDateBookedRoom();

    $sql = "SELECT name_room FROM room LEFT JOIN roombooked ON room.kind_of_room_id = roombooked.kind_of_room_id";
    $show = $connect->query($sql);
    $show->execute();
    $list_room = $show->fetchAll();

    if(isset($_POST['btn_submit'])) {
        foreach ($list as $item) {
            $idRoombooked = $item['rombooked_id'];
            $kindOfRoom = $item['kind_of_room'];
            $username = $item['name_user'];
            $startTime = $item['start_time'];
            $endTime = $item['end_time'];
            $amount = $item['amount'];
            $toalMoney =  $item['total_money'];
        }
        $nameRoom = $_POST['name_room_order'];
        // echo $nameRoom;
<?php
    require('../../model/connect.php');
    require('../../model/bookedRoom.php');
    $bookedRoom = new BookedRoom();
    $list = $bookedRoom->getDateBookedRoom();
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
                <h2>Roombooked</h2>
                <a href="../comment/cmt.php">
                    <h2>Comment</h2>
                </a>
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
                <h1>Booked Room</h1>
            </div>
            <hr>
            <div class="hangHoa">
                <table>
                    <thead>
                        <tr>
                            <th id="id">Rombooked id </th>
                            <th>Kind of room</th>
                            <th>User name</th>
                            <th>start time</th>
                            <th>End time</th>
                            <th>Amount</th>
                            <th>Total money</th>
                            <th>Status</th>
                            <th>Xếp phòng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                        <tr>
                            <td id="id"><?=$item['rombooked_id']?></td>
                            <td><?=$item['kind_of_room']?></td>
                            <td><?=$item['name_user']?></td>
                            <td><?=$item['start_time']?></td>
                            <td><?=$item['end_time']?></td>
                            <td><?=$item['amount']?></td>
                            <td><?=$item['total_money']?></td>
                            <td><?=$item['status']?></td>
                            <td>...</td>
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
        

        $data = [
            'rombooked_id' => $idRoombooked,
            'kind_of_room' => $kindOfRoom,
            'username' => $username,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'amount' => $amount,
            'total_money' => $toalMoney,
            'name_room' => $nameRoom,
        ];

        $roomOrder = new orderDetails();
        $roomOrder = $roomOrder->add($data);

        if($connect) {
            echo "ok";
        }
    }
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
                <h2>Roombooked</h2>
                <a href="../comment/cmt.php">
                    <h2>Comment</h2>
                </a>
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
                <h1>Booked Room</h1>
            </div>
            <hr>
            <div class="hangHoa">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table>
                        <thead>
                            <tr>
                                <th id="id">Rombooked id </th>
                                <th>Kind of room</th>
                                <th>User name</th>
                                <th>start time</th>
                                <th>End time</th>
                                <th>Amount</th>
                                <th>Total money</th>
                                <th>Xếp phòng</th>
                                <th>Duyệt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($list as $item) {
                            ?>
                            <tr>
                                <td id="id"><?=$item['rombooked_id']?></td>
                                <td><?=$item['kind_of_room']?></td>
                                <td><?=$item['name_user']?></td>
                                <td><?=$item['start_time']?></td>
                                <td><?=$item['end_time']?></td>
                                <td><?=$item['amount']?></td>
                                <td><?=$item['total_money']?></td>
                                <td>
                                    <select name="name_room_order" id="">
                                        <?php
                                            foreach ($list_room as $value_room) {
                                        ?>
                                            <option value="<?php echo $value_room['name_room'] ?>"><?php echo $value_room['name_room'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td><input class="nut" type="submit" name="btn_submit" id="" value="Duyệt"></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
</html>