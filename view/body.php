<?php 
    require('model/connect.php');
    $sql = "SELECT * FROM `kindRoom`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();


    $sql1 = "SELECT * FROM `room`";
    $show1 = $connect->query($sql1);
    $show1->execute();
    $list_room = $show1->fetchAll();
?>
<main>
    <div class="category">
        <h2>Kind of room</h2>
        <?php 
            foreach ($list as $item){
        ?>
            <div class="cate-room">
                <div class="name-room">
                    <div><input type="checkbox"></div>
                    <div><p> <?php echo $item['kind_of_room']?></p></div>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
    <div class="room">
        <h2>our room</h2>
        <div class="content">
        <?php
            foreach ($list_room as $item) {
        ?>
            <div class="content_item">

                <div class="content_item_img">
                    <img src="<?='controller/room/' . $item['image_room'] ?>">
                </div>
                <p class="loaiphong"><?php echo $item['kind_of_room'] ?></p>
                <span class="price"><?php echo $item['price_room'] ?></span>
                <a><button>ĐẶT PHÒNG</button></a>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
</main>