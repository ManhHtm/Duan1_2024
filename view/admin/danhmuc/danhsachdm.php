<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
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

        <h1>Danh sách danh mục</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $categories = load_all_categories();
                    foreach ($categories as $danhmuc) {
                        extract($danhmuc);
        
                        $suadm = "index.php?act=suadm&id=" . $category_id;
                        $xoadm = "index.php?act=xoadm&id=" . $category_id;
                                        
                        echo '<tr>
                            <td>' . $category_id . '</td>
                            <td>' . $category_name . '</td>
                        
                            <td>
                            
                                <a href="' . $suadm . '"><button class="btn btn-info">Sửa</button></a>
                                <a href="' . $xoadm . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\');"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </main>

    <script>
    // JavaScript confirmation for delete operation
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa không?');
    }
    </script>

</body>

</html>