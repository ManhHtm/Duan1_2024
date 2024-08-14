<?php
session_start();
$id_binhluan = $_REQUEST['id_binhluan'];
include "../../../model/pdo.php";
include "../../../model/binhluan.php";
$dsbl = loadall_binhluan($id_binhluan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php 
        if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noidung = $_POST['noidung'];
            $id_binhluan = $_POST['id_binhluan'];
            $id_user = $_SESSION['user']['user_id'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung,$id_user,$id_binhluan,$ngaybinhluan);
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
        <?php
        foreach($dsbl as $ds){
            extract($ds);
            echo '
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <img src="assets/images/user.jpg" class="h-11 w-11 rounded-full shadow" alt="">
                    <div class="ms-3 flex-1">
                        <a href="#" class="text-lg font-semibold hover:text-orange-500 duration-500">' . $user_name . '</a>
                        
                    </div>
                </div>
               
            </div>
            <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                <ul class="list-none inline-block text-orange-400">
                    
                    <li class="inline text-slate-400 font-semibold">' . $ngaybinhluan . '</li>
                </ul>
                <p class="text-slate-400 italic">"' . $noidung . '"</p>
            </div>
            <br>';
        }
        ?>
    </div>

    <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
        <?php
            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
        ?>
        <h5 class="text-lg font-semibold">Để lại bình luận :</h5>
        <form id="commentForm" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <div class="grid grid-cols-1">
                <div class="mb-5">
                    <div class="text-start">
                        <!-- <label for="comments" class="font-semibold">Đánh giá:</label> -->
                        <div class="form-icon relative mt-2">
                            <textarea id="comments" class="w-full py-2 px-3 h-28" placeholder="Message :" name="noidung"
                                required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_binhluan" value="<?= $id_binhluan ?>" />
            <input type="submit" id="submit" name="guibinhluan" class="py-2 px-5 bg-orange-500 text-white"
                value="Gửi bình luận" />
        </form>
        <?php }else{ ?>
        <h5 class="text-lg font-semibold" style="text-align: center; color: red;"><a href="index.php?act=dangnhap">Vui
                lòng đăng
                nhập để được bình
                luận →</a></h5>
        <?php
            } 
        ?>
    </div>
</body>

</html>