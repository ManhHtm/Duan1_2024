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
    </style>
</head>

<body>
    <main>
        <h1>Danh sách sản phẩm</h1>
        <hr>

        <!-- Form Tìm kiếm sản phẩm theo từ khóa và danh mục -->
        <form action="index.php?act=danhsachsp" method="post" class="search-form">
            <input type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm" class="search-input">
            <select name="iddm" class="form-select" aria-label="Default select example">
                <option value="0" selected>Tìm sản phẩm theo danh mục</option>
                <?php
                    $categories = load_all_categories();
                    foreach ($categories as $category) {
                        echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Tìm kiếm" name="listok" class="btn btn-warning">
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                if (empty($listsanpham)) {
                    echo '<td colspan="7" class="no-products text-danger"><h5>Không tìm thấy sản phẩm nào!</h5></td>';
                } else {
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $xemsp = "index.php?act=xemsp&id=" . $product_id;
                        $suasp = "index.php?act=suasp&id=" . $product_id;
                        $xoasp = "index.php?act=xoasp&id=" . $product_id;
                        $hinhpath = "./uploads/" . $image;

                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' alt='Product Image'>";
                        } else {
                            $hinh = "No photo";
                        }

                        echo '<tr>
                            <td>' . $product_id . '</td>
                            <td>' . $product_name . '</td>
                            <td>' . $price . '</td>
                            <td class="anhsp">' . $hinh . '</td>
                            <td>' . $category_name . '</td>
                            <td>' . $quantity . '</td>
                            <td>
                                <a href="' . $xemsp . '"><input type="button" value="Xem" class="btn btn-success"></a>
                                <a href="' . $suasp . '"><input type="button" value="Sửa" class="btn btn-info"></a>
                                <a href="' . $xoasp . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\');"><input type="button" value="Xóa" class="btn btn-danger"></a>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>