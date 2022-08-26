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

		  echo '<div class = "container">';
		  echo '<div class = "title m-2 p-2"><b>My Planner 2022</b></div>';
		  echo '<div class ="list">';
		  echo '<table class ="table ttodo-list" >';
		  echo '<thead>';
		  echo '<th class ="text-danger">id</th>';
		  echo '<th class ="text-danger">날짜</th>';
		  echo '<th class ="text-danger">요일</th>';
		  echo '<th class ="text-danger">할 일</th>';
		  echo '<th class ="text-danger">삭제</th>';


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
 			
 			
 			echo "<FORM action=deleteEdit.php method=post>\n";
			echo "<input type=hidden name=id value=".$id.">";
			echo '<TD><input type=submit class="btn btn-outline-dark m-1" value=delete></TD>';	
			echo "</Form>\n";


 			echo "</TR>"; 
 		}
 		echo "</table>";
						
		
		
		
		echo "</div>";
		echo "</div>";
		


 	} else { 
 		printf("Could not retrieve records: %s\n", mysqli_error($mysqli)); 
 	} 
 	mysqli_free_result($res); 
 	mysqli_close($mysqli); 
} 
?> 
