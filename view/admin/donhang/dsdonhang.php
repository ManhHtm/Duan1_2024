<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
    main {
        margin: 50px 50px;
    }

    img {
        max-height: 150px;
    }

    .search-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-input {
        flex: 2;
        padding: 5px;
    }

    .form-select {
        flex: 1;
        padding: 5px;
    }

    .submit-btn {
        padding: 5px 10px;
        cursor: pointer;
    }

    .no-products {
        color: red;
        font-weight: bold;
        text-align: center;
    }

    p {
        text-shadow: 5px 5px 10px #00FF00;
    }

    .ts {
        text-shadow: 5px 5px 10px red;

    }

    p {
        box-shadow: rgba(255, 255, 255, 0.2) 0px 0px 0px 1px inset, rgba(0, 0, 0, 0.9) 0px 0px 0px 1px;
        padding: 3px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <main>
        <h1>Danh sách đơn hàng</h1>
        <hr>



        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Hình thức thanh toán</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $listbill = loadall_bill(0);
                foreach($listbill as $bill) {
                    extract($bill);
                    $suatt = "index.php?act=suatt&id=" . $id;
                    $xemct = "index.php?act=xemct&id=" . $id;
                    $ttdonhang = get_startus($bill['bill_status']);
                    $ppdonhang = get_pay($bill['bill_pttt']);
                   
                    echo'
                    <tr>
                        <td>'.$bill['id'].'</td>
                        <td>'.$bill['bill_name'].'</td>
                        <td>'.$ppdonhang.'</td>
                        <td>'.$bill['bill_tel'].'</td>
                        <td>'.$bill['bill_address'].'</td>
                        <td class="ts"><p>'.$ttdonhang.'</p></td>
                        <td>
                            <a href="' . $suatt . '"><button class="btn btn-danger">Sửa trạng thái</button></a>
                            <a href="' . $xemct . '"><button class="btn btn-success">Xem chi tiết</button></a>
                        </td>
                    </tr>
                    
                    ';
                }
                ?>

            </tbody>
        </table>
    </main>
</body>

</html>