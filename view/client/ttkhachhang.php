<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .form-container {
        max-width: 100%;
        margin: 0 auto;
    }

    .form-container .form-control {
        width: 100%;
        border: 1px solid gray;
        border-radius: 4px;
    }

    .btn-custom {
        background-color: orangered;
        color: white;
        padding: 4px 20px;
        border-radius: 10px;
    }

    .btn-custom:hover {
        background-color: orange;
    }

    input {
        padding: 0px 10px;
    }

    h2 {
        color: red;
        margin: 10px 0px;
        font-size: 25px;
    }
    </style>
</head>

<body>
    <!-- Start Hero -->
    <section class="relative lg:pb-24 pb-16 md:mt-[84px] mt-[70px]">
        <div class="md:container container-fluid relative">
            <div
                class="relative overflow-hidden md:rounded-md shadow dark:shadow-gray-700 h-52 bg-[url('../../assets/images/hero/pages.html')] bg-center bg-no-repeat bg-cover">
            </div>
        </div>
        <!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="md:flex">
                <div class="lg:w-1/4 md:w-1/3 md:px-3">
                    <div class="relative md:-mt-48 -mt-32">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <div class="profile-pic text-center mb-5">
                                <input id="pro-img" name="profile-image" type="file" class="hidden"
                                    onchange="loadFile(event)" />
                                <div>
                                    <div class="relative h-28 w-28 mx-auto">
                                        <img src="assets/images/user.jpg"
                                            class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800"
                                            id="profile-image" alt="">
                                        <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="text-lg font-semibold"><?= $user_name ?></h5>
                                        <p class="text-slate-400"><?= $email ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 dark:border-gray-700">
                                <ul class="list-none sidebar-nav mb-0 pb-0" id="navmenu-nav">
                                    <li class="navbar-item account-menu">
                                        <a href="index.php?act=lichsu"
                                            class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><i data-feather="airplay" class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Thông tin đơn hàng</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="index.php?act=ttkhachhang"
                                            class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><i data-feather="edit" class="size-4"></i></span>
                                            <h6 class="mb-0 font-medium">Thông tin khách hàng</h6>
                                        </a>
                                    </li>



                                    <li class="navbar-item account-menu">
                                        <a href="index.php?act=dangxuat"
                                            class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><i data-feather="log-out" class="size-4"></i></span>

                                            <h6 class="mb-0 font-medium">Đăng xuất</h6>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-6 md:mt-0">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h1 class="text-lg font-semibold mb-6">Thông tin cá nhân</h1>
                        <br>
                        <h2>
                            <?php
                                if (isset($suatkthanhcong) && $suatkthanhcong != "") {
                                    echo $suatkthanhcong;
                                }
                            ?>
                        </h2>
                        <div class="form-container">
                            <form action="index.php?act=updatettkhachhang" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="name" name="user"
                                        value="<?= $user_name ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" value="<?= $email ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="pass"
                                        value="<?= $password ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="phone" name="tel" value="<?= $phone ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="addr"
                                        value="<?= $address ?>">
                                </div>
                                <input type="hidden" name="id" value="<?= $user_id ?>">
                                <div class="">
                                    <input type="hidden" value="<?=$id?>">
                                    <input type="submit" class="btn btn-custom" name="capnhat" value="Xác nhận">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End Hero -->
</body>

</html>