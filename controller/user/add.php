<?php
    require('../../model/user.php');

    if(isset($_POST['btn_submit'])) {
        $phone = $_POST['phone'];
        $name = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        if($name == "" || $pass == "" || $email == "" || $phone == "") {
            // echo "phai nhap het cac cot";
        } else {
            $data = [
                'name_user' => $name,
                'phone_number_user' => $phone,
                'password_user' => md5($pass),
                'mail_user' => $email,
            ];
            $admin = new user();
            $admin->addAdmin($data);
            if($connect) {
                header('location:./user.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang Ky Admin</title>
    <link rel="stylesheet" href="../quanTri.css">
    <link rel="stylesheet" href="user.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js"crossorigin="anonymous"></script>
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
            <a href="../bookedRoom/bookedroom.php"><h2>Roombooked</h2></a>
            <a href="../comment/cmt.php"><h2>Comment</h2></a>
            <h2>Statistical</h2>
        </div>
        <div class="logout">
            <a href="../../index.php"><h2><i class="fa-solid fa-right-from-bracket"></i> LogOut</h2></a>
        </div>
    </div>
    <div class="content">
        <div>
            <h1>Đăng Ký Tài Khoản Admin</h1>
        </div>
        <hr>
        <div class="wrapper">
            <form action="" method="POST" class="form-login">
                <div class="form-group">
                    <label for="">Tên đăng nhập</label> <br>
                    <input type="text" class="form-input" name="user" placeholder="Tên đăng nhập" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label> <br>
                    <input type="email" class="form-input" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label> <br>
                    <input type="phone" class="form-input" name="phone" placeholder="Số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="">Mật Khẩu</label> <br>
                    <input type="password" class="form-input" name="pass" placeholder="Mật Khẩu" required>
                </div>
                <input type="submit" value="Đăng ký" name="btn_submit" class="form-submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>