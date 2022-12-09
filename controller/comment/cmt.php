<?php 
    require('../../model/connect.php');
    $sql = "SELECT count(*) FROM `comment`";
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

    $sql_limit = "SELECT * FROM `comment` ORDER BY `comment`.`date_created_comment` DESC  limit $limit offset $offset";
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
    <title>Comment</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="./cmt.css">
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
            <h1>Comment</h1>
            <hr>
            <div class="hangHoa1">
                <table>
                    <thead>
                        <tr>
                            <th>Comment_id</th>
                            <th>Kind Of Room</th>
                            <th>User</th>
                            <th>Noi Dung</th>
                            <th>Ngay Comment</th>
                            <th>Status</th>
                            <th>Duyệt</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($list_limit as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item['comment_id'] ?></td>
                            <td><?php echo $item['kind_of_room_id'] ?></td>
                            <td><?php echo $item['user_id'] ?></td>
                            <td><?php echo $item['content_comment'] ?></td>
                            <td><?php echo $item['date_created_comment'] ?></td>
                            <td><?php echo $item['status'] ?></td>
                            <td><a href="./update.php?comment_id=<?=$item['comment_id']?>"><button>Duyệt</button></a></td>
                            <td>
                                <a onclick="return confirm('Do you want delete?')"
                                    href="delete.php?id=<?php echo $item['comment_id'] ?>">Delete</a>
                            </td>
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
                        <ul><a href="cmt.php?page=<?php echo $i;?>"><?php echo $i; ?></a></ul>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>