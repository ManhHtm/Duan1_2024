<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Grid</title>
    <!-- Thêm các stylesheet cần thiết -->
</head>

<body>
    <!-- Start Hero -->
    <section class="relative table w-full py-20 lg:py-24 md:pt-28 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1 mt-14">
                <h3 class="text-3xl leading-normal font-semibold">Sản phẩm </h3>
            </div>
        </div>
    </section>

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
                <?php if (!empty($dssp)) : ?>
                <?php foreach ($dssp as $sp) : ?>
                <?php
                        $linksp = "index.php?act=ctsanpham&idsp=" . $sp['product_id'];
                        $hinh = $img_path . $sp['image'];
                        ?>
                <div class="group">
                    <div
                        class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                        <img src="<?php echo $hinh; ?>" class="group-hover:scale-110 duration-500"
                            alt="<?php echo $sp['product_name']; ?>">
                        <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">

                        </div>
                        <ul
                            class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                            <li><a href="javascript:void(0)"
                                    class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i
                                        data-feather="heart" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="<?php echo $linksp; ?>"
                                    class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i
                                        data-feather="eye" class="size-4"></i></a></li>
                        </ul>
                        <ul class="list-none absolute top-[10px] start-4">
                            <li><a href="javascript:void(0)"
                                    class="bg-orange-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded h-5">-40%
                                    Off</a></li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <a href="<?php echo $linksp; ?>"
                            class="hover:text-orange-500 text-lg font-medium"><?php echo $sp['product_name']; ?></a>
                        <div class="flex justify-between items-center mt-1">
                            <p>$<?php echo $sp['price']; ?><del class="text-slate-400">$21.00</del></p>
                            <ul class="font-medium text-amber-400 list-none">
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <p>Không tìm thấy sản phẩm nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End Product Grid -->
</body>

</html>