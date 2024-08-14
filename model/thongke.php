<?php

function get_product_count_by_category() {
    $sql = "
        SELECT tb_category.category_name AS cate_name, COUNT(tb_product.category_id) AS number_cate 
        FROM tb_category 
        LEFT JOIN tb_product ON tb_category.category_id = tb_product.category_id 
        GROUP BY tb_category.category_id
    ";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return []; 
    }
}

function loadall_thongke() {
    $sql = "
    SELECT 
        tb_category.category_id as madm, 
        tb_category.category_name as tendm, 
        
        COUNT(tb_product.product_id) AS countsp, 
        MIN(tb_product.price) AS minprice, 
        MAX(tb_product.price) AS maxprice, 
        AVG(tb_product.price) AS avgprice
    FROM 
        tb_product 
    LEFT JOIN 
        tb_category ON tb_category.category_id = tb_product.category_id 
    GROUP BY 
        tb_category.category_name
    ORDER BY 
        tb_category.category_id DESC";

    // Gọi hàm pdo_query để thực thi câu lệnh SQL
    $listtk = pdo_query($sql);

    return $listtk;
}


?>