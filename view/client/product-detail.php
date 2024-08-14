<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .img-select img {
        width: 400px;
    }

    .p-px {
        margin-bottom: 10px;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    }

    .img-select {
        margin-right: 10px;
        margin-top: -70px;
    }

    .img-showcase img {
        width: 500px;
    }

    select {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        border-radius: 2px;
    }

    h5 {
        margin-right: 10px;
    }
    </style>
</head>

<body>

    <section class="relative table w-full py-20 lg:py-24 md:pt-28 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1 mt-14">
                <h3 class="text-3xl leading-normal font-semibold">Chi tiết sản phẩm</h3>
            </div>
        </div>
    </section>

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <?php
        extract($onesp);
        ?>
            <form action="index.php?act=giohang" method="post">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-6 items-center">
                    <div class="">
                        <ul class="product-imgs flex list-none items-center">
                            <li>
                                <ul class="img-select list-none">
                                    <?php
                                $hinh = $img_path . $image;
                                $anhmota1 = $img_path . $thumbnail1;
                                $anhmota2 = $img_path . $thumbnail2;
                               
                                echo '  <li class="p-px">
                                            <a href="#" data-id="1">
                                                <img src="'.$hinh.'" class="shadow dark:shadow-gray-800" alt="" name="image">
                                            </a>
                                        </li>
                                        <li class="p-px">
                                            <a href="#" data-id="2">
                                                <img src="'.$anhmota1.'" class="shadow dark:shadow-gray-800" alt="">
                                            </a>
                                        </li>
                                        <li class="p-px">
                                            <a href="#" data-id="3">
                                                <img src="'.$anhmota2.'" class="shadow dark:shadow-gray-800" alt="">
                                            </a>
                                        </li>
                                        '
                                ?>


                                </ul>
                            </li>

                            <li class="img-display shadow dark:shadow-gray-800 m-px">
                                <div class="img-showcase flex w-full duration-500">
                                    <?php
                                $hinh = $img_path . $image;
                                echo '<img src="'.$hinh.'" class="min-w-full" alt="shoe image" >
                                    <img src="'.$anhmota1.'"class="min-w-full" alt="shoe image">
                                    <img src="'.$anhmota2.'" class="min-w-full" alt="shoe image">'
                                ?>


                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="">
                        <h5 class="text-2xl font-semibold" name="name"><?= $product_name ?></h5>
                        <div class="mt-2">
                            <span class=" me-1 text-red-600 font-semibold" name="price"><?= $price ?> <del
                                    class=" text-slate-400 ">$21USD</del></span>
                        </div>

                        <div class="mt-4">
                            <h5 class="text-lg font-semibold">Mô tả :</h5>
                            <p class="text-slate-400 mt-2" name="des"><?= $description ?></p>
                        </div>

                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-4">
                            <div class="flex items-center">
                                <h5 class="text-lg font-semibold mr-2">Size:</h5>
                                <select name="size" id="size" required>
                                    <!-- Thêm thuộc tính required và lớp CSS cho select -->
                                    <option value="" disabled selected>Chọn size sản phẩm</option>
                                    <!-- Đảm bảo rằng option đầu tiên là disabled và không có giá trị hợp lệ -->
                                    <?php
                                        $sizes = load_all_sizes();
                                        foreach ($sizes as $size) {
                                            echo '<option value="' . htmlspecialchars($size['size_id']) . '">' . htmlspecialchars($size['size_name']) . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4 space-x-1">
                            <input type="hidden" name="id" value="<?= $product_id ?>">
                            <input type="hidden" name="name" value="<?= $product_name ?>">
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <input type="hidden" name="des" value="<?= $description ?>">
                            <input type="hidden" name="des" value="<?= $size_name ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <a href="#"
                                class="py-2 px-5 inline-block font-semibold tracking-wide align-middle text-base text-center bg-orange-500 text-white rounded-md mt-2">
                                <input type="submit" value="Thêm vào giỏ hàng" name="addtocart">
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="grid md:grid-cols-12 grid-cols-1 mt-6 gap-6">
                <div class="lg:col-span-3 md:col-span-5">
                    <div class="sticky top-20">
                        <ul class="flex-column p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md"
                            id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li role="presentation">
                                <button
                                    class="px-4 py-2 text-start text-base font-semibold rounded-md w-full mt-3 duration-500"
                                    id="review-tab" data-tabs-target="#review" type="button" role="tab"
                                    aria-controls="review" aria-selected="false">Đánh giá</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-9 md:col-span-7">
                    <div id="myTabContent"
                        class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            $("#binhluan").load("view/client/binhluan/binhluan.php", {
                                id_binhluan: <?=$product_id?>
                            });
                        });
                        </script>

                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12" id="binhluan">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container lg:mt-24 mt-16">
            <div class="grid grid-cols-1 mb-6 text-center">
                <h3 class="font-semibold text-3xl leading-normal">Sản phẩm cùng loại</h3>
            </div>

            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6 pt-6">
                <?php
            if (!empty($sp_cung_loai)) {
                foreach ($sp_cung_loai as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=ctsanpham&idsp=" . $product_id;
                    $hinh = $img_path . $image;
                    echo '<div class="group">
                        <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                            <img src="' . $hinh . '" class="group-hover:scale-110 duration-500" alt="">
                           
                            <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                                <li><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="heart" class="size-4"></i></a></li>
                                <li class="mt-1"><a href="' . $linksp . '" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="eye" class="size-4"></i></a></li>
                                <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="bookmark" class="size-4"></i></a></li>
                            </ul>
                        </div>
            
                        <div class="mt-4">
                            <a href="' . $linksp . '" class="hover:text-orange-500 text-lg font-medium">' . $product_name . '</a>
                            <div class="flex justify-between items-center mt-1">
                                <p>$' . $price . ' <del class="text-slate-400">$21.00</del></p>
                                <ul class="font-medium text-amber-400 list-none">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p>No products found in this category.</p>';
            }
            
            ?>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tìm form và thẻ select
        const form = document.querySelector('form');
        const sizeSelect = form.querySelector('select[name="size"]');

        // Thêm sự kiện submit cho form
        form.addEventListener('submit', function(event) {
            // Kiểm tra giá trị của select
            if (sizeSelect.value === "") {
                alert('Vui lòng chọn size sản phẩm trước khi thêm vào giỏ hàng.');
                event.preventDefault(); // Ngăn chặn việc gửi form
            }
        });
    });
    </script>


</body>

</html>