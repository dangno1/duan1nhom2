<?php 
    require('../../model/connect.php');
    $sql = "SELECT * FROM `roombooked`";
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
    <title>Room</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="./roomBook.css">
</head>
<body>
    <div class="admin">
        <div class="category">
            <div class="logo">
                <a href="../quanTri.php"><img src="../../view/img/logo.png" alt=""></a>
            </div>
            <hr>
            <div class="category-1">
                <a href="../kindRoom/kindRoom.php"><h2 class="kind">Kind Of Room</h2></a> <br>
                <a href="../room/room.php"><h2>Room</h2></a> <br>
                <a href="../user/user.php"><h2>User</h2></a> <br>
                <h2>Roombooked</h2>
                <a href="../comment/cmt.php"><h2>Comment</h2></a>
                <h2>Statistical</h2>
            </div>
            <div class="logout">
                <a href="../../index.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
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
                            <th>Rombooked_id</th>
                            <th>Room_id </th>
                            <th>User_id</th>
                            <th>Start_time</th>
                            <th>End_time</th>
                            <th>Total_money</th>                           
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($list as $item) {
                        ?>
                        <tr>
                            <td><?=$item['rombooled_id']?></td>
                            <td><?=$item['room_id']?></td>
                            <td><?=$item['user_id']?></td>
                            <td><?=$item['start_time']?></td>
                            <td><?=$item['end_time']?></td>
                            <td><?=$item['total_money']?></td>  
                            <td>
                                <a onclick="return confirm('Do you want delete?')" href="delete.php?id=<?=$item['rombooled_id']?>">Delete</a>
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