<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <style>
    main {
        padding: 30px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 50px 50px;
    }

    .form-check-container {
        display: flex;
        flex-wrap: wrap;
    }

    .form-check-inline {
        margin-right: 10px;
        /* Khoảng cách giữa các ô checkbox */
        display: flex;
        align-items: center;
        /* Canh giữa checkbox và nhãn theo chiều dọc */
    }

    h2 {
        color: green;
    }

    .form-add {
        margin: 10px 0px;
    }

    a {
        text-decoration: none;
        font-size: 20px;
        color: #007bff;
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <main>
        <h2>
            <?php 

            if (isset($sanpham) && is_array($sanpham)) {
                extract($sanpham);
            } 
            

            if(isset($themThanhCong)&&($themThanhCong!="")) echo $themThanhCong;
            ?>
        </h2>
        <h1>Thêm sản phẩm</h1>
        <a href="index.php?act=danhsachsp"> ← Quay lại</a>
        <hr>
        <form action="index.php?act=themsp" method="post" enctype="multipart/form-data">
            <div class="form-add">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensp" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" name="giasp" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="mota" required></textarea>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Số lượng</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>


            <div class="form-check-container">
                <label for="" class="form-label">Size: </label>
                <br>
                <?php
                    $sizes = load_all_sizes();
                    foreach($sizes as $size){
                    
                    echo '
                   
                        <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" value="'.$size['size_id'].'" id="size_'.$size['size_id'].'" name="size"/>
                        <label class="form-check-label" for="size_'.$size['size_id'].'">'.$size['size_name'].'</label>
                        </div>';
                    }
                ?>
            </div>



            <div class="form-add">
                <label for="" class="form-label">Danh mục sản phẩm</label>
                <select class="form-select" aria-label="Chọn danh mục sản phẩm" name="iddm" required>
                    <option value="" selected disabled>Chọn danh mục sản phẩm</option>
                    <?php
                        $categories = load_all_categories();
                        foreach ($categories as $category) {
                            echo '<option value="' . htmlspecialchars($category['category_id']) . '">' . htmlspecialchars($category['category_name']) . '</option>';
                        }
                    ?>
                </select>

            </div>

            <div class="form-add">
                <label for="" class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="anhsp" required>
            </div>

            <div class="form-add">
                <label for="" class="form-label">Ảnh mô tả</label><br>
                <input type="file" class="" name="anhmota1">
                <input type="file" class="" name="anhmota2">

            </div>

            <br>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Thêm sản phẩm" name="themmoi">
            </div>
        </form>
    </main>
</body>

</html>