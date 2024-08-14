<?php
function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=du_an_1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function pdo_execute($sql, $sql_args = []) {
    try {
        $conn = pdo_get_connection();
        
        $stmt = $conn->prepare($sql);
        foreach ($sql_args as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_execute_return_lastInsertId($sql, $sql_args = []) {
    try {
        $conn = pdo_get_connection();
        
        $stmt = $conn->prepare($sql);
        foreach ($sql_args as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();

        return $conn -> lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_executeid($sql, ...$params)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $lastInsertId = $conn->lastInsertId();

        return $lastInsertId;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query($sql, $params = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        // Đảm bảo rằng $params là mảng trước khi thực thi
        if (!is_array($params)) {
            $params = array($params);
        }
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as associative array
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_query_one($sql, $params = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        // Đảm bảo rằng $params là mảng trước khi thực thi
        if (!is_array($params)) {
            $params = array($params);
        }
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


?>