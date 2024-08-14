<?php
function load_all_categories() {
    try {
        $conn = pdo_get_connection(); 
        $stmt = $conn->query("SELECT * FROM tb_category ORDER BY category_id ASC");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function add_danhmuc($name) {
    try {
        $sql = "INSERT INTO tb_category(category_name) VALUES (:name)";
        
        $args = [
            'name' => $name,
        ];
        
        pdo_execute($sql, $args);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}

function delete_danhmuc($id) {
    try {
        $sql = "DELETE FROM tb_category WHERE category_id = :id";
        $args = [
            'id' => $id
        ];
        
        pdo_execute($sql, $args);
        
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}

function load_danhmuc_by_id($category_id) {
    $sql = "SELECT c.category_id, c.category_name
            FROM tb_category c
            WHERE c.category_id = :category_id";
    
    $conn = pdo_get_connection(); 
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category_id' => $category_id]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    return $category;
}

function update_danhmuc($id, $name) {
    $sql = "UPDATE tb_category SET category_name = :name WHERE category_id = :id";
    pdo_execute($sql, ['name' => $name, 'id' => $id]);
}
?>