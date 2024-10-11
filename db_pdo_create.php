<?php
$dsn = 'mysql:host=localhost;dbname=test';  // 데이터베이스 연결 문자열
$username = 'root';                          // DB 사용자 이름
$password = 'root';                              // DB 비밀번호

try {
    // PDO 인스턴스 생성
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "데이터베이스 연결 성공!";
} catch (PDOException $e) {
    // 데이터베이스가 존재하지 않을 경우 처리
    if ($e->getCode() == 1049) {
        // 데이터베이스 생성 시도
        try {
            $pdo = new PDO("mysql:host=localhost", $username, $password);
            $pdo->exec("CREATE DATABASE test");
            echo "데이터베이스 'test'가 생성되었습니다.";
        } catch (PDOException $e) {
            echo "데이터베이스 생성 실패: " . $e->getMessage();
        }
    } else {
        echo "데이터베이스 연결 실패: " . $e->getMessage();
    }
}
?>
