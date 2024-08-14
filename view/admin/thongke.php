<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bảng điều khiển</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Bảng điều khiển</li>
            </ol>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá cáo nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>
                <thead>
                    <?php
                        $listtk =   loadall_thongke();
                            foreach($listtk as $tk){
                                extract($tk);
                                echo '
                                <tr>
                                    <td>'.$madm.'</td>
                                    <td>'.$tendm.'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.$minprice.'</td>
                                    <td>'.$maxprice.'</td>
                                    <td>'.$avgprice.'</td>
                                </tr>
                                ';
                        }
                    ?>
                </thead>
            </table>
            <a href="index.php?act=bieudo" class="btn btn-success">Xem biểu đồ</a>
            <br>



        </div>
    </main>
</body>

</html>