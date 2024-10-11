<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "데이터베이스 연결 성공!<br>";
} catch (PDOException $e) {
    echo "데이터베이스 연결 실패: " . $e->getMessage();
}

if ($pdo) {
    try {
        $stmt = $pdo->query('SELECT * FROM users');
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo $row['name'] . "<br>"; // 'name' 컬럼이 정확한지 확인하세요
            }
        } else {
            echo "사용자 데이터가 없습니다.";
        }
    } catch (PDOException $e) {
        echo "쿼리 실행 실패: " . $e->getMessage();
    }
}
?>
