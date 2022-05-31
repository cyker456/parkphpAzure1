<?php
	include '../config/db.php';
	
	$bno = $_GET['idx'];
	$sql = mq("delete from board where idx='$bno';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/board" />
<script>location.replace('../../index.php');</script>
<!-- alert 알림을 띄우고 그 다음 메인 페이지로 이동. -->