<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
<!-- Mirrored from shreethemes.in/cartzio/layouts/index-fashion-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 16:46:16 GMT -->

<head>
    <meta charset="UTF-8" />
    <title>
        MKT-Shoe
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Fashion Store eCommerce Tailwind CSS Landing Template" name="description" />
    <meta content="Shop, Fashion, eCommerce, Cart, Shop Cart, tailwind css, Admin, Landing" name="keywords" />
    <meta name="author" content="Shreethemes" />
    <meta name="website" content="https://shreethemes.in/" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="version" content="1.0.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- icon gg -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/Muichiro Tokito.jpg" />
    <!-- boostrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <!-- Css -->
    <link href="assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet" />
    <link href="assets/libs/swiper/css/swiper.min.css" rel="stylesheet" />
    <!-- Main Css -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="assets/css/tailwind.min.css" rel="stylesheet" type="text/css" />
    <style>
    /* icon gg */
    .material-symbols-outlined {
        font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'24
    }

    .has-submenu {
        position: relative;
        display: inline-block;
    }

    .submenu img {
        width: 150px;
        height: 80px;
        margin-left: 20px;
    }

    .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 200px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .has-submenu:hover .submenu {
        display: block;
    }

    .submenu ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .submenu li {
        padding: 10px;
    }

    .submenu .megamenu-head {
        font-weight: bold;
        padding: 10px;
        background-color: #f4f4f4;
    }

    .menu-arrow {
        display: inline-block;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #000;
        margin-left: 5px;
        vertical-align: middle;
    }

    .logo img {
        height: 40px;
        width: auto;
        display: block;

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
    <!-- TAGLINE START-->


    <div class="tagline bg-slate-900">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="text-center">
                    <h6 class="text-white font-medium">
                        Ưu đãi lên tới 50% 🎉
                    </h6>
                </div>
            </div>
        </div>

    </div>


    <!--end tagline-->
    <!-- TAGLINE END-->
    <!-- Start Navbar -->
    <nav id="topnav" class="defaultscroll is-sticky tagline-height">
        <div class="container relative">
            <!-- Logo container-->
            <a class="logo" href="index.php?act=home">
                <div>
                    <img src="assets/images/category_id-Photoroom.png" class="h-[30px] inline-block dark:hidden"
                        alt="" />
                    <img src="assets/images/category_id-3-Photoroom.png" class="h-[30px] hidden dark:inline-block"
                        alt="" />
                </div>

            </a>
            <!-- End Logo container-->

            <!-- Start Mobile Toggle -->
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Mobile Toggle -->

            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="dropdown inline-block relative pe-1">
                    <button data-dropdown-toggle="dropdown" class="dropdown-toggle align-middle inline-flex"
                        type="button">
                        <i data-feather="search" class="size-5"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu absolute overflow-hidden end-0 m-0 mt-5 z-10 md:w-52 w-48 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <div class="relative">
                            <form action="index.php?act=sanphamdm" method="post">
                                <input type="text"
                                    class="h-9 px-3 pe-10 w-full border-0 focus:ring-0 outline-none bg-white dark:bg-slate-900 shadow dark:shadow-gray-800"
                                    name="kyw" id="searchItem" placeholder="Search..." />
                                <input type="submit" data-feather="search" class="absolute size-4 top-[9px] end-3"
                                    name="timkiem">
                            </form>
                        </div>
                    </div>
                </li>

                <li class="dropdown inline-block relative ps-0.5">
                    <a href="index.php?act=giohang">
                        <button data-dropdown-toggle="dropdown"
                            class="dropdown-toggle size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-orange-500 border border-orange-500 text-white"
                            type="button">
                            <i data-feather="shopping-cart" class="h-4 w-4"></i>
                        </button>
                    </a>
                    <!-- Dropdown menu -->

                </li>


                <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                ?>
                <li class="dropdown inline-block relative ps-0.5">

                    <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                        <span
                            class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-orange-500 bg-orange-500 text-white"><img
                                src="assets/images/user.jpg" class="rounded-full" alt="" /></span>
                    </button>

                    <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 hidden"
                        onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li>
                                <p class="text-slate-400 pt-2 px-4">Xin chào <?=$user_name ?></p>
                            </li>

                            <li>
                                <a href="index.php?act=lichsu"
                                    class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-orange-500 dark:hover:text-white"><i
                                        data-feather="dollar-sign" class="h-4 w-4 me-2"></i></i> Đơn hàng</a>
                            </li>
                            <li>
                                <a href="index.php?act=ttkhachhang"
                                    class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-orange-500 dark:hover:text-white"><i
                                        data-feather="user" class="h-4 w-4 me-2"></i>Tài khoản</a>
                            </li>
                            <li>
                                <a href="index.php?act=yeuthich"
                                    class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-orange-500 dark:hover:text-white"><i
                                        data-feather="help-circle" class="h-4 w-4 me-2"></i>Yêu thích</a>
                            </li>
                            <!-- <li>
                                <a href="index.php?act=caidat"
                                    class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-orange-500 dark:hover:text-white"><i
                                        data-feather="settings" class="h-4 w-4 me-2"></i>Cài đặt</a>
                            </li> -->
                            <li class="border-t border-gray-100 dark:border-gray-800 my-2"></li>
                            <li>
                                <a href="index.php?act=dangxuat"
                                    class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-orange-500 dark:hover:text-white"><i
                                        data-feather="log-out" class="h-4 w-4 me-2"></i>Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                    } else {
                ?>
                <a href="index.php?act=dangnhap">
                    <span
                        class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-orange-500 bg-orange-500 text-white"><i
                            class="material-symbols-outlined">
                            login
                        </i></span>
                </a>
                <?php } ?>

                <!--  -->

                <!--end dropdown-->
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu parent-menu-item">
                        <a href="index.php?act=trangchu">Trang chủ</a>

                    </li>

                    <li class="has-submenu parent-parent-menu-item">
                        <a href="index.php?act=sanpham">Sản phẩm</a><span class="menu-arrow"></span>

                        <ul class="submenu megamenu">
                            <?php
                            $dsdm = load_all_categories();
                            foreach ($dsdm as $dm){
                                extract($dm);
                                $linkdm="index.php?act=sanphamdm&iddm=".$category_id;
                                echo '<li>
                                        <ul>
                                            <li class="megamenu-head"><a href="'.$linkdm.'" class="sub-menu-item">'.$category_name.'</a></li>
                                        </ul>
                                    </li>';
                            }
                            ?>


                            <img src="./img/nike3.jpg" alt="">
                        </ul>
                    </li>





                    <li><a href="index.php?act=gioithieu" class="sub-menu-item">Giới Thiệu</a></li>
                </ul>
                <!--end navigation menu-->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
    </nav>