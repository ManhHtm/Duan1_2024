<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .xoa {
        margin-left: -100px;
    }

    .bn {
        margin-right: 40px;
    }

    .img img {
        border-radius: 15px 100px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .tbao {
        color: red;
    }
    </style>
</head>

<body>

    <section class="relative table w-full py-20 lg:py-24 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1 mt-14">
                <h3 class="text-3xl leading-normal font-semibold">Giỏ hàng</h3>
            </div>
        </div>
    </section>

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-1">
                <div class="relative overflow-x-auto shadow dark:shadow-gray-800 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-sm uppercase bg-slate-50 dark:bg-slate-800">
                            <tr>
                                <th scope="col" class="p-4 w-4"></th>
                                <th scope="col" class="text-start p-4 min-w-[220px]">Sản phẩm</th>
                                <th scope="col" class="p-4 w-24 min-w-[100px]">Giá</th>
                                <th scope="col" class="p-4 w-24 min-w-[100px]">Size</th>
                                <th scope="col" class="p-4 w-56 min-w-[220px]">Số lượng</th>
                                <th scope="col" class="p-4 w-24 min-w-[100px]">Tổng</th>
                                <th scope="col" class="p-4 w-24 min-w-[100px]">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_SESSION['mycart'])) {
                                    echo '<!-- Debug: Session mycart exists -->';
                                } else {
                                    echo '<!-- Debug: Session mycart does not exist -->';
                                }

                                $tong = 0;
                                $i = 0;
                                if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                                    foreach ($_SESSION['mycart'] as $cart) {
                                        $hinh = $img_path . $cart[4];
                                        $ttien = $cart[2] * $cart[5];
                                        $tong += $ttien;

                                        $xoasp = '<div class="xoa">
                                                    <a href="index.php?act=delcart&idcart=' . $i . '" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center bg-red-600/5 hover:bg-red-600 text-red-600 hover:text-white rounded-full">
                                                        <i data-feather="trash-2" class="h-4 w-4"></i>
                                                    </a>
                                                </div>';

                                        echo '
                                        <tr class="bg-white dark:bg-slate-900">
                                            <td class="p-4">
                                                <a href="#"><i class="mdi mdi-window-close text-red-600"></i></a>
                                            </td>
                                            <td class="p-4">
                                                <span class="flex items-center">
                                                    <img src="' . $hinh . '" class="rounded shadow dark:shadow-gray-800 w-12" alt="T-shirt">
                                                    <span class="ms-3">
                                                        <span class="block font-semibold">' . $cart[1] . '</span>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="p-4 text-center">' . $cart[2] . '</td>
                                            <td class="p-4 text-center">' . $cart[3] . '</td>
                                            <td class="p-4 text-center">
                                                <div class="qty-icons">
                                                    <button class="size-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white minus">-</button>
                                                    <input min="0" name="quantity" type="number" class="h-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white w-16 ps-4 quantity" data-price="' . $cart[2] . '" value="' . $cart[5] . '">
                                                    <button class="size-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white plus">+</button>
                                                </div>
                                            </td>
                                            <td class="p-4 text-end" data-price="' . $ttien . '">' . number_format($ttien, 2) . ' VND</td>
                                            <td class="p-4 text-end">
                                                ' . $xoasp . '
                                            </td>
                                        </tr>';
                                        $i++;
                                    }
                                } else {
                                    echo '<tr class="bg-white dark:bg-slate-900"><td colspan="7" class="p-4 text-center tbao" >Giỏ hàng của bạn đang trống</td></tr>';
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
                <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                    <div class="lg:col-span-9 md:order-1 order-3">
                        <?php
                        if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                            echo'<div class="space-x-1">
                                    <a href="index.php?act=home"
                                        class="py-2 px-5 inline-block font-semibold tracking-wide align-middle text-base text-center bg-orange-500 text-white rounded-md mt-2">Tiếp
                                        tục mua sắm</a>
                                    <a href="index.php?act=hoadon"
                                        class="py-2 px-5 inline-block font-semibold tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white mt-2">Thanh
                                        toán ngay</a>
                            </div>';
                        }else{
                            echo'<div class="space-x-1">
                            <a href="index.php?act=home"
                                class="py-2 px-5 inline-block font-semibold tracking-wide align-middle text-base text-center bg-orange-500 text-white rounded-md mt-2">Tiếp
                                tục mua sắm</a>
                            
                        </div>';
                        }
                        ?>

                    </div>
                    <div class="lg:col-span-3 md:order-2 order-1">
                        <ul class="list-none shadow dark:shadow-gray-800 rounded-md">
                            <li class="flex justify-between p-4">
                                <span class="font-semibold text-lg">Tổng tiền :</span>
                                <td colspan="7" class="p-4 text-end">
                                    <span id="cart-total"><?php echo number_format($tong); ?></span>
                                </td>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                <div class="lg:col-span-5 md:col-span-6 bn img">
                    <img src="assets/images/Design poster.jpg" class="mx-auto d-block" alt="">
                </div>
                <div class="lg:col-span-7 md:col-span-6">
                    <h4 class="font-semibold text-3xl leading-normal my-4">Chúc bạn một ngày mua sắm thật vui vẻ và
                        thoải mái!</h4>
                    <p class="text-slate-400 max-w-xl mb-0">Nếu bạn cần hỗ trợ gì thêm, đừng ngần ngại liên hệ nhé.</p>
                    <br>
                    <div class="lg:col-span-5 md:col-span-6 bn img">
                        <img src="img/bn-nike-3.jpg" class="mx-auto d-block" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('tr').forEach(row => {
                const quantityInput = row.querySelector('input.quantity');
                if (quantityInput) {
                    const quantity = parseInt(quantityInput.value, 10);
                    const price = parseFloat(quantityInput.dataset.price);
                    const itemTotal = quantity * price;
                    total += itemTotal;
                    row.querySelector('td[data-price]').textContent = itemTotal.toFixed(2);
                }
            });
            document.getElementById('cart-total').textContent = total.toFixed(2);
        }

        function handleQuantityChange(e) {
            const quantityInput = e.target;
            const quantity = parseInt(quantityInput.value, 10);
            if (quantity < 0) {
                quantityInput.value = 0;
            }
            updateCartTotal();
        }

        document.querySelectorAll('.minus').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input[type=number]');
                let quantity = parseInt(input.value, 10);
                if (quantity > 1) {
                    input.value = quantity - 1;
                    handleQuantityChange({
                        target: input
                    });
                }
            });
        });

        document.querySelectorAll('.plus').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input[type=number]');
                input.value = parseInt(input.value, 10) + 1;
                handleQuantityChange({
                    target: input
                });
            });
        });

        document.querySelectorAll('input.quantity').forEach(input => {
            input.addEventListener('change', handleQuantityChange);
        });

        updateCartTotal(); // Initial calculation
    });
    </script>






</body>

</html>