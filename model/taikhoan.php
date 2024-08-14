<?php
function checkuser($email, $password)
{
    try {
        $sql = "SELECT * FROM tb_user WHERE email = ? AND password = ?";
        $params = [$email, $password];

        // Gọi hàm pdo_query_one với các tham số
        $user = pdo_query_one($sql, $params);

        return $user; 
    } catch (PDOException $e) {
        throw $e;
    }
}


function add_taikhoan($name, $email, $pass,$phone,$addr) {
    try {
        $sql = "INSERT INTO tb_user (user_name,email, password,phone,address) VALUES (:name, :email, :pass, :phone, :addr)";
        
        $args = [
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
            'phone' => $phone,
            'addr' => $addr,
            
        ];
        
        pdo_execute($sql, $args);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}

function add_taikhoan_client($name, $email, $pass) {
    try {
        $sql = "INSERT INTO tb_user (user_name,email, password) VALUES (:name, :email, :pass)";
        
        $args = [
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
            
            
        ];
        
        pdo_execute($sql, $args);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}

function loadall_taikhoan($kyw="", $iddm=0){
    $sql = "SELECT user_id, user_name, email, password, phone, address
            FROM tb_user
            WHERE 1";

    if (!empty($kyw)) {
        $sql .= " AND user_name LIKE '%" . $kyw . "%'";
    }

    $sql .= " ORDER BY user_id ASC";

    $list_taikhoan = pdo_query($sql); 
    return $list_taikhoan;
}

function delete_taikhoan($id) {
    try {
        $sql_comments = "DELETE FROM tb_binhluan WHERE id_user = :id";
        $args_comments = [
            'id' => $id
        ];
        pdo_execute($sql_comments, $args_comments);

        $sql_user = "DELETE FROM tb_user WHERE user_id = :id";
        $args_user = [
            'id' => $id
        ];
        pdo_execute($sql_user, $args_user);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}


function load_one_taikhoan($user_id) {
    $sql = "SELECT * FROM tb_user WHERE user_id = :user_id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([':user_id' => $user_id]);
    $taikhoan = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $taikhoan;
}


function update_taikhoan($id, $user, $pass, $email, $address, $tel) {
    $sql = "UPDATE tb_user SET user_name = :user, password = :pass, email = :email, address = :address, phone = :tel WHERE user_id = :id";
    
    $args = [
        'user' => $user,
        'pass' => $pass,
        'email' => $email,
        'address' => $address,
        'tel' => $tel,
        'id' => $id
    ];

    pdo_execute($sql, $args);
}

?>