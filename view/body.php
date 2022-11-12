<?php 
    require('model/connect.php');
    $sql = "SELECT * FROM `kindroom`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();
?>
<main>
   
 <div class="category">
     
        <h2>Kind of room</h2>
        <?php 
    foreach ($list as $item){
        ?>
        <div class="cate-room">
            <div class="name-room">
                <div><input type="checkbox"> <?php echo $item['kind_of_room_id'] ?></div>
                <div><p> <?php echo $item['kind_of_room']?></p></div>
            </div>
        </div>
        <?php
    }
    ?>
   <?php
    require('model/connect.php');
    $sql = "SELECT * FROM `room`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();
    ?>  
    </div>
    <?php 
    require('model/connect.php');
    $sql = "SELECT * FROM `room`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();
?>
    <div class="room">
        <h2>our room</h2>
        <div class="content">
        <?php
            foreach ($list as $item) {
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