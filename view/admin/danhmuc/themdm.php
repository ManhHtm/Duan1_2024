<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
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
    <main>
        <h2>
            <?php 
            if(isset($themdmthanhcong) && $themdmthanhcong != "") {
                echo $themdmthanhcong;
            }
            ?>
        </h2>
        <h1>Thêm danh mục</h1>
        <a href="index.php?act=danhsachdm">← Quay lại</a>
        <hr>
        <form action="index.php?act=themdm" method="post">
            <div class="form-add">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="name">
            </div>

            <br>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="them" value="Thêm danh mục">
            </div>
        </form>
    </main>
</body>

</html>