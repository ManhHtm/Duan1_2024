<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
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
    <?php
    if (isset($category) && is_array($category)) {
        extract($category);
    } else {
        $category_name = '';
        $category_id = '';
    }
    ?>
    <main>
        <h2>
            <?php 
            if (isset($suadmthanhcong) && $suadmthanhcong != "") {
                echo "<h2>$suadmthanhcong</h2>";
            }
            ?>
        </h2>
        <h1>Sửa danh mục</h1>
        <a href="index.php?act=danhsachdm">← Quay lại</a>
        <hr>
        <form action="index.php?act=updatedm" method="post">
            <div class="form-add">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($category_name) ?>">
            </div>
            <br>
            <div class="d-grid gap-2">
                <input type="hidden" name="id" value="<?= htmlspecialchars($category_id) ?>">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="capnhat" value="Sửa danh mục">
            </div>
        </form>
    </main>
</body>

</html>