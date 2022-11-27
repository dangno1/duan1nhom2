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
                $roombooked = $result->fetchAll();
                // --
                
                $sql_imageroom = "SELECT kindroom.kind_of_room,kindroom.image,kindroom.price,kindroom.describe FROM kindroom INNER JOIN roombooked ON kindroom.kind_of_room_id = roombooked.kind_of_room_id  WHERE roombooked.user_id  = $userID";
                $result = $connect->query($sql_imageroom);
                $result->execute();
                $room_infor = $result->fetchAll();
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
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
</head>

<body>
  <div class="container">
 
        <div class="header">
            <div class="logo">
            <a href="../index.php"><img src="./img/logo.png" alt=""></a>
            </div>
             <div class="menu"> 
                <nav>
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="">room</a></li>
                        <li><a href="">about</a></li>
                        <li><a href="./view/lichsudatphong.php">Hotel Booking History</a></li>
                    </ul>
                 </nav>
                 </div> 
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
        
        <div class="marquee">
  <div>
    <span>CẢM  ƠN   BẠN   ĐÃ   GHÉ   THĂM   WEBSITE</span>
    <span> CẢM  ƠN   BẠN   ĐÃ   GHÉ   THĂM   WEBSITE ,  CHÚNG  TÔI  SẼ  LIÊN  HỆ  LẠI  VỚI  BẠN  TRONG  KHOẢN  THỜI  GIAN  SỚM  NHẤT</span>
  </div>
</div>    
        <h1 >LỊCH SỬ ĐẶT PHÒNG</h1>
      

       
    <div class="container_body">  
   
           <?php
            if(!empty($user_infor)) {
        ?>
        <div class="thongtinnguoidat">
                <div class="infor">
                    <div class="the"><h2>Thông Tin Người Đặt</h2></div>
                <table class="infor_nguoidat">
                <tr>
                        <th>Họ Và Tên</th>
                        <th>Địa Chỉ Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Ngày Đến </th> 
                        <th>Ngày Đi</th>  
                         
                </tr>
                <tr>
                        <td><?php echo $user_infor['name_user'] ?></td>
                        <td><?php echo $user_infor['mail_user'] ?></td>
                        <td><?php echo $user_infor['phone_number_user'] ?></td>
                        <?php
                     if(!empty($roombooked)) {
                    ?>
                    <?php foreach ($roombooked as $roombook){ ?>
                        <td><?php echo $roombook['start_time'] ?></td>
                        <td><?php echo $roombook['end_time'] ?></td>
                </tr>
                </table>
                    
                </div>
               
        </div>
          
                    <?php
                    if(!empty($room_infor)){
                    ?>
               
        <div class="thongtinphong">
        <div class="the"><h2>Thông Tin Đặt Phòng</h2></div>
                <table class="infor_phong">
                    <tr>
                        <th>Loại Phòng</th>
                        <th>Ảnh</th>
                        <th>số người</th>
                        <th>Gía Phòng </th> 
                        <th>địa chỉ</th>  
                        <th>Tổng Tiền</th> 
                    </tr>
                    <tr>
                    <?php 
                        foreach ($room_infor as $item) {
                    ?>
                        <td><?php echo $item['kind_of_room'] ?></td>
                        <td><span ><img src="../controller/kindRoom/<?php echo $item['image'] ?>" width="100%" height="90%"></span></td>
                        <td><?php echo $roombook['amount'] ?></td>
                        <td><span>$</span><span><?php echo $item['price'] ?></span></td>
                        <td><?php echo $item['describe'] ?></td>
                        <td><span>$</span> <span><?php echo $roombook['total_money'] ?></span></td>
                    </tr>
                </table>
                        <?php 
                         }
                          ?>
                  
                         <?php 
                           }
                           ?>    
        </div>
                    <?php 
                    }
                    ?>             
            <?php 
            }
            ?>  
            </div> 
      <section id="contact">
            <div class="contact-wrapper">
                <form id="contact-form" class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
                    </div>
                </div>
                <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>
                <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
                    <div class="alt-send-button">
                    <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
                    </div>
                </button>
                 </form>
            </div>
        </section>  
            
                     
         <footer>

            <div class="footer">
            <div class="stars">
                        <h1> Đánh giá của bạn</h1>
                        <form action="">
                            <input class="star star-5" id="star-5" type="radio" name="star"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star"/>
                            <label class="star star-1" for="star-1"></label>
                        </form>
            </div> 
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
            
            <?php 
                } else {
            ?>
                <h2>bạn chưa đăng nhập</h2>
            <?php
                }
            ?>
    </div>
      
</body>
</html>