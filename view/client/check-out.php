<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .bn {
        margin-right: 40px;
    }

    .img img {
        border-radius: 15px 100px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    p {
        color: red;
    }
    </style>
</head>

<body>
    <section class="relative table w-full py-20 lg:py-24 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1 mt-14">
                <h3 class="text-3xl leading-normal font-semibold">Thanh toán</h3>
            </div>
        </div>

    </section>
    <!-- kiem tra xem nguoiwf dungf co dang nhap khong neu co thi hien thong tin neu khong thif de trongs -->
    <?php
    if(isset($_SESSION['user'])){
        $name = $_SESSION['user']['user_name'];
        $email = $_SESSION['user']['email'];
        $phone = $_SESSION['user']['phone'];
        $address = $_SESSION['user']['address'];
    }else{
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
    }

    ?>

    <section class="relative md:py-24 py-16">

        <div class="container relative">
            <form action="index.php?act=dathangtc" method="post">
                <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-6">
                    <div class="lg:col-span-8">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800">
                            <h3 class="text-xl leading-normal font-semibold">Vui lòng điền đầy đủ thông tin </h3>



                            <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-5">




                                <div class="lg:col-span-6">
                                    <label class="form-label font-semibold">Tên người nhận hàng</label>
                                    <div class="relative mt-2">
                                        <span
                                            class="absolute top-0.5 start-0.5 w-9 h-9 text-xl bg-gray-100 dark:bg-slate-800 inline-flex justify-center items-center text-dark dark:text-white rounded"
                                            id="basic-addon1"><i class="mdi mdi-at"></i></span>
                                        <input type="text"
                                            class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                            placeholder="Tên người nhận hàng" required name="name" value="<?=$name?>">
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="form-label font-semibold">Email : <span
                                            class="text-red-600">*</span></label>
                                    <input type="email"
                                        class="w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 mt-2"
                                        placeholder="Email" name="email" required="" value="<?=$email?>">
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="form-label font-semibold">Số điện thoại : <span
                                            class="text-red-600">*</span></label>
                                    <input type="number"
                                        class="w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 mt-2"
                                        placeholder="Số điện thoại nhận hàng" name="phone" required value="<?=$phone?>">
                                </div>

                                <div class="lg:col-span-12">
                                    <label class="form-label font-semibold">Địa chỉ : <span
                                            class="text-red-600">*</span></label>
                                    <input type="text"
                                        class="w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 mt-2"
                                        placeholder="Địa chỉ nhận hàng:" id="address" name="address" required
                                        value="<?=$address?>">
                                </div>


                            </div>


                            <h3 class="text-xl leading-normal font-semibold mt-6" name="pttt">Phương thức thanh toán
                            </h3>



                            <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-5">
                                <div class="lg:col-span-12">
                                    <div class="block">
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                    class="form-radio border-gray-100 dark:border-gray-800 text-orange-500 focus:border-orange-300 focus:ring focus:ring-offset-0 focus:ring-orange-200 focus:ring-opacity-50 me-2"
                                                    name="pttt" value="1" checked>
                                                <span class="text-slate-400">Thanh toán khi nhận hàng</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="block mt-2">
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                    class="form-radio border-gray-100 dark:border-gray-800 text-orange-500 focus:border-orange-300 focus:ring focus:ring-offset-0 focus:ring-orange-200 focus:ring-opacity-50 me-2"
                                                    name="pttt" value="2">
                                                <span class="text-slate-400">Chuyển khoản ngân hàng</span>
                                            </label>
                                        </div>
                                    </div>


                                </div>


                            </div>


                            <div class="mt-4">

                                <input type="submit"
                                    class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md w-full"
                                    value="Xác nhận đặt hàng" name="dongydathang">

                            </div>



                        </div>

                    </div>
                    <!--end col-->

                    <div class="lg:col-span-4">

                        <div class="p-6 rounded-md shadow dark:shadow-gray-800">
                            <div class="flex justify-between items-center">
                                <h5 class="text-lg font-semibold">Sản phẩm của bạn</h5>


                            </div>

                            <div class="mt-4 rounded-md shadow dark:shadow-gray-800">
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
                                    $hinh = $img_path . $cart[5];
                                    $ttien = $cart[2] * $cart[5];
                                    $tong += $ttien;

                                    echo' <div class="p-3 flex justify-between items-center">
                                        <div>
                                            <h5 class="font-semibold">' . $cart[1] . '</h5>
                                            <p class=" font-semibold"  > Size: ' . $cart[3] . '</p>
                                            <p class=" font-semibold"  >x ' . $cart[5] . '</p>
                                        </div>

                                        <p class=" font-semibold"  > ' . $ttien . '</p>
                                    </div>';
                                }
                            }

                            ?>


                                <div
                                    class="p-3 flex justify-between items-center border border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-slate-800 text-green-600">
                                    <div>
                                        <h5 class="font-semibold">Đơn vị vận chuyển</h5>
                                        <p class="text-sm text-green-600">vnexpress</p>
                                    </div>

                                    <p class="text-red-600 font-semibold">0đ</p>
                                </div>
                                <?php
                                echo '<div
                                    class="p-3 flex justify-between items-center border border-gray-100 dark:border-gray-800">
                                    <div>
                                        <h5 class="font-semibold">Tổng hóa đơn</h5>
                                    </div>

                                    <p class="font-semibold">
                                        '.$tong.'
                                    </p>
                                </div>'
                            ?>

                            </div>


                        </div>
                    </div>

                </div>

            </form>

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
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End -->
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