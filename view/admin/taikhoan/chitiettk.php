<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    main {
        margin: 50px 50px;
    }

    .in4 {
        margin: 20px 0px;
    }

    .chitiet {
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;
        padding: 30px;
        border-radius: 5px;
    }

    h2 {
        margin-bottom: 30px;
    }

    a {
        text-decoration: none;
        font-size: 20px;
        margin-left: 10px;
    }


    p {
        color: gray;
    }
    </style>
</head>

<body>
    <?php
        if ($taikhoan) {
            extract($taikhoan);
        }
    ?>
    <main>
        <div class="chitiet">
            <h2>Thông tin khách hàng</h2>
            <a href="index.php?act=danhsachtk"> ← Quay lại</a>
            <hr>
            <div class="in4">
                <h4>Tên khách hàng: <p><?= $user_name ?></p>
                </h4>

            </div>

            <div class="in4">
                <h4>Email: <p><?= $email ?></p>
                </h4>
            </div>



            <div class="in4">
                <h4>Số điện thoại: <p><?= $phone ?></p>
                </h4>
            </div>

            <div class="in4">
                <h4>Địa chỉ: <p><?= $address ?></p>
                </h4>
            </div>

        </div>
    </main>
</body>

</html>