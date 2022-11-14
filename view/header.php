<div class="container">
    <header>
        <div class="logo">
            <a href="./index.php"><img src="./view/img/logo.png" alt=""></a>
        </div>
        <nav>
            <ul>
                <li><a href="">home</a></li>
                <li><a href="">room</a></li>
                <li><a href="">about</a></li>
                <li><a href="">blog</a></li>
            </ul>
        </nav>
        
        <?php
        // echo "<pre/>";
        // var_dump($_SESSION);
        // die();
            if(!isset($_SESSION['name_user'])) {
        ?>
            <div class="sign-in__sign-out">
                <a href="./view/dangnhap.php"><button>Login</button></a>
                <a href="./view/dangky.php"><button>Sign up</button></a>
            </div>
        <?php
            } else {
        ?>
            <div class="sign-in__sign-out">
                <a href="./view/dangxuat.php"><button>Logout</button></a>
            </div>
        <?php
            }
        ?>
    </header>