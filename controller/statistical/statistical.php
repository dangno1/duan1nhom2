<?php
    require('../../model/connect.php');
    $sql = "SELECT kindroom.*, COUNT(roombooked.kind_of_room_id) AS 'number' FROM roombooked INNER JOIN kindroom ON roombooked.kind_of_room_id = kindroom.kind_of_room_id  GROUP BY roombooked.kind_of_room_id";
    $show = $connect->query($sql);
    $show->execute();
    $data = $show->fetchAll();

    // echo "<pre/>";
    // var_dump($data);
    // die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong Ke</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="../kindRoom/kindRoom.css">
    <link rel="stylesheet" href="thongKe.css">
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
            <a href="../room/room.php"><h2>Room</h2></a>
            <a href="../roomImage/image.php"><h2>Room Image</h2></a> <br>
            <a href="../user/user.php"><h2>User</h2></a>
            <a href="../bookedRoom/bookedroom.php"><h2>Booked Room</h2></a>
            <a href="../comment/cmt.php"><h2>Comment</h2></a>
            <a href="../order_detailed/order_detailed.php">
                <h2>Order Detailed</h2>
            </a>
            <h2>Statistical</h2>
        </div>
        <div class="logout">
            <a href="../../index.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
        </div>
    </div>
    <div class="content">
        <div>
            <h1>Thống Kê</h1>
        </div>
        <hr>
        <div class="content-1">
            <div class="one">
                <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['kind_of_room', 'number'],
                        <?php
                            foreach ($data as $item) {
                                echo "['$item[kind_of_room]', $item[number]],";
                            }
                        ?>
                    ]);

                    var options = {
                        title: 'Thống Kê Loại Phòng Được Đặt!!!',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                    }
                </script>
                <div id="piechart_3d" style="width: 800px; height: 600px;"></div>
            </div>
            <div class="two">
                <div class="price-sum">
                    <?php
                        $sum = 0;
                        foreach ($data as $item) {
                            $sum = $sum + $item['price'];
                        }
                    ?>
                    <h3>Tong Tien Thu Duoc La: </h3>
                    <h4><?php echo $sum . "VND" ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>