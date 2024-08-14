<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <style>
    main {
        margin: 50px 50px;
    }

    h1 {
        margin-bottom: 30px;
    }
    </style>
</head>

<body>
    <main>
        <h1>Danh sách tài khoản</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <!-- <th>Mật khẩu</th> -->
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>


                <?php
                    $listtaikhoan = loadall_taikhoan();
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $xemtk = "index.php?act=xemtk&id=" . $user_id;
                        $suatk = "index.php?act=suatk&id=" . $user_id;
                        $xoatk = "index.php?act=xoatk&id=" . $user_id;
                                        
                        echo '<tr>
                            <td>' . $user_id . '</td>
                            <td>' . $user_name . '</td>
                            <td>' . $email . '</td>       
             
                            <td>' . $phone . '</td>
                            <td>' . $address . '</td>
                            <td>
                                <a href="' . $xemtk . '"><button class="btn btn-success">Xem</button></a>
                                <a href="' . $suatk . '"><button class="btn btn-info">Sửa</button></a>
                                <a href="' . $xoatk . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\');"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>';
                    }
                ?>

            </tbody>
        </table>
    </main>
</body>

</html>