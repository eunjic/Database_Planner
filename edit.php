<?php

$id = $_POST['id']; 
$newId = $_POST['newId'];
$time = $_POST['time']; 
$day = $_POST['day']; 
$todo = $_POST['todo']; 
			
$mysqli = new mysqli("localhost","eunjicho","2017103032", "Project"); 


if (mysqli_connect_errno()) { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} else { 
	$sql = "UPDATE P_Project ";
	$sql .= " SET id='".$newId."', time='".$time."', day='".$day."', todo='".$todo."'";
	$sql .= " WHERE id='".$id."'";
	$res = mysqli_query($mysqli, $sql); 
 	if ($res) {
 		echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">';
 		echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>';
 		echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>';
 		echo "<style>
				  @font-face {
				font-family: 'GowunDodum-Regular';
				src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2108@1.1/GowunDodum-Regular.woff') format('woff');
				font-weight: normal;
				font-style: normal;
				}
				
				html, body{
				  font-family: 'GowunDodum-Regular';
				}
				
				.title{
				  font-size: 2em;
				  text-align: center;
				}
				table{
				  text-align: center;
				  width: 1050;
				}
				td{
				  height: 50px;
				  width: 150px;
				}
				
			  </style>";
 		echo '<body><div class="input-group flex-nowrap m-1 p-1">';
 
		echo '<a href=index.php class="form-control m-1" ><CENTER>돌아가기</CENTER></a>';

		echo "</div></body>";
 	} else {
 		echo "<br>fail";
 	}
}
?>

