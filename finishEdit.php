<HTML>
<HEAD><TITLE>완료된 일정</TITLE></HEAD>
<BODY>
<?php
$doID = $_GET["id"];
$eval = $_GET["eval"];
$score = $_GET["score"];


$mysqli = new mysqli("localhost","eunjicho","2017103032", "Project"); 

if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
} else {

			
 		$sql = "INSERT INTO P_Finish (doID, eval, score) VALUES ('$doID', '$eval', '$score');";
		$res = mysqli_query($mysqli, $sql);
	if ($res === TRUE) {
		mysqli_close($mysqli);
		include "finish.php";
	} else {
		printf("<p>입력실패: %s\n", mysqli_error($mysqli));
		mysqli_close($mysqli);
		include "index.php";
	}

}
?>
