<?php
session_start();
ob_start();
include "./model/pdo.php";
include "./global.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";
include "./model/size.php";
include "./model/binhluan.php";
include "./model/cart.php";
include "view/client/header.php";

if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew =  loadall_sanpham_home();
$sp =  loadall_sanpham_sanpham();
$dsdm = load_all_categories();

if((isset($_GET['act']))&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {  
        case 'trangchu':
        include "view/client/home.php";
        break;

        case 'sale':
        include "view/client/sale.php";
        break;

        case 'giohang':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {

                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                
                $size_id = $_POST['size']; 
                $size_name = load_size_name($size_id); 
                $image = $_POST['image'];
                $gia = $price;
                $soluong = 1;
                $thanhtien = $soluong * $gia;
                $spadd = [$id, $name, $price, $size_name, $image, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
                header("Location: index.php?act=giohang");
        exit();
                
            }
            
        include "view/client/cart.php";
        break;
        
        case 'dathangtc':
            if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                if(isset($_SESSION['user'])){
                    $user_id = $_SESSION['user']['user_id']; 
                } else {
                    $user_id = 0; 
                }
                
                $name = $_POST['name'];
                $email = $_POST['email'] ;
                $phone = $_POST['phone'] ;
                $pttt = $_POST['pttt'] ?? 1; 
                $address = $_POST['address'] ;
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
        
                // Chèn thông tin đơn hàng
                $idbill = insert_bill($user_id, $name, $address, $phone, $email, $pttt, $ngaydathang, $tongdonhang);
                
                if ($idbill) {
                    // Chèn thông tin giỏ hàng
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($user_id, $cart[0], $cart[4], $cart[1], $cart[2], $cart[5], $cart[6], $idbill);
                    }
                    // Chuyển hướng hoặc hiển thị thông báo thành công
                } else {
                    // Xử lý lỗi nếu không tạo được đơn hàng
                    echo "Không thể tạo đơn hàng. Vui lòng thử lại.";
                    exit;
                }
        
                $_SESSION['mycart'] = [];
            }
            include "view/client/dathangtc.php";
            break;
        
 
        case 'delcart':
            if (isset($_GET['idcart'])) { 
                $idcart = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $idcart, 1); 
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=giohang'); 
            break;
            

        case 'ctdonhang':
         
            $id_bill = isset($_GET['id']) ? intval($_GET['id']) : 0;
            $bill = loadone_bill($id_bill);
            $cart_items = loadall_cart($id_bill);
            include "view/client/ctdonhang.php";
            break;
            

        case 'lichsu':
        
            if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
                $bill_id = intval($_GET['delete_id']);
                $message = delete_order($bill_id); 
            }
            
          
            echo '<script type="text/javascript">';
            echo 'alert("'. addslashes($message) .'");';
            echo '</script>';
            
            include "view/client/ttdonhang.php";
            break;
                
            
        
            
        // sản phẩm
    
        case 'sanpham':
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $dssp = loadall_sanpham("", $iddm);
            } else {
                $dssp = loadall_sanpham();
            }
            include "view/client/shop-grid.php";
            break;
            
        // sản phẩm theo danh mục và tìm kiếm
        case 'sanphamdm':
            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
        
            include "view/client/shop-grid.php";
            break;


            
        case 'ctsanpham':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $product_id = $_GET['idsp'];
                $onesp = load_sanpham_by_id($product_id);
                $sp_cung_loai = load_sanpham_cungloai($product_id);
                include "view/client/product-detail.php";
            } else {
                include "view/client/home.php";
            }
        break;
        
        
        
        case 'gioithieu':
            include "view/client/about.php";
            break;

            
        case 'hoadon':
            include "view/client/check-out.php";
            break;

        // Đăng ký đăng nhập
        case 'dangnhap':
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $checkuser=checkuser($email,$pass);
                if(is_array($checkuser)){
                    $_SESSION['user']=$checkuser;
                    // $thongbao="Đã đăng nhập thành công!";
                    header('Location: index.php?act=dntc');
                    
                }else{
                    $thongbao="Tài khoản không tồn tại!";
                }
            }
            include "view/client/login.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
             
                
                add_taikhoan_client($name, $email, $pass);
                $dktkthanhcong = "Đăng ký tài khoản mới thành công";
            }
            include "view/client/register.php";
            break;

        case 'dangxuat':
            session_unset();
            header('Location: index.php?act=dangnhap');
            break;
            
        case 'dntc':
            include "view/client/dangnhaptc.php";
            break;

        case 'ttkhachhang':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = load_one_taikhoan($_GET['id']);
            } else {
                $taikhoan = null; 
            }
            include "view/client/ttkhachhang.php";
            break;
        
        case 'updatettkhachhang':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['addr'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $suatkthanhcong = "Sửa tài khoản thành công"; 
        
                
                $taikhoan = load_one_taikhoan($id);
            }
            include "view/client/ttkhachhang.php";
            break;
            

        default:
            include "view/client/home.php";
            break;
        }
    }else{
        include "view/client/home.php";
    }

    include "view/client/footer.php";

?>