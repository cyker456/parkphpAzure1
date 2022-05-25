<?php

    include '../config/db.php';

    // 각 변수에 write.php에서 넘어온 input name 값들을 저장한다.
    $username = $_POST['name'];
    $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d'); // 날짜에는 현재 날짜를 저장한다.

    $tmpfile =  $_FILES['b_file']['tmp_name'];
    $o_name = $_FILES['b_file']['name'];
    $filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
    $folder = "../../public/upload/".$filename;
    move_uploaded_file($tmpfile,$folder);

    $mqq = mq("alter table board auto_increment =1"); //auto_increment 값 초기화

    // 만약 넘어온 값들이 Null이 아니라면 이 문장 실행
    if($username && $userpw && $title && $content) {
        $sql = mq("insert into board(name, pw, title, content, date,file) values ('".$username."','".$userpw."','".$title."','".$content."','".$date."','".$o_name."')");
        echo "<script>;
        alert('글쓰기 완료되었습니다.');
        location.href='/board';</script>";
        // location.href는 JS에서 링크할 페이지로 돌아가는 함수이다. 기본값이 localhost이므로 /board를 더 쳐줘야 index.php로 돌아간다.
    // 만약 하나라도 null이라면 
    } else {
        echo "<script>
        alert('글쓰기에 실패했습니다.');
        history.back();</script>";
    }

?>
