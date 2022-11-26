<?php
            require('../model/connect.php');
            require('../model/roomBook.php');
            session_start();
            if(isset($_SESSION['name_user']) && isset($_SESSION['user_id']) ){
                $username = $_SESSION['name_user'];
                $userID = $_SESSION['user_id'];
                
                
                $sql_user = "SELECT * FROM `user` WHERE user_id = $userID";
                $result = $connect->query($sql_user);
                $result->execute();
                $user_infor = $result->fetch();
                // ---------
                $sql_room = "SELECT * FROM `roombooked` WHERE user_id = $userID";
                $result = $connect->query($sql_room);
                $result->execute();
                $roombooked = $result->fetch();
                // --
                $sql_imageroom = "SELECT room.kind_of_room,room.image_room,room.price_room,room.describe_room FROM room INNER JOIN roombooked ON room.kind_of_room_id = roombooked.kind_of_room_id  WHERE room.kind_of_room_id  = $userID";
                $result = $connect->query($sql_imageroom);
                $result->execute();
                $room_infor = $result->fetch();
            }
             ?>
                    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./css/lichsudatphong.css">
    <link rel="stylesheet" href="./css/style.css">
    
</head>

<body>
    
    <div class="container">
        <div class="header">
            <div class="logo">
            <a href="../index.php"><img src="./img/logo.png" alt=""></a>
            </div>
               
                <nav>
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="">room</a></li>
                        <li><a href="">about</a></li>
                        <li><a href="./view/lichsudatphong.php">Hotel Booking History</a></li>
                    </ul>
                 </nav>
            
            <?php
        // echo "<pre/>";
        // var_dump($_SESSION);
        // die();
            if(!isset($_SESSION['name_user'])) {
        ?>
            <div class="sign-in__sign-out">
                <a href="./dangnhap.php"><button>Login</button></a>
                <a href="./dangky.php"><button>Sign up</button></a>
            </div>
        <?php
            } else {
        ?>
            <div class="sign-in__sign-out">
                <a href="./dangxuat.php"><button>Logout</button></a>
            </div>
        <?php
            }
        ?>
        
        </div>
        <h1>LỊCH SỬ ĐẶT PHÒNG</h1>
        <div class="body">
           <?php
            if(!empty($user_infor)) {
        ?>
            <div class="thongtinnguoidat">
                <div class="infor">
                    <div class="infor_user">
                        <p><?php echo $user_infor['name_user'] ?></p>
                    </div>
                    <div class="infor_email">
                        <p> <?php echo $user_infor['mail_user'] ?></p>
                    </div>
                    <div class="infor_sdt">
                        <p><?php echo $user_infor['phone_number_user'] ?></p>
                    </div>
                </div>
                <div class="invoice">
                    <div class="invoice_stt">
                        <p><span>đơn số :</span>#123</p>
                    </div>
                    <div class="invoice_time">
                        <p><span>ngày đặt :</span>12/8/2023</p>
                    </div>
                </div>
                <?php
            if(!empty($roombooked)) {
        ?>
                <div class="table_time">
                    <table  class="time">
                        <tr class="time_start">
                            <th>Ngày Đến</th>
                            <th>Ngày Đi</th>
                        </tr>
                        <tr>
                            <?php foreach($roombooked as $book){ ?> 
                            <td><span><?php echo $book['start_time'] ?></span></td>
                            <td><span><?php echo $book['end_time'] ?></span></td>
                        </tr>
                    </table>
                    <?php
                     }
                    
                    ?>
                </div>
            </div>
            <?php
            if(!empty($room_infor)){
            ?>
            <div class="thongtinphong">
                <table class="infor_phong">
                    <tr>
                        <th>Loại Phòng</th>
                        <th>Ảnh</th>
                        <th>Số Người</th>
                        <th>Gía Phòng </th> 
                        <th>địa chỉ</th>   
                    </tr>
                    <tr>
                        <?php 
                        foreach($room_infor as $room){
                        ?>
                        <td><?php echo $room['kind_of_room'] ?></td>
                        <td><span ><img src="./controller/kindRoom/<?php echo $room['image_room'] ?>" width="100%" height="335px"></span></td>
                        <td>3 người</td>
                        <td><span>$</span><span><?php echo $room['price_room'] ?></span></td>
                        <td><?php echo $room['describe_room'] ?></td>
                    </tr>
                </table>
                <?php }?>
            </div>
            <?php 
            }
            ?>
            <div class="footer_UP">
                <table class="total">
                    <tr>
                        <th>Tổng Tiền</th>
                    </tr>
                    <tr>
                        <td><span>$</span> <span><?php echo $book['total_money'] ?></span></td>
                    </tr>
                </table>
            </div>
            <?php 
            }
            ?>
            <h2 style="text-align: center ;">chúng tôi sẽ liên hệ lại với bạn vào thời gian sớm nhất</h2>
         <footer>

            <div class="footer">
            <p class="text">
                All material herein © 2005–2022 Agoda Company Pte. Ltd. All Rights Reserved. <br> <br>
                Agoda is part of Booking Holdings Inc., the world leader in online travel & related services.
            </p>
            <p class="icon-footer">
                <img src="./img/ft1.png" alt="">
                <img src="./img/ft2.png" alt="">
                <img src="./img/ft3.png" alt="">
                <img src="./img/ft4.png" alt="">
                <img src="./img/ft5.png" alt="">
                <img src="./img/ft6.png" alt="">
            </p>
            </div>
            
            
            
         </footer>
    </div>
    <?php 
        } else {
    ?>
        <h2>bạn chưa đăng nhập</h2>
    <?php
        }
    ?>

</body>
</html>