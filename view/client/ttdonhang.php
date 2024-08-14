<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .text-red-500 {
        color: red
    }
    </style>
</head>

<body>
    <section class="relative lg:pb-24 pb-16 md:mt-[84px] mt-[70px]">
        <div class="md:container container-fluid relative">
            <div
                class="relative overflow-hidden md:rounded-md shadow dark:shadow-gray-700 h-52 bg-[url('../../assets/images/hero/pages.html')] bg-center bg-no-repeat bg-cover">
            </div>
        </div>


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
                                        <h5 class="text-lg font-semibold"><?= $user_name?></h5>
                                        <p class="text-slate-400"><?= $email?></p>
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
                    <h5 class="text-lg font-semibold mb-6">Đơn hàng của tôi</h5>
                    <div class="relative overflow-x-auto shadow dark:shadow-gray-800 rounded-md">
                        <table class="w-full text-start text-slate-500 dark:text-slate-400">
                            <thead class="text-sm uppercase bg-slate-50 dark:bg-slate-800">
                                <tr class="text-start">
                                    <th scope="col" class="px-2 py-3 text-start">ID </th>
                                    <th scope="col" class="px-2 py-3 text-start">Tên sản phẩm </th>
                                    <th scope="col" class="px-2 py-3 text-start">Giá sản phẩm</th>
                                    <th scope="col" class="px-2 py-3 text-start">Số điện thoại</th>
                                    <th scope="col" class="px-2 py-3 text-start">Trạng thái</th>
                                    <th scope="col" class="px-2 py-3 text-start">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $listbill = loadall_bill($_SESSION['user']['user_id']);
                                if(is_array($listbill)){
                                    foreach($listbill as $bill){

                                        extract($bill);
                                        
                                        $ttdonhang = get_startus($bill['bill_status']);
                                        echo '<tr
                                                class="bg-white dark:bg-slate-900 text-start border-t border-gray-100 dark:border-gray-700">
                                                <th class="px-2 py-3 text-start" scope="row">'.$bill['id'].'</th>
                                                <td class="px-2 py-3 text-start">'.$bill['name'].'</td>
                                                <td class="px-2 py-3 text-start text-red-600">'.$bill['total'].'</td>
                                                <td class="px-2 py-3 text-start">'.$bill['bill_tel'].'</td>
                                                <td class="px-2 py-3 text-start">'. $ttdonhang.' </td>
                                                <td class="px-2 py-3 text-start">
                                                    <a href="index.php?act=lichsu&delete_id='.$bill['id'].'" 
                                                    class="text-red-500" 
                                                    onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng này?\');">
                                                    Hủy đơn hàng <i class="mdi mdi-chevron-right"></i>
                                                    </a>
                                                     <a href="" class="text-500">
                                                    ||
                                                    </a>
                                                   <a href="index.php?act=ctdonhang&id='.$bill['id'].'" class="text-orange-500">
                                                          Xem đơn hàng
                                                    </a>
                                                    </td>
                                                </tr>';
                                }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>


                </div>
            </div>

        </div>

    </section>
</body>

</html>