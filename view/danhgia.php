<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/html.css">
</head>
<body>
    <div class="container">
        <div class="post">
            <div class="text">Cảm ơn đã đánh giá</div>
            <div class="edit">EDIT</div>
        </div>
        <div class="star-widget"> 
            <input type="radio" name="rate" id="rate-5">
            <label for="rate-5" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-4">
            <label for="rate-4" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-3">
            <label for="rate-3" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-2">
            <label for="rate-2" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-1">
            <label for="rate-1" class="fas fa-star"></label>
            <form action="#">
                <header></header>
                <div class="textarea">
                    <textarea name="" id="" cols="30" placeholder="Nhận xét của bạn"></textarea>
                </div>
                <div class="btn">
                    <button type="submit">Gửi</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const btn = document.querySelector("button");
        const post = document.querySelector(".post");
        const widget = document.querySelector(".star-widget");
        const editBtn = document.querySelector(".edit");
        btn.onclick = ()=>{
            widget.style.display = "none";
            post.style.display = "block";
            editBtn.onclick = ()=>{
                widget.style.display = "block";
                post.style.display="none";
                return false;
            }
        }
    </script>
</body>
</html>