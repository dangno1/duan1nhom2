<?php
    require('../model/user.php');

    if(isset($_POST['btn_submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM `user` WhERE `name_user` = '{$username}' AND `password_user` = '{$password}'";
        $show = $connect->query($sql);
        $show->execute();
        $user = $show->fetch();

        // echo "<pre>";
        // var_dump($user);
        // die();
        if($user) {
            $role = $user['id_role'];
            $hoTen = $user['name_user'];
            session_start();
            $_SESSION['name_user'] = $hoTen;
            $_SESSION['user_id'] = $user['user_id'];
            
            if($role == 1) {
                header('location:../controller/quanTri.php');
            } else {
               header('location:../index.php');
            }
        } else {
            echo "<script>alert('Thông Tin Đăng Nhập Sai! Hãy Nhập Lại Để Vào Tài Khoản Của Bạn.')</script>";
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
            <h2>Đăng Nhập Tài Khoản</h2>
            <div>
                <form action=""method="POST">
                    <div class="row">
                        Tên đăng nhập <br>
                        <input type="text" name="user">
                    </div>
                    <div class="row">
                        Mật khẩu <br>
                        <input type="password" name="pass">
                    </div>
                    <div class="row">
                    <input type="submit" name="btn_submit" id="" value = "DangNhap">
                    </div>
                </form> 
        </div> 
</div>

    
</body>
</html>