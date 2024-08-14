<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
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

    a {
        text-decoration: none;
        font-size: 20px;
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <main>
        <h2>
            <?php
                if (isset($taikhoan) && is_array($taikhoan)) {
                    extract($taikhoan);
                } else {
                    $user_name = '';
                    $user_id = '';
                    $password = '';
                    $email = '';
                    $phone = '';
                    $address = '';
                }

                if (isset($suatkthanhcong) && $suatkthanhcong != "") {
                    echo $suatkthanhcong;
                }
            ?>
        </h2>
        <h1>Sửa tài khoản</h1>
        <a href="index.php?act=danhsachtk"> ← Quay lại</a>
        <hr>
        <form action="index.php?act=updatetk" method="post">
            <div class="form-add">
                <label for="" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" name="user" value="<?= $user_name ?>">
            </div>

            <div class="form-add">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" style="color: gray;" name="email" value="<?= $email ?>"
                    readonly>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" style="color: gray;" name="pass" value="<?=$password?>"
                    readonly>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="tel" value="<?= $phone ?>">
            </div>

            <div class="form-add">
                <label for="" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="addr" value="<?= $address ?>">
            </div>

            <input type="hidden" name="id" value="<?= $user_id ?>">

            <br>
            <div class="d-grid gap-2">
                <input type="hidden" value="<?=$id?>">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="capnhat" value="Sửa tài khoản">
            </div>

        </form>
    </main>

</body>

</html>