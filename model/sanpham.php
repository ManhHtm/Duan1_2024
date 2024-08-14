<?php
function add_sanpham($tensp, $giasp, $mota, $iddm, $hinh, $size, $quantity, $anhmota1, $anhmota2) {
    try {
        $sql = "INSERT INTO tb_product (product_name, price, description, category_id, image, size_id, quantity, thumbnail1, thumbnail2) 
                VALUES (:tensp, :giasp, :mota, :iddm, :hinh, :size, :quantity, :anhmota1, :anhmota2)";
        
        $args = [
            'tensp' => $tensp,
            'giasp' => $giasp,
            'mota' => $mota,
            'iddm' => $iddm,
            'hinh' => $hinh,
            'size' => $size,
            'quantity' => $quantity,
            'anhmota1' => $anhmota1,
            'anhmota2' => $anhmota2
        ];
        
        pdo_execute($sql, $args);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}


function loadall_sanpham($kyw="", $iddm=0) {
    $sql = "SELECT p.product_id, p.product_name, p.price, p.image, p.thumbnail1, p.thumbnail2, c.category_name, p.quantity
            FROM tb_product p
            INNER JOIN tb_category c ON p.category_id = c.category_id
            WHERE 1";

    if (!empty($kyw)) {
        $sql .= " AND p.product_name LIKE :kyw";
    }

    if ($iddm > 0) {
        $sql .= " AND p.category_id = :iddm";
    }

    $sql .= " ORDER BY p.product_id ASC";

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);

    if (!empty($kyw)) {
        $stmt->bindValue(':kyw', '%' . $kyw . '%', PDO::PARAM_STR);
    }

    if ($iddm > 0) {
        $stmt->bindValue(':iddm', $iddm, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm xóa sản phẩm
function delete_sanpham($id) {
    try {
        $conn = pdo_get_connection();
        
        $sql_comments = "DELETE FROM tb_binhluan WHERE id_binhluan = :id";
        $stmt = $conn->prepare($sql_comments);
        $stmt->execute(['id' => $id]);

        $sql_product = "DELETE FROM tb_product WHERE product_id = :id";
        $stmt = $conn->prepare($sql_product);
        $stmt->execute(['id' => $id]);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}

// Hàm cập nhật sản phẩm
function update_sanpham($id, $iddm, $name, $price, $des, $hinh, $size, $quantity, $anhmota1, $anhmota2) {
    $sql = "UPDATE tb_product 
            SET category_id = :iddm, 
                product_name = :name, 
                price = :price, 
                image = :hinh, 
                description = :mota, 
                quantity = :quantity, 
                size_id = :size,
                thumbnail1 = :anhmota1,
                thumbnail2 = :anhmota2
            WHERE product_id = :id";
    
    pdo_execute($sql, [
        ':iddm' => $iddm,
        ':name' => $name,
        ':price' => $price,
        ':hinh' => $hinh,
        ':mota' => $des,
        ':quantity' => $quantity,
        ':size' => $size,
        ':anhmota1' => $anhmota1,
        ':anhmota2' => $anhmota2,
        ':id' => $id
    ]);
}

// Hàm lấy sản phẩm theo ID
function load_sanpham_by_id($product_id) {
    $sql = "SELECT p.product_id, p.product_name, p.price, p.image, p.description, p.category_id, p.thumbnail1, p.thumbnail2, c.category_name, s.size_name, p.quantity
            FROM tb_product p
            INNER JOIN tb_category c ON p.category_id = c.category_id
            LEFT JOIN tb_size s ON p.size_id = s.size_id
            WHERE p.product_id = :product_id";
    
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([':product_id' => $product_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Hàm load sản phẩm trang chủ
function loadall_sanpham_home() {
    $sql = "SELECT p.product_id, p.product_name, p.price, p.image, p.thumbnail1, p.thumbnail2, c.category_name, p.quantity
            FROM tb_product p
            INNER JOIN tb_category c ON p.category_id = c.category_id
            ORDER BY p.product_id DESC LIMIT 0, 8";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

// Hàm load sản phẩm cùng loại
function load_sanpham_cungloai($product_id) {
    $current_product = load_sanpham_by_id($product_id);
    $category_id = $current_product['category_id'];

    $sql = "SELECT p.product_id, p.product_name, p.price, p.image, p.thumbnail1, p.thumbnail2, p.description, c.category_name
            FROM tb_product p
            INNER JOIN tb_category c ON p.category_id = c.category_id
            WHERE p.category_id = :category_id AND p.product_id <> :product_id";
    
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category_id' => $category_id, ':product_id' => $product_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm load tất cả sản phẩm trên trang sản phẩm
function loadall_sanpham_sanpham() {
    $sql = "SELECT p.product_id, p.product_name, p.price, p.image, p.thumbnail1, p.thumbnail2, c.category_name, p.quantity
            FROM tb_product p
            INNER JOIN tb_category c ON p.category_id = c.category_id
            ORDER BY p.product_id DESC LIMIT 0, 16";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

// Hàm lấy tên danh mục theo ID
function get_category_name($category_id) {
    $sql = "SELECT category_name FROM tb_category WHERE category_id = :category_id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category_id' => $category_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['category_name'] : null;
}




?>