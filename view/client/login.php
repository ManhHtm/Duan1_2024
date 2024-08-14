<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<!-- Mirrored from shreethemes.in/cartzio/layouts/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 16:46:15 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Cartzio - Fashion Store eCommerce Tailwind CSS Landing Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Fashion Store eCommerce Tailwind CSS Landing Template" name="description">
    <meta content="Shop, Fashion, eCommerce, Cart, Shop Cart, tailwind css, Admin, Landing" name="keywords">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in/">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="1.0.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Css -->
    <!-- Main Css -->
    <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/tailwind.min.css" rel="stylesheet" type="text/css">
    <style>
    h2 {
        margin: 30px 0px;
    }
    </style>
</head>

<body class="dark:bg-slate-900">
    <!-- Loader Start -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader End -->
    <section
        class="md:h-screen py-36 flex items-center bg-orange-500/10 dark:bg-orange-500/20 bg-[url('../../assets/images/hero/bg-shape.html')] bg-center bg-no-repeat bg-cover">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                    <div class="grid md:grid-cols-2 grid-cols-1 items-center">
                        <div class="relative md:shrink-0">
                            <img class="lg:h-full h-full w-full object-cover md:h-[34rem]"
                                src="assets/images/nikeee.jpg" alt="">
                        </div>

                        <form action="index.php?act=dangnhap" method="post">
                            <div class="p-8 lg:px-20">
                                <div class="text-center">
                                    <a href="index.html">
                                        <img src="assets/images/category_id-Photoroom.png"
                                            class="mx-auto block dark:hidden" alt="" width="150px">
                                        <img src="assets/images/logo-light.png" class="mx-auto hidden dark:block"
                                            alt="">
                                    </a>
                                </div>

                                <form class="text-start lg:py-20 py-8">
                                    <div class="grid grid-cols-1">
                                        <h2 style="color: red;">
                                            <?php 
                                            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                                        ?>
                                        </h2>
                                        <div class="mb-4">
                                            <label class="font-semibold" for="LoginEmail">Email:</label>
                                            <input id="LoginEmail" type="email" name="email" required
                                                class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                                placeholder="name@gmail.com">
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-semibold" for="LoginPassword">Mật khẩu:</label>
                                            <input id="LoginPassword" type="password" name="pass" required
                                                class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                                placeholder="Mật khẩu:">
                                        </div>

                                        <!-- <div class="flex justify-between mb-4">

                                        <p class="text-slate-400 mb-0"><a href="forgot-password.html"
                                                class="text-slate-400">Quên mật khẩu ?</a></p>
                                    </div> -->

                                        <div class="mb-4">
                                            <input type="submit"
                                                class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md w-full"
                                                name="dangnhap" value="Đăng nhập">
                                        </div>

                                        <div class="text-center">
                                            <span class="text-slate-400 me-2">Bạn không có tài khoản ?</span> <a
                                                href="index.php?act=dangky"
                                                class="text-black dark:text-white font-bold inline-block">Đăng ký
                                                ngay</a>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section -->

    <div class="fixed bottom-3 end-3">
        <a href="#"
            class="back-button size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-full"><i
                data-feather="arrow-left" class="h-4 w-4"></i></a>
    </div>

    <!-- Switcher -->
    <div class="fixed top-1/4 -left-2 z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>
                <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
            </label>
        </span>
    </div>

    <!-- LTR & RTL Mode Code -->
    <div class="fixed top-[40%] -left-3 z-50">
        <a href="#" id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden">LTR</span>
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>
    <!-- LTR & RTL Mode Code -->

    <!-- JAVASCRIPTS -->
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/plugins.init.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- JAVASCRIPTS -->
</body>

<!-- Mirrored from shreethemes.in/cartzio/layouts/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 16:46:16 GMT -->

</html>