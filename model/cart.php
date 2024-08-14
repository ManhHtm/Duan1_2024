<?php
function tongdonhang() {
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart){
        $ttien=$cart[2]*$cart[5];
        $tong+=$ttien;
    }
    return $tong;
}


function insert_bill($user_id, $name, $address, $phone, $email, $pttt, $ngaydathang, $tongdonhang) {
    $sql = "INSERT INTO tb_bill (user_id, bill_name, bill_address, bill_tel, bill_email, bill_pttt, bill_order_date, total)
            VALUES (:user_id, :name, :address, :phone, :email, :pttt, :ngaydathang, :tongdonhang)";
    $sql_args = [
        ':user_id' => $user_id,
        ':name' => $name,
        ':address' => $address,
        ':phone' => $phone,
        ':email' => $email,
        ':pttt' => $pttt,
        ':ngaydathang' => $ngaydathang,
        ':tongdonhang' => $tongdonhang,
    ];
    return pdo_execute_return_lastInsertId($sql, $sql_args);
}



function insert_cart($id_user, $id_pro, $image, $name, $price, $quantity, $total, $id_bill) {
    $sql = "INSERT INTO tb_cart (id_user, id_pro, image, name, price, quantity, total, id_bill)
            VALUES (:id_user, :id_pro, :image, :name, :price, :quantity, :total, :id_bill)";
    $sql_args = [
        ':id_user' => $id_user,
        ':id_pro' => $id_pro,
        ':image' => $image,
        ':name' => $name,
        ':price' => $price,
        ':quantity' => $quantity,
        ':total' => $total,
        ':id_bill' => $id_bill,
    ];
    return pdo_execute($sql, $sql_args);
}

// function loadone_bill($id){
//     $sql = "select *from tb_bill where id=".$id;
//     $bill= pdo_query_one($sql);
//     return $bill;
// }

function loadone_bill($id) {
    $sql = "SELECT * FROM tb_bill WHERE id = :id";
    $params = array(':id' => $id);
    $bill = pdo_query_one($sql, $params);
    return $bill;
}


function loadone_cart($idbill){
    $sql = "select *from tb_cart where id=".$idbill;
    $bill= pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill) {
    $sql = "SELECT * FROM tb_cart WHERE id_bill = :idbill";
    $params = array(':idbill' => $idbill);
    return pdo_query($sql, $params);
}


function loadall_bill($user_id) {
    $sql = "
        SELECT b.*, c.name
        FROM tb_bill b
        LEFT JOIN tb_cart c ON b.id = c.id_bill
        WHERE 1";
    
    // Thêm điều kiện WHERE nếu $user_id lớn hơn 0
    if ($user_id > 0) {
        $sql .= " AND b.user_id = :user_id";
        $params = array(':user_id' => $user_id);
    } else {
        $params = array(); // Không có tham số nếu $user_id không lớn hơn 0
    }

    // Thêm phần ORDER BY sau phần WHERE
    $sql .= " ORDER BY b.id DESC";
    
    // Gọi hàm pdo_query để thực thi câu lệnh SQL
    $listbill = pdo_query($sql, $params);
    
    return $listbill;
}






function get_startus($n) {
  switch($n){
    case '0':
        $tt = "Chờ xác nhận";
        break;

    case '1':
        $tt = "Đã xác nhận";
        break;

    case '2':
        $tt = "Đang giao hàng";
        break;
    
    case '3':
        $tt = "Đã giao hàng";
        break;

    default:
        $tt = "Chờ xác nhận";
        break;
  }
  return $tt;
}


function get_pay($h) {
    switch($h){
      case '1':
          $pp = "Thanh toán khi nhận hàng";
          break;
  
      case '2':
          $pp = "Thanh toán online";
          break;
    
    }
    return $pp;
  }


function delete_order($bill_id) {
    try {
        // Bước 1: Kiểm tra trạng thái của đơn hàng
        $sql_check = "SELECT bill_status FROM tb_bill WHERE id = :bill_id";
        $status = pdo_query_one($sql_check, array(':bill_id' => $bill_id));

        if ($status) {
            $bill_status = $status['bill_status'];
            if ($bill_status == '0' ) { // Chờ xác nhận hoặc đã xác nhận
                // Bước 2: Xóa các mặt hàng trong bảng tb_cart liên quan đến đơn hàng
                $sql_cart = "DELETE FROM tb_cart WHERE id_bill = :bill_id";
                pdo_query($sql_cart, array(':bill_id' => $bill_id));

                // Bước 3: Xóa đơn hàng trong bảng tb_bill
                $sql_bill = "DELETE FROM tb_bill WHERE id = :bill_id";
                pdo_query($sql_bill, array(':bill_id' => $bill_id));

                return "Đơn hàng đã hủy thành công.";
            } else {
                return "Không thể hủy đơn hàng. Đơn hàng của bạn đã được xác nhận.";
            }
        } else {
            return "Đơn hàng không tồn tại.";
        }
    } catch (PDOException $e) {
        return "Lỗi khi xóa đơn hàng: " . $e->getMessage();
    }
}

function sua_donhang($id) {
    $sql = "SELECT * FROM tb_bill WHERE id = ?";
    $result = pdo_query_one($sql, $id);
    return $result;
}



function update_status($bill_status, $id) {
    $sql = "UPDATE tb_bill SET bill_status = :bill_status WHERE id = :id";
    $params = [
        ':bill_status' => $bill_status,
        ':id' => $id
    ];
    pdo_execute($sql, $params);
}


?>