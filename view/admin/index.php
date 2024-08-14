<?php
session_start();
ob_start();
include "./header.php";
include "../../model/pdo.php";
include "../../model/sanpham.php";
include "../../model/danhmuc.php";
include "../../model/size.php";
include "../../model/taikhoan.php";
include "../../model/binhluan.php";
include "../../model/thongke.php";
include "../../model/cart.php";
include "../../global.php";


if (!isset($_SESSION['s_user']) || !is_array($_SESSION['s_user']) || $_SESSION['s_user']['role'] != 1) {
    header("Location: login.php");
    exit; 
}
$admin = $_SESSION['s_user'];

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        //đơn hàng
        case 'dsdonhang':
            $listbill = loadall_bill(0);
            include "./donhang/dsdonhang.php";
            break;

        case 'suatt':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id']; // Đảm bảo biến $id được định nghĩa
                $suadonhang = sua_donhang($id);
            } else {
                echo "Mã đơn hàng không hợp lệ.";
                exit();
            }
            include "./donhang/suatt.php";
            break;
            
        case "update_tt":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $suadonhang = sua_donhang($id);
            
                if ($suadonhang) {
                    $bill_status = $suadonhang['bill_status'];
                } else {
                    echo "Mã đơn hàng không hợp lệ.";
                    exit();
                }
            
                if (isset($_POST['suadonhang'])) {
                    $bill_status = $_POST['bill_status'];
                    update_status($bill_status, $id);
                    
                }
                $suaThanhCong = "Sửa trạng thái thành công";
                include "./donhang/suatt.php";
            } else {
                echo "Mã đơn hàng không hợp lệ.";
            }
            
            break;
            
            
        case 'xemct':
            // Lấy ID đơn hàng từ URL
            $id_bill = isset($_GET['id']) ? intval($_GET['id']) : 0;

            // Kiểm tra và lấy thông tin hóa đơn
            $bill = loadone_bill($id_bill);

            // Kiểm tra và lấy các mặt hàng trong hóa đơn
            $cart_items = loadall_cart($id_bill);
            include "./donhang/xemct.php";
            break;

        //thống kê
        case 'thongke':
            // require_once 'thongke.php';
            $data = get_product_count_by_category();
            include "thongke.php";
            break;

        case 'bieudo':
            // require_once 'thongke.php';
            $data = get_product_count_by_category();
            include "bieudo.php";
            break;

        //Sản phẩm
        case 'themsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['tensp'];
                $price = $_POST['giasp'];
                $des = $_POST['mota'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];
                if (isset($_POST['iddm'])) {
                    $iddm = $_POST['iddm'];
                } else {
                    echo "Dữ liệu danh mục không được gửi đến.";
                }
        
                $hinh = $_FILES['anhsp']['name'];
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($hinh);
                
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["anhsp"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                
                //ảnh mô tả
                if (isset($_FILES['anhmota1']) && $_FILES['anhmota1']['error'] == UPLOAD_ERR_OK) {
                    $anhmota1 = $_FILES['anhmota1']['name'];
                    $target_file1 = $target_dir . basename($anhmota1);
                    move_uploaded_file($_FILES["anhmota1"]["tmp_name"], $target_file1);
                } else {
                    $anhmota1 = null;
                }
                
                if (isset($_FILES['anhmota2']) && $_FILES['anhmota2']['error'] == UPLOAD_ERR_OK) {
                    $anhmota2 = $_FILES['anhmota2']['name'];
                    $target_file2 = $target_dir . basename($anhmota2);
                    move_uploaded_file($_FILES["anhmota2"]["tmp_name"], $target_file2);
                } else {
                    $anhmota2 = null; 
                }
                add_sanpham($name, $price, $des, $iddm, $hinh, $size, $quantity, $anhmota1, $anhmota2);
                $themThanhCong = "Thêm sản phẩm mới thành công";
            }
            include "./sanpham/themsp.php";
            break;
        

            case 'danhsachsp':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = '';
                    $iddm = 0;
                }
                
                $listdanhmuc = load_all_categories();
                $listsanpham = loadall_sanpham($kyw, $iddm);
            
                if (empty($listsanpham)) {
                    $thongbao = "Không tìm thấy sản phẩm nào!";
                }
                
                include "./sanpham/danhsachsp.php";
                break;
            
            
            

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
        $listsanpham = loadall_sanpham("", 0);
        include "./sanpham/danhsachsp.php";
        break;

        case 'xemsp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = load_sanpham_by_id($_GET['id']);
            }
        $listdanhmuc = load_all_categories();
        include "./sanpham/chitietsp.php";
        break;


        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = load_sanpham_by_id($_GET['id']);
            }
        $listdanhmuc = load_all_categories();
        include "./sanpham/suasp.php";
        break;


        case 'updatesp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $name = $_POST['tensp'];
                $price = $_POST['giasp'];
                $des = $_POST['mota'];
                $size = isset($_POST['size']) ? implode(',', $_POST['size']) : '';
                $quantity = $_POST['quantity'];
                $id = $_POST['id'];
        
                if (isset($_POST['iddm'])) {
                    $iddm = $_POST['iddm'];
                } else {
                    echo "Dữ liệu danh mục không được gửi đến.";
                    break;
                }
        
                // Lấy thông tin sản phẩm hiện tại từ database
                $sanpham = load_sanpham_by_id($id);
                $hinh = $sanpham['image'];
                $anhmota1 = $sanpham['thumbnail1'];
                $anhmota2 = $sanpham['thumbnail2'];
        
                //  ảnh chính
                if ($_FILES['anhsp']['name'] != "") {
                    $hinh = $_FILES['anhsp']['name'];
                    $target_file = "./uploads/" . basename($hinh);
                    if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                        // Hình ảnh đã được upload thành công
                    }
                }
        
                //  ảnh mô tả 1
                if ($_FILES['anhmota1']['name'] != "") {
                    $anhmota1 = $_FILES['anhmota1']['name'];
                    $target_file_anhmota1 = "./uploads/" . basename($anhmota1);
                    if (move_uploaded_file($_FILES["anhmota1"]["tmp_name"], $target_file_anhmota1)) {
                      
                    }
                }
        
                // ảnh mô tả 2
                if ($_FILES['anhmota2']['name'] != "") {
                    $anhmota2 = $_FILES['anhmota2']['name'];
                    $target_file_anhmota2 = "./uploads/" . basename($anhmota2);
                    if (move_uploaded_file($_FILES["anhmota2"]["tmp_name"], $target_file_anhmota2)) {
                        
                    }
                }
        
                
                update_sanpham($id, $iddm, $name, $price, $des, $hinh, $size, $quantity, $anhmota1, $anhmota2);
                $suaThanhCong = "Sửa sản phẩm thành công";
            }
        
            $listsanpham = loadall_sanpham("", 0);
            $categories = load_all_categories();
            include "./sanpham/suasp.php";
            break;
        
        
        
        
        

        // Đăng nhập - đăng xuất
        case 'dangnhap':
        include "./login.php";
        break;

        case 'thoat':
            if (isset($_GET['act']) && $_GET['act'] == 'thoat') {
                $_SESSION = array();
            
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }
                session_destroy();
                header("Location: login.php");
                exit;
            }
        include "./login.php";
        break;
        
        // Danh mục
        case 'themdm':
            if (isset($_POST['them']) && ($_POST['them'])) {
                $name = $_POST['name'];
                
                
                add_danhmuc($name);
                $themdmthanhcong = "Thêm danh mục thành công";
            }
        include "./danhmuc/themdm.php";
        break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
        $categories = load_all_categories();
        include "./danhmuc/danhsachdm.php";
        break;
            

        case 'danhsachdm':
            $categories = load_all_categories();
           
        include "./danhmuc/danhsachdm.php";
        break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $category = load_danhmuc_by_id($_GET['id']);
            } else {
                $category = null; 
            }
        include "./danhmuc/suadm.php";
        break;
            
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                update_danhmuc($id, $name);
                $suadmthanhcong = "Sửa danh mục thành công";
            } 
            $categories = load_all_categories();
        include "./danhmuc/suadm.php";
        break;

        // Tài khoản
        case 'themtk':
            if (isset($_POST['them']) && ($_POST['them'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $phone = $_POST['phone'];
                $addr = $_POST['addr'];
                
                add_taikhoan($name, $email, $pass, $phone, $addr);
                $dktkthanhcong = "Thêm tài khoản mới thành công";
            }
        include "./taikhoan/themtk.php";
        break;

        case 'danhsachtk':
            $listtaikhoan = loadall_taikhoan(); 
        include "./taikhoan/danhsachtk.php"; 
        break;

        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']); 
            }
            $listtaikhoan = loadall_taikhoan();
        include "./taikhoan/danhsachtk.php";
        break;
        
        case 'xemtk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $user_id = $_GET['id'];
                $taikhoan = load_one_taikhoan($user_id); 
            }
          
        include "./taikhoan/chitiettk.php";
        break;
            
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = load_one_taikhoan($_GET['id']);
            } else {
                $taikhoan = null; 
            }
        include "./taikhoan/suatk.php";
        break;
            

        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['addr'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $suatkthanhcong = "Sửa tài khoản thành công"; 
            }
        include "./taikhoan/suatk.php";
        break;
            
        //Bình luận
        
        case 'dinhluan':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = load_one_taikhoan($_GET['id']);
            } else {
                $taikhoan = null; 
            }
        include "./sanpham/chitietsp.php";
        break;
        
        default:
            include "thongke.php";
            break;
    }
} else {
    include "thongke.php";
}

include "./footer.php";
?>