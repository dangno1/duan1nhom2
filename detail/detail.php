<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="detail.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="img/logo.png" alt="">
            </div>
            <nav>
                <ul>
                    <li><a href="">home</a></li>
                    <li><a href="">room</a></li>
                    <li><a href="">about</a></li>
                    <li><a href="">blog</a></li>
                </ul>
                <!-- menu mobile -->
                <div class="menu_mobile">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <div class="topnav">
                        <a href="#home" class="active"><img src="img/logo.png" alt=""></a>
                        <div id="myLinks">
                             <li><a href="">home</a></li>
                    <li><a href="">room</a></li>
                    <li><a href="">about</a></li>
                    <li><a href="">blog</a></li>
                        </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                          <i class="fa fa-bars"></i>
                        </a>
                      </div>
                    
                </div>
                
            </nav>
            <script>
                function myFunction() {
                  var x = document.getElementById("myLinks");
                  if (x.style.display === "block") {
                    x.style.display = "none";
                  } else {
                    x.style.display = "block";
                  }
                }

                </script>
            <div class="sign-in__sign-out">
                <button>login</button>
                <button>Sign up</button>
            </div>
        </header>
        <div class="deitail-room">
            <div class="tile">
                <h2>Village Angga</h2>
                <span>Bogor, Indonesia</span>
            </div>
            <div class="banner">
                <div class="banner-left">
                    <img src="img/banner1.png" alt="">
                </div>
                <div class="banner-right">
                    <img src="img/banner2.png" alt="">
                    <img src="img/banner3.png" alt="">
                </div>
            </div>

        </div>
    
    <main>
        <div class="produc">
            <div class="room-desc">
                <h3>Mô tả phòng</h3>
                <p>Nằm ở vị trí trung tâm tại Trung Hòa Nhân Chính của Hà Nội, chỗ nghỉ này đặt quý khách ở gần các điểm
                    thu hút và tùy chọn ăn uống thú vị. Đừng rời đi trước khi ghé thăm Phố Cổ nổi tiếng. Được xếp hạng 5
                    sao, chỗ nghỉ chất lượng cao này cho phép khách nghỉ sử dụng bể bơi trong nhà, bể bơi ngoài trời và
                    phòng tập ngay trong khuôn viên.</p>
                <div class="room-uitil">
                    <div><i class="fa-solid fa-wifi"></i>
                        <p>Wife</p></i></div>
                  <div>  <i class="fa-solid fa-tv"></i>
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
                
            </div>
            <div class="room-price">
                <div class="price">
                    <h4>Bắt Đầu Đặt</h4>
                    <span class="price-item">$255</span><span class="night"> OVERNIGHT</span>
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
                    </script>
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
            <img src="img/next.jpg" alt="">
            <p>Outdoor Pool</p>
        </div>
        <div class="zoom next">
            <img src="img/next2.jpg" alt="">
            <p>Bathroom</p>
        </div>
        <div class="zoom next">
            <img src="img/next3.png" alt="">
            <p>View Hotel</p>
        </div>
    </div>
   

        <div class="sub-produc">
            <input type="text" class="conment" value="" > <Button class="submit-content">Gửi Bình Luận</Button>
        </div>
    </main>
    <div id="wrapper">
        <input type="checkbox" name="" class="switch-toggle" id="light-dark">
    </div>
    <script>
        var checkbox_toggle = document.getElementById('light-dark');
        checkbox_toggle.addEventListener('change', function(){
            // THêm class dark cho body
            document.body.classList.toggle('dark');
        });
    </script>
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
            <p>Ngo van quang</p>
        </div>
    </footer>
</div>
</body>

</html>