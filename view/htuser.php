<?php
session_start();
require('../model/connect.php');
require('../model/user.php');
$_SESSION['user_id'];
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM `user` WHERE user_id = {$id}";
$show = $connect->query($sql);
$show->execute();
$list = $show->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<div class="container">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/deitails.css">
        <script src="https://kit.fontawesome.com/290fc3f375.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/user.css">
    </head>

    <body>
        <header>
            <div class="logo">
                <a href="../index.php"><img src="../view/img/logo.png" alt=""></a>
            </div>
            <nav>
                <ul>
                    <li><a href="../index.php">home</a></li>
                    <li><a href="./htroom.php">room</a></li>
                    <li><a href="">about</a></li>
                    <li><a href="./lichsudatphong.php">Hotel Booking History</a></li>
                </ul>
            </nav>

            <?php
            // echo "<pre/>";
            // var_dump($_SESSION);
            // die();
            if (!isset($_SESSION['name_user'])) {
            ?>
                <div class="sign-in__sign-out">
                    <a href="./view/dangnhap.php"><button>Login</button></a>
                    <a href="./view/dangky.php"><button>Sign up</button></a>
                </div>
            <?php
            } else {
            ?>
                <div class="sign-in__sign-out">
                    <a href="htuser.php"><i class="fas fa-user"></i></a>
                    <a href="../view/dangxuat.php"><button>Logout</button></a>
                </div>
            <?php
            }
            ?>
        </header>
        <main>
            <div class="container">
                <h1>Thông tin user</h1>

                <div class="tt">
                    <label for="">Name user</label>
                    <div class="ht"><?php echo $list['name_user'] ?></div>
                    <label for="">Email</label>
                    <div class="ht"><?php echo $list['mail_user'] ?></div>
                    <label for="">Phone</label>
                    <div class="ht"><?php echo $list['phone_number_user'] ?></div>
                </div>

            </div>
        </main>
    </body>
    </style>
</div>

</html>