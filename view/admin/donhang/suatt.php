<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa trạng thái đơn hàng</title>
    <style>
    main {
        padding: 30px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 50px;
        background-color: #f9f9f9;

    }

    .form-add {
        margin: 10px 0;
    }

    h1 {
        color: red;
        font-size: 24px;

    }

    a {
        text-decoration: none;
        font-size: 20px;
        color: #007bff;
        margin-left: 10px;
    }

    a:hover {
        text-decoration: underline;
    }

    h2 {
        color: green;
    }

    select {
        margin-top: 10px;
        padding: 5px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        background-color: #28a745;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
        width: 300px;
    }

    input[type="submit"]:hover {

        background-color: #218838;
    }
    </style>
</head>

<body>
    <main>
        <h2>
            <?php
            if (isset($suaThanhCong) && $suaThanhCong != "") {
                echo htmlspecialchars($suaThanhCong); // Sử dụng htmlspecialchars để bảo mật
            }
            ?>
        </h2>
        <h1>Sửa trạng thái đơn hàng</h1>

        <a href="index.php?act=dsdonhang">← Quay lại</a>
        <hr>
        <form action="index.php?act=update_tt&id=<?= htmlspecialchars($id) ?>" method="post">
            <input type="hidden" name="bill_id" value="<?= htmlspecialchars($id) ?>">
            <label for="status">Chọn trạng thái:</label><br>
            <select name="bill_status" id="bill_status" <?php echo ($bill_status == 0) ? 'disabled' : ''; ?>>
                <?php
                $statuses = array(
                    0 => "Chờ xác nhận",
                    1 => "Đã xác nhận",
                    2 => "Đang giao hàng",
                    3 => "Đã giao hàng"
                );

                foreach ($statuses as $value => $text) {
                    if ($bill_status == 2 && !in_array($value, [2, 3])) {
                        continue;
                    } elseif ($bill_status == 3 && $value != 3) {
                        continue;
                    }
                    echo "<option value=\"$value\"" . ($bill_status == $value ? ' selected' : '') . ">$text</option>";
                }
                ?>
            </select><br>

            <input type="submit" name="suadonhang" value="Sửa trạng thái">
        </form>
    </main>
</body>

</html>