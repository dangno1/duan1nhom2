<?php
    require('../../model/connect.php');
    $sql = "SELECT count(*) FROM `user`";
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

    $sql_limit = "SELECT * FROM `user` limit $limit offset $offset";
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
    <title>Quan Tri Kind Of Room</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="../kindRoom/kindRoom.css">
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
            <a href="../dangXuat.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
        </div>
    </div>
    <div class="content">
        <div>
            <h1>USER</h1>
        </div>
        <hr>
        <div class="hangHoa">
            <a href="add.php"><button>ADD Admin</button></a>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <!-- <th>Status</th> -->
                    <th>Vai trò</th>
                    <th>Email</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list_limit as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['user_id'] ?></td>
                        <td><?php echo $item['name_user'] ?></td>
                        <td><?php echo $item['phone_number_user'] ?></td>
                        <td><?php echo $item['password_user'] ?></td>
                        <td>
                        <?php 
                            if($item['id_role'] == 1) {
                                echo "Admin";
                            } else {
                                echo "Khach Hang";
                            }
                        ?>
                        </td>
                        <td><?php echo $item['mail_user'] ?></td>
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
                    <ul><a href="user.php?page=<?php echo $i;?>"><?php echo $i; ?></a></ul>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
