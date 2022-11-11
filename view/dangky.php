<?php
    require('../model/user.php');

    if(isset($_POST['btn_submit'])) {
        $phone = $_POST['phone'];
        $name = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        if($name == "" || $pass == "" || $email == "" || $phone == "") {
            echo "phai nhap het cac cot";
        } else {
            $data = [
                'name_user' => $name,
                'phone_number_user' => $phone,
                'password_user' => $pass,
                'mail_user' => $email,
            ];
            $user = new user();
            $user->add($data);
            if($connect) {
                header('location:../index.php');
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
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="cat">
        <h2>Đăng ký thành viên</h2>
        <div>
            <form action=""method="POST">
                <div class="row">
                    Email <br>
                    <input type="email" name="email"> 
                </div>
                <div class="row">
                    Số điện thoại <br>
                    <input type="phone" name="phone">
                </div>
                <div class="row">
                    Tên đăng nhập <br>
                    <input type="text" name="user">
                </div>
                <div class="row">
                    Mật khẩu <br>
                    <input type="password" name="pass">
                </div>
                <div class="row">
                    <input type="submit" name="btn_submit" id="" value = "DangKy">
                    <!-- <input type="reset" value="Nhập lại">  -->
                </div>
            </form> 
    </div>
</div> 
</body>
</html>