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
    <title>dangky</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js"crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST" class="form-login">
        <a href="../index.php"><i class="fas fa-times"></i></a>
            <h1 class="form-heading">Đăng Ký Tài Khoản</h1>
            <div class="form-group">
         
                <input type="text" class="form-input" name="user" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                
                <input type="email" class="form-input" name="email" placeholder="Email">
            </div>
            <div class="form-group">
               
                <input type="phone" class="form-input" name="phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" name="pass" placeholder="Mật Khẩu">
            </div>
            <input type="submit" value="Đăng ký" name="btn_submit" class="form-submit">
            <a href="dangnhap.php"><input type="button" value="Đăng Nhập" class="form-submit"></a>
        </form>
    </div>
</body>
</html>