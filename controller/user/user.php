<?php
    require('../../model/connect.php');
    $sql = "SELECT * FROM `user`";
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
            <h1>USER</h1>
        </div>
        <hr>
        <div class="hangHoa">
            <a href="add.php"><button>ADD Admin</button></a>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <!-- <th>Status</th> -->
                    <th>Vai trò</th>
                    <th>Email</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list as $item) {
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
        </div>
    </div>
</div>
</body>
</html>
