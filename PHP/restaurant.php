<!DOCTYPE html>
<html>
<head>
    <title>好。食</title>   
	<meta charset="utf-8" />
	
	<style>
		body{
			font-family:Microsoft JhengHei;
		}
	
		table {
			margin-left:auto; 
			margin-right:auto;
			align:"center";
			width: 1200px;
		  border-collapse: collapse;
		}

		table, td, th {
		  border: 1px solid black;
		  padding: 5px;
		}

		th, td {text-align: center;}
		
		
		a:link{
			
			text-decoration:none;
			background-color:#ffffff;
			color:black;
			font-weight:bold;
		}
		a:visited {
			
			color:#ffffff;
			background-color:red;
		}
		a:hover {
			
			text-decoration:underline;
			background-color:#fafafa;
			color:gray;
			font-weight:bold;
		}
		a:active {
			
			text-decoration:none;
			background-color:gray;
			color:#fafafa;
		}
		
		
		
		
	</style>
	
	
	
</head>
<body background="./final.png">
		<h1 align=center>好。食</h1>
		
		<?php
		
			$restaurant = $_GET['restaurant'];
			
				
			$con = mysqli_connect('localhost','root','', 'dbfinal')
					or die("connect fail");
				
				
			mysqli_select_db($con,"dbfinal");
			
			$sql = "SELECT restaurant.name, restaurant.corporate, restaurant.year, restaurant.period_time, restaurant.phone, restaurant.area, restaurant.stars, restaurant.take_out FROM restaurant WHERE restaurant.name = '".$restaurant."'";
				
			$result = mysqli_query($con,$sql);
				
			if(!$result){
				printf("Error : %s\n", mysqli_error($con));
					
			}
				
				
			if(mysqli_num_rows($result) == 0){
				echo "查無資料QQ";
			}
			else{
				echo "<table>
						<tr>
						<th>name</th>
						<th>corporate</th>
						<th>year</th>
						<th>period_time</th>
						<th>phone</th>
						<th>area</th>
						<th>stars</th>
						<th>take_out</th>
						
						</tr>";
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td><a href='"."corporate.php?corporate=" . $row['corporate'] . "'>" . $row['corporate'] . "</a></td>";
					echo "<td>" . $row['year'] . "</td>";
					echo "<td>" . $row['period_time'] . "</td>";
					echo "<td>" . $row['phone'] . "</td>";
					echo "<td>" . $row['area'] . "</td>";
					echo "<td>" . $row['stars'] . "</td>";
					echo "<td>" . $row['take_out'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			mysqli_close($con);
			
			echo "</br>";
			echo "</br>";
			echo "<h3 align=center><a href='DBfinal.php'>回首頁</a></h3>";
		?>
		
		
		
</body>
</html>
