<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    main {
        margin: 50px 50px;
    }

    .chitiet {
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;
        padding: 30px;
        border-radius: 5px;
    }

    .size {
        display: flex;
    }

    ul {
        padding: 0px;
        display: flex;
    }

    .size li {
        list-style: none;
        padding: 3px 0px;
        font-size: 25px;
        color: red;
        margin-left: 10px;
    }

    .anh {
        margin-right: 50px;
    }

    .anh img {
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        width: 410px;
        height: 410px;
        margin-bottom: 15px;
    }

    .sanpham {
        display: flex;
        margin-top: 50px;
        margin-bottom: 100px;
    }

    .sanpham h2 {
        margin-bottom: 20px;
    }

    .image img {
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        width: 200px;
        margin-right: 10px;
        height: 200px;
    }

    a {
        text-decoration: none;
        font-size: 20px;
        margin-left: 10px;
    }

    .mota span {
        font-size: 20px;
        color: red;
    }

    .quantity {
        display: flex;
    }

    .quantity span {
        margin-top: 5px;
        font-size: 25px;
        margin-left: 10px;
        color: red;
    }
    </style>
    <title>Chi tiết sản phẩm</title>
</head>

<body>
    <main>
        <?php
        
        
        $id_sanpham = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id_sanpham === null) {
            echo "ID sản phẩm không được cung cấp.";
            exit;
        }

        $dsbl = loadall_binhluan($id_sanpham);

        if (isset($sanpham) && is_array($sanpham)) {
            extract($sanpham);

            $hinhpath = "./uploads/" . $image;
            if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='80'>";
            } else {
                $hinh = "No photo";
            }

            $hinhpath = "./uploads/" . $thumbnail1;
            if (is_file($hinhpath)) {
                $anhmota1 = "<img src='" . $hinhpath . "' height='80'>";
            } else {
                $anhmota1 = "No photo";
            }

            $hinhpath = "./uploads/" . $thumbnail2;
            if (is_file($hinhpath)) {
                $anhmota2 = "<img src='" . $hinhpath . "' height='80'>";
            } else {
                $anhmota2 = "No photo";
            }

            $sizes = isset($sizes) ? $sizes : [];

        } else {
            echo "Không tìm thấy sản phẩm.";
            exit;
        }
        ?>

        <div class="chitiet">
            <h1>Chi tiết sản phẩm</h1>
            <a href="index.php?act=danhsachsp"> ← Quay lại</a>
            <hr>
            <div class="sanpham">
                <div class="img">
                    <div class="anh">
                        <?= $hinh ?>
                    </div>
                    <div class="image">
                        <?= $anhmota1 ?>
                        <?= $anhmota2 ?>
                    </div>
                </div>
                <div class="thongtin">
                    <h2><?= $product_name ?></h2>

                    <h2 class="gia">Giá: <span style="color: red;"><?= $price ?></span></h2>

                    <h2>Danh mục: <span style="color: red;"><?= $category_name ?></span> </h2>

                    <div class="size">
                        <h2>Size:</h2>
                        <ul>
                            <?php
                            $sizes = load_all_sizes();
                            foreach ($sizes as $size) {
                                $size_id = $size['size_id'];
                                $size_name = $size['size_name'];
                                echo '
                                <ul>
                                    <li value="'.$size_id.'">'.$size_name.',</li>
                                </ul>';
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="quantity">
                        <h2>Số lượng:</h2>
                        <span><?= $quantity ?></span>
                    </div>

                    <div class="mota">
                        <h2>Mô tả: </h2>
                        <span><?= $description ?></span>
                    </div>
                </div>
            </div>

            <div class="binhluan">
                <h2>Quản lý bình luận</h2>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Người Nội dung</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dsbl as $bl) : ?>
                        <tr>
                            <td><?= $bl['id'] ?></td>
                            <td><?= $bl['user_name'] ?></td>
                            <td><?= $bl['noidung'] ?></td>
                            <td><?= $bl['ngaybinhluan'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>