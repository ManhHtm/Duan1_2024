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

    .tt {
        display: flex;
        justify-content: space-between;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        padding: 20px;
        border-radius: 5px;
    }

    span {
        color: red;

    }

    .ttt {
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <?php
       
    ?>
    <main>
        <div class="chitiet">
            <h2>Chi tiết đơn hàng</h2>
            <a href="index.php?act=dsdonhang"> ← Quay lại</a>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>

                        <th>Tổng tiền</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        if (is_array($cart_items)) {

                            foreach ($cart_items as $item) {
                                echo '<tr class="bg-white dark:bg-slate-900 text-start border-t border-gray-100 dark:border-gray-700">
                                        <td class="px-2 py-3 text-start"> ' . ($item['name']) . '</td>
                                        <td class="px-2 py-3 text-start">' . ($item['price']) . '</td>
                        
                                        <td class="px-2 py-3 text-start">' . ($item['quantity']) . '</td>
                               

                                        <td class="px-2 py-3 text-start">' . ($item['total']) . '</td>
                                    </tr>';
                            }
                        }
                        ?>
                </tbody>
            </table>
            <br>
            <h4>Thông tin hóa đơn</h4>
            <br>
            <div class="tt">
                <div class="left">
                    <h6 class="ttt">Tên khách hàng:
                        <span>
                            <?=($bill['bill_name']); ?>
                        </span>
                    </h6>
                    <h6 class="ttt">Số điện thoại:

                        <span> <?= ($bill['bill_tel']); ?></span>
                    </h6>
                    <h6 class="ttt">Địa chỉ: <span> <?= ($bill['bill_address']); ?></span>
                    </h6>
                    <h6 class="ttt">Email: <span>
                            <?= ($bill['bill_email']); ?>
                        </span>
                    </h6>
                </div>
                <div class="right">
                    <h6 class="ttt">Ngày đặt:
                        <span> <?= ($bill['bill_order_date']); ?></span>
                    </h6>
                    <h6 class="ttt">Hình thức thanh toán:
                        <span>
                            <?php
                              
                                        if ($bill['bill_pttt'] == 1) {
                                            echo "Khi nhận hàng";
                                        } elseif ($bill['bill_pttt'] == 2) {
                                            echo "Thanh toán online";
                                        } else {
                                            echo "Hình thức thanh toán không xác định";
                                        }
                                        ?>
                        </span>

                    </h6>
                    <h6 class="ttt">Phí vận chuyển: <span>
                            Miễn phí vận chuyển
                        </span></h6>
                    <h6 class="ttt">Mã hóa đơn: <span><?= ($bill['id']); ?></span></h6>
                </div>
            </div>

        </div>
    </main>
</body>

</html>