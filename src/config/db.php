<!-- 이 파일은 db의 데이터를 불러오는 설정 파일이다. -->
<?php
    header('Content-Type: text/html; charset=utf-8'); // utf8 인코딩
    // 불러오는 데이터가 한글이 섞여 있을 경우 반드시 utf8 인코딩으로 설정해야 한다.

    $db = new mysqli("localhost", "root", "", "bbs", "3307");
    /*  mysql 객체를 실행하는 코드. 들어가는 코드는 각각 host(db 서버의 주소), 
        db_id, db_password, database_name, db_port에 속한다.
        password가 없을 경우 빈 문자열로, 포트는 MYSQL 기준 기본값 3306(3306일 경우 아예 생략 가능)
        또한 이 코드는 dev 버전에서 쓰는 코드이므로 클라우드에 올릴 떄는(ops 버전) 반드시 해당 db에 맞게 설정을 바꿔야 한다.
    */

    // $db = new mysqli("parkdb1.mysql.database.azure.com", "prkt4252@parkdb1", "eu023622!@", "bbs", "3306");
    /*
        이 코드는 ops 버전(클라우드 배포 버전)에서 쓰는 코드이다.
        azure mysql의 서버 이름과 id, password, db, port 설정이다.
    */
    $db -> set_charset("utf8");
    // set_charset은 DB 문자열 인코딩 설정이다.

    function mq($sql) {
        global $db;
        return $db -> query($sql);
    }
    // mq() 함수에 문자열인 $sql이 입력될 경우 쿼리를 실행하고 그 값을 반환한다.
    // global은 함수 밖에서 선언된 변수를 함수 안에서 사용할 수 있게 해주는 전역 설정이다.
    
?>

