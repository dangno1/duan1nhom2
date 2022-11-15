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
   
</head>
<body>
    <div class="wrapper">
        <form action="" class="form-login">
            <h1 class="form-heading">Đăng Ký Tài Khoản</h1>
            <div class="form-group">
         
                <input type="text" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                
                <input type="email" class="form-input" placeholder="Email">
            </div>
            <div class="form-group">
               
                <input type="text" class="form-input" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Mật Khẩu">
            </div>
            <input type="submit" value="Đăng kí" class="form-submit">
            <input type="reset" value="Nhập lại" class="form-submit">
        </form>
    </div>
</body>
</html>