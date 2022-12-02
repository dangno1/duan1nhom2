<?php 
    require('model/connect.php');
    $sql = "SELECT * FROM `kindRoom`";
    $show = $connect->query($sql);
    $show->execute();
    $list = $show->fetchAll();
?>
<main>
    <div class="room">
        <h2>Kind Of Room</h2>
        <div class="content">
        <?php
            foreach ($list as $item) {
        ?>
            <div class="content_item">
                <a href="./chitiet.php?kind_of_room_id=<?php echo $item['kind_of_room_id'] ?>">
                    <div class="content_item_img">
                        <img src="./controller/kindRoom/<?php echo $item['image'] ?>" width="100%" height="270px">
                    </div>
                </a>
                <p class="loaiphong"><?php echo $item['kind_of_room'] ?></p>
                <span class="price"><?php echo $item['price'] ?> VNĐ</span>
                <br>
                <a><button class="book_room">ĐẶT PHÒNG</button></a>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
</main>