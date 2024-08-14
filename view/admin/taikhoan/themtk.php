<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    main {

        padding: 30px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 50px 50px;
    }

    .form-add {
        margin: 10px 0px;
    }

    h2 {
        color: green;
    }
    </style>
</head>

<body>
    <main>
        <h2>
            <?php 
            if(isset($dktkthanhcong)&&($dktkthanhcong!="")) echo $dktkthanhcong;
        ?>
        </h2>
        <h1>Thêm tài khoản</h1>
        <hr>
        <form action="index.php?act=themtk" method="post">
            <div class="form-add">
                <label for="" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="pass" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="addr" required>
            </div>

            <br>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="them" value="Thêm tài khoản">
            </div>

        </form>
    </main>

</body>

</html>