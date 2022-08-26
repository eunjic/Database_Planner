<HTML>
<HEAD><TITLE>완료된 일 목록</TITLE></HEAD>
<BODY>
<?php 
$mysqli = new mysqli("localhost","eunjicho","2017103032", "Project"); 


if (mysqli_connect_errno()) { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} else { 
	$sql = "SELECT * FROM P_Finish INNER JOIN P_Project ON P_Project.id = P_Finish.doID ORDER BY P_Project.time ASC";
	//DESC: 최근 순서대
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

		  echo "<FORM action=finishEdit.php method=get>\n";
		  echo '<div class = "container">';
		  echo '<div class = "title m-2 p-2">Self Assessment</div>';
		  echo '<div class ="list">';
		  echo '<table class ="table ttodo-list" >';
		  echo '<thead>';
		  echo '<th class ="text-danger">id</th>';
		  echo '<th class ="text-danger">날짜</th>';
		  echo '<th class ="text-danger">완료된 일</th>';
		  echo '<th class ="text-danger">아쉬운 점</th>';
		  echo '<th class ="text-danger">자체 평점</th>';

 		
 		while ($newArray = mysqli_fetch_array($res, MYSQLI_NUM)){
			$Fid = $newArray[0];
 			$doID = $newArray[1]; 
 			$score = $newArray[2]; 
 			$eval = $newArray[3]; 
 			
 			$Pid = $newArray[4]; 
 			$day = $newArray[5];  
 			$time = $newArray[6];  
 			$todo = $newArray[7];  
 			
			echo "<TR>";
			echo "<TD><CENTER>".$Pid."</CENTER></TD>";
			echo "<TD><CENTER>".$time."</CENTER></TD>";
 			echo "<TD><CENTER>".$todo."</CENTER></TD>";
 			echo "<TD><CENTER>".$eval."</CENTER></TD>";
 			echo "<TD><CENTER>".$score."</CENTER></TD>";
 			echo "</TR>"; 
 			
 		
		}				
 		echo "</table>";
 		
 		
 		
		echo '<div class="input-group flex-nowrap m-1 p-1">';
 		echo '<a href=index.php class="form-control m-1" ><CENTER>돌아가기</CENTER></a>';
 		echo "</div>";
 			

 		echo "<i><CENTER>첫 화면은 돌아가기를 눌러주세요.</CENTER>";
 		echo "</div>";
 		echo "</div>";
 		
 	
 
 	} else { 
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res); 
 	mysqli_close($mysqli); 
} 
?> 



