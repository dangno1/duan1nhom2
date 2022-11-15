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
    <title>dangnhap</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js"crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST" class="form-login">
            <h1 class="form-heading">Đăng Nhập</h1>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" name="user" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="pass" placeholder="Mật Khẩu" required>
               
            </div>
            <input type="submit" value="Đăng Nhập" name="btn_submit" class="form-submit">
        </form>
    </div>
</body>
</html>