<?php
require('../../model/connect.php');
require('../../model/OrderDetailed.php');
$bookedRoom = new orderDetailed();

if (isset($_POST['search_detailed'])){
    $data_search = $_POST['search_detailed'];
    $data_search == '' ? $list = $bookedRoom->showorderDetailed() : $list = $bookedRoom->searchOrderDetailed($data_search);
} else{
    $list = $bookedRoom->showorderDetailed();
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
                <a href="order_detailed.php">
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

                            <th>User name</th>
                            <th>Number phone</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                foreach ($list as $item) {
                    ?>
                        <tr>

                            <td><?=$item['name_user']?></td>
                            <td><?=$item['phone_number_user']?></td>
                            <td><a href="order_detailed_user.php?user=<?=$item['name_user']?>"><button>Chi
                                        tiết</button></a></td>
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