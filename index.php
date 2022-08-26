<?php
$mysqli = new mysqli("localhost","eunjicho","2017103032", "Project"); 

if (mysqli_connect_errno()) { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} else { 
	$sql = "SELECT * FROM P_Project ORDER BY time ASC"; 
	
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
		  echo '<div class = "title m-2 p-2"><b>My Planner 2022</b></div>';
		  echo '<div class ="list">';
		  echo '<table class ="table ttodo-list" >';
		  echo '<thead>';
		  echo '<th class ="text-danger">id</th>';
		  echo '<th class ="text-danger">날짜</th>';
		  echo '<th class ="text-danger">요일</th>';
		  echo '<th class ="text-danger">할 일</th>';
		  echo '<th class ="text-danger">선택</th>';


		  while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
		    $id = $newArray['id']; 
 			$time = $newArray['time']; 
 			$day = $newArray['day']; 
			$todo = $newArray['todo']; 
			
		   
		    echo '</th>';
			echo "<TR>";
			echo "<TD>".$id."</TD>";
 			echo "<TD>".$time."</TD>";
 			echo "<TD>".$day."</TD>";
 			echo "<TD>".$todo."</TD>";
 			echo "<TD><CENTER><input type=radio name=id value=$id></CENTER></TD>";

 			


 			
 			echo "</TR>"; 
 		}
 		echo "</table>";
 		
 	    echo "<i><CENTER>완료한 일 하나만 선택 후, 아쉬운 점과 자체 평점을 입력하고 완료 버튼을 눌러주세요. (<a href=finish.php>완료 목록 조회</a>)</CENTER>";
		echo '<div class="input-group flex-nowrap m-1 p-1">';

		
         echo '<div class="input-group-prepend m-1">';
         echo '<span class="input-group-text">아쉬운 점</span>';
         echo '</div>';
         echo '<input type="text" name= "eval" class="form-control m-1" placeholder="아쉬운 점을 입력하세요.">';
         
         echo '<div class="input-group-prepend m-1">';
         echo '<span class="input-group-text">자체 평점</span>';
         echo '</div>';
         echo '<input type="text" name="score" class="form-control m-1" placeholder="만족할수록 높은 숫자를 입력하세요. (ex. 1~10)">';
         
         echo '<center><input type=submit class="btn btn-outline-dark m-1" value=완료></center>'; 
         

         echo '</div>';
         
         
						
         
         
       
		echo '<div class="input-group flex-nowrap m-1 p-1" style="position: fixed; bottom: 30;" >';
		echo "<table border=0>";

		
		echo '<td><a class="form-control m-1" href=insert.html>추가 페이지 이동</a></td>';
		echo '<td><a class="form-control m-1" href=update.php>수정 페이지 이동</a></td>';
		echo '<td><a class="form-control m-1" href=delete.php>삭제 페이지 이동</a></td>';
		
		
				 
		echo "</table>";
		echo "</div>";
		
		
		

		echo "</div>";
		echo "</div>";
		
		
         
        echo "</FORM>";	
        

		


 	} else { 
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res); 
 	mysqli_close($mysqli); 
} 
?> 
