<?php
    session_start();
    require('./model/connect.php');

    if(!empty($_GET['room_id'])) {
        $id_room = $_GET['room_id'];

        $sql = "SELECT * FROM `room` WHERE `room_id` = $id_room";
        $result = $connect->query($sql);
        $result->execute();
        $room = $result->fetch();

        //get comment
        $commentSql = "SELECT comment.content_comment, user.name_user FROM comment INNER JOIN user ON comment.user_id = user.user_id WHERE comment.room_id = $id_room";
        $result = $connect->query($commentSql);
        $result->execute();
        $comments = $result->fetchAll();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiet</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./view/css/deitails.css">
</head>

<body>
    <div class="container">
        <?php require('./view/header.php'); ?>
        <?php 
            if(!empty($room)) {
        ?>
        <div class="deitail-room">
            <div class="tile">
                <span>Big Hotel</span>
                <h2><?php echo $room['kind_of_room'] ?></h2>
            </div>
            <div class="banner">
                <div class="banner-left">
                    <img src="./controller/room/<?php echo $room['image_room'] ?>" alt="">
                </div>
                <div class="banner-right">
                    <img src="./view/img/deitail/banner2.png" alt="">
                    <img src="./view/img/deitail/banner3.png" alt="">
                </div>
            </div>
        </div>
    <main>
        <div class="produc">
            <div class="room-desc">
                <h3>Mô tả phòng</h3>
                <p><?php echo $room['describe_room'] ?></p>
                <div class="room-uitil">
                        <div><i class="fa-solid fa-wifi"></i>
                            <p>Wife</p></i>
                        </div>
                        <div><i class="fa-solid fa-tv"></i>
                            <p>TV</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-bath"></i>
                            <p>Nhà Tắm</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-bottle-water"></i>
                            <p>Vật dụng tắm rửa</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-suitcase-medical"></i>
                            <p>Tủ y tế</p>
                        </div>
                    <div>
                        <i class="fa-sharp fa-solid fa-snowflake"></i>
                        <p>Diều hòa</p>
                    </div>
                    <div>
                        <i class="fa-sharp fa-solid fa-bed"></i>
                        <p>Giường ngủ</p>
                    </div>
                </div>
                <div class="comment-list">
                    <h3>Comment về sản phẩm</h3>
                    <?php if(!empty($comments)) :?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment-item">
                                <h5 class="username">
                                    <?php echo "-". $comment['name_user'];?>
                                </h5>
                                <div class="comment-content">
                                    <?php echo $comment['content_comment'];?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <hr>
                </div>
            </div>
            <div class="room-price">
                <div class="price">
                    <h4>Bắt Đầu Đặt</h4>
                    <span class="price-item"><?php echo $room['price_room']."VNĐ" ?></span><span class="night"> OVERNIGHT</span>
                </div>
                <div class="date-room">
                    <span class="date">
                        Bạn sẽ ở lại bao lâu?
                    </span>
                    <div class="buttons_added">
                        <div class="room">
                            <button id="reduce">-</button>
                            <input type="number" min="1" value="1" id="number_room">
                            <button id="add">+</button>
                        </div>
                    </div>
                </div>
                <div class="pick-date">
                    <h4>Chọn ngày đặt</h4>
                    <input type="date" class="calendar" value="">
                </div>
                <div class="book">
                    <button class="book-room">Đặt Phòng Ngay</button>
                </div>
            </div>
        </div>
        <h3> Khám phá Khách sạn</h3>
        <div class="room-next">
            <div class="zoom next">
                <img src="./view/img/deitail/next.jpg" alt="">
                <p>Outdoor Pool</p>
            </div>
            <div class="zoom next">
                <img src="./view/img/deitail/next2.jpg" alt="">
                <p>Bathroom</p>
            </div>
            <div class="zoom next">
                <img src="./view/img/deitail/next3.png" alt="">
                <p>View Hotel</p>
            </div>
        </div>
        <?php
            require('./view/comment.php');
        ?>
    </main>
    <div id="wrapper">
        <input type="checkbox" name="" class="switch-toggle" id="light-dark">
    </div>
    <?php 
        } else {
    ?>
        <h2>Phong ko ton tai</h2>
    <?php
        }
    ?>
    <?php require('./view/footer.php'); ?>

    <script>
        document.getElementById('add').onclick = function () {
            let number_room = document.getElementById('number_room')
            number_room.value++
        }
        document.getElementById('reduce').onclick = function () {
            let number_room = document.getElementById('number_room')
            if (number_room.value > 1) {
                number_room.value--
            }
        }

        var checkbox_toggle = document.getElementById('light-dark');
        checkbox_toggle.addEventListener('change', function(){
            // THêm class dark cho body
            document.body.classList.toggle('dark');
        });
    </script>
</div>
</body>
</html>