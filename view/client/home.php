<!-- Start Hero -->
<section class="swiper-slider-hero relative block h-screen" id="home">
    <div class="swiper-container absolute end-0 top-0 w-full h-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide flex items-center overflow-hidden">
                <div
                    class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image bg-red-600/5 flex items-center bg-[url('../../assets/images/hero/bg1.html')] md:bg-top bg-center bg-no-repeat bg-cover;">
                    <img src="img/nike-bn-9.jpg" alt="" width="100%">
                    <!--end container-->
                </div>

                <!-- end slide-inner -->

                <!-- header -->
            </div>
            <!-- end swiper-slide -->

            <div class="swiper-slide flex items-center overflow-hidden">
                <div
                    class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image bg-blue-600/5 flex items-center bg-[url('../../assets/images/hero/bg2.html')] md:bg-top bg-center bg-no-repeat bg-cover;">

                    <img src="img/bn-conver-1.jpg" alt="" width="100%">
                    <!--end container-->
                </div>
                <!-- end slide-inner -->
            </div>
            <!-- end swiper-slide -->
        </div>
        <!-- end swiper-wrapper -->

        <!-- swipper controls -->
        <div class="swiper-pagination"></div>
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- Hero End -->

<!-- Start -->
<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid grid-cols-1 justify-center text-center mb-6">
            <h5 class="font-semibold text-3xl leading-normal mb-4">
                Thương Hiệu
            </h5>
            <p class="text-slate-400 max-w-xl mx-auto">
                Mua sắm các sản phẩm mới nhất từ ​​các thương hiệu nổi tiếng
            </p>
        </div>
        <!--end grid-->



        <div class="grid md:grid-cols-12 grid-cols-1 pt-6 gap-6">
            <div class="lg:col-span-4 md:col-span-6 md:order-1 order-2">
                <div class="relative overflow-hidden group rounded-md shadow dark:shadow-gray-800">
                    <a href="#" class="">
                        <img src="assets/images/Nike SB Dunk Low × Why So Sad Series.jpg"
                            class="h-full w-full object-cover xl:h-[738.66px] lg:h-[614.66px] rounded-md group-hover:scale-110 duration-500"
                            alt="" />
                        <span
                            class="bg-white dark:bg-slate-900 group-hover:text-orange-500 py-2 px-4 rounded-md shadow dark:shadow-gray-800 absolute mx-4 bottom-4 text-lg font-medium">Nike</span>
                    </a>
                </div>
            </div>
            <!--end content-->

            <div class="lg:col-span-4 md:col-span-12 lg:order-2 order-3">
                <div class="grid lg:grid-cols-1 md:grid-cols-2 grid-cols-1 gap-6">
                    <div class="relative overflow-hidden group rounded-md shadow dark:shadow-gray-800">
                        <a href="#" class="">
                            <img src="assets/images/cv-bn.jpg" class="group-hover:scale-110 duration-500" alt="" />
                            <span
                                class="bg-white dark:bg-slate-900 group-hover:text-orange-500 py-2 px-4 rounded-md shadow dark:shadow-gray-800 absolute mx-4 bottom-4 text-lg font-medium">Converse</span>
                        </a>
                    </div>
                    <!--end content-->

                    <div class="relative overflow-hidden group rounded-md shadow dark:shadow-gray-800">
                        <a href="#" class="">
                            <img src="assets/images/ad-bn.jpg" class="group-hover:scale-110 duration-500" alt="" />
                            <span
                                class="bg-white dark:bg-slate-900 group-hover:text-orange-500 py-2 px-4 rounded-md shadow dark:shadow-gray-800 absolute mx-4 bottom-4 text-lg font-medium">Adidas</span>
                        </a>
                    </div>
                    <!--end content-->
                </div>
                <!--end grid-->
            </div>
            <!--end content-->

            <div class="lg:col-span-4 md:col-span-6 lg:order-3 order-2">
                <div class="relative overflow-hidden group rounded-md shadow dark:shadow-gray-800">
                    <a href="#" class="">
                        <img src="assets/images/Graphic Design.jpg"
                            class="h-full w-full object-cover xl:h-[738.66px] lg:h-[614.66px] rounded-md group-hover:scale-110 duration-500"
                            alt="" />
                        <span
                            class="bg-white dark:bg-slate-900 group-hover:text-orange-500 py-2 px-4 rounded-md shadow dark:shadow-gray-800 absolute mx-4 bottom-4 text-lg font-medium">Puma</span>
                    </a>
                </div>
            </div>
            <!--end content-->
        </div>
        <!--end grid-->
    </div>
    <!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 justify-center text-center mb-6">
            <h1 class="font-semibold text-3xl leading-normal mb-4">
                Sản Phẩm
            </h1>
            <p class="text-slate-400 max-w-xl mx-auto">
                Mua sắm các sản phẩm từ ​​các thương hiệu phổ biến nhất
            </p>
        </div>
        <!--end grid-->


        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 pt-6 gap-6">
            <?php
            foreach($spnew as $sanpham){
            extract($sanpham);
            $linksp = "index.php?act=ctsanpham&idsp=" . $product_id ;
            $hinh = $img_path . $image;
            echo '<div class="group">
                <div
                    class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                    <img src="'.$hinh.'"
                        alt="" />

                    

                    <ul
                        class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                        <li>
                            <a href="javascript:void(0)"
                                class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i
                                    data-feather="heart" class="size-4"></i></a>
                        </li>
                        <li class="mt-1">
                            <a href="'.$linksp.'"
                                class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i
                                    data-feather="eye" class="size-4"></i></a>
                        </li>
                       
                    </ul>

                    <ul class="list-none absolute top-[10px] start-4">
                        <li>
                            <a href="javascript:void(0)"
                                class="bg-orange-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded h-5">-40%
                                Off</a>
                        </li>
                    </ul>
                </div>

                <div class="mt-4">
                    <a href="'.$linksp.'" class="hover:text-orange-500 text-lg font-medium">'.$product_name.'</a>
                    <div class="flex justify-between items-center mt-1">
                        <p>$'.$price.' <del class="text-slate-400">$21.00</del></p>
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
        ?>





        </div>

    </div>
    <!--end container-->

    <!--end container-->


    <!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 justify-center text-center mb-6">
            <h5 class="font-semibold text-3xl leading-normal mb-4">
                Phương châm của cửa hàng
            </h5>
            <p class="text-slate-400 max-w-xl mx-auto">
                Lắng nghe nhu cầu và phản hồi của khách hàng để cải thiện sản phẩm và dịch vụ
            </p>
        </div>
        <!--end grid-->

        <div class="flex justify-center relative mt-20">
            <div class="relative lg:w-1/3 md:w-1/2 w-full">
                <div class="absolute -top-20 md:-start-24 -start-0">
                    <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                </div>

                <div class="absolute bottom-28 md:-end-24 -end-0">
                    <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                </div>

                <div class="tiny-single-item">
                    <div class="tiny-slide">
                        <div class="text-center">
                            <p class="text-lg text-slate-400 italic">
                                " Sự hài lòng của khách hàng là lợi nhuận lớn nhất của chúng tôi."
                            </p>

                            <div class="text-center mt-5">
                                <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>

                                <img src="assets/images/Muichiro Tokito.jpg"
                                    class="h-14 w-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="" />
                                <h6 class="mt-2 font-medium">Muichiro Tokito</h6>
                                <span class="text-slate-400 text-sm">Quản lý</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="text-center">
                            <p class="text-lg text-slate-400 italic">
                                " Dịch vụ tốt không chỉ là một nhiệm vụ, mà là một niềm tự hào. "
                            </p>

                            <div class="text-center mt-5">
                                <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>

                                <img src="assets/images/tengen.jpg"
                                    class="h-14 w-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="" />
                                <h6 class="mt-2 font-medium">Uzui Tengen</h6>
                                <span class="text-slate-400 text-sm">Quản lý</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="text-center">
                            <p class="text-lg text-slate-400 italic">
                                " Dịch vụ tuyệt vời không chỉ là đáp ứng nhu cầu mà là vượt qua mong đợi. "
                            </p>

                            <div class="text-center mt-5">
                                <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>

                                <img src="assets/images/mavuongtulen.jpg"
                                    class="h-14 w-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="" />
                                <h6 class="mt-2 font-medium">Tulen</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="text-center">
                            <p class="text-lg text-slate-400 italic">
                                " Dịch vụ khách hàng có nghĩa là giúp khách hàng của bạn nhận hỗ trợ dễ dàng và nhanh
                                chóng – ở thời điểm và theo cách thức họ cần. "
                            </p>

                            <div class="text-center mt-5">
                                <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                </ul>

                                <img src="assets/images/Butterfly.jpg"
                                    class="h-14 w-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="" />
                                <h6 class="mt-2 font-medium">Butterfly</h6>
                                <span class="text-slate-400 text-sm">Manager</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--end grid-->
    </div>
</section>