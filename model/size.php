<?php
function load_all_sizes() {
    try {
        $conn = pdo_get_connection(); // Hàm này để lấy kết nối PDO
        $stmt = $conn->query("SELECT * FROM tb_size ORDER BY size_id ASC");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function load_size_name($size_id) {   
    $sql = "SELECT size_name FROM tb_size WHERE size_id = :size_id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([':size_id' => $size_id]);
    $size = $stmt->fetch(PDO::FETCH_ASSOC);
    return $size ? $size['size_name'] : null;
}



?>