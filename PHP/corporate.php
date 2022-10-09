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
		
			$corporate = $_GET['corporate'];
			
			
			$con = mysqli_connect('localhost','root','', 'dbfinal')
					or die("connect fail");
				
				
			mysqli_select_db($con,"dbfinal");
			
			$sql = "SELECT corporate.name, corporate.chairman, corporate.year FROM corporate WHERE corporate.name = '".$corporate."'";
				
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
						<th>chairman</th>
						<th>year</th>
						
						</tr>";
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['chairman'] . "</td>";
					echo "<td>" . $row['year'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			mysqli_close($con);
			
			echo "</br>";
			
			//另一個
			$con = mysqli_connect('localhost','root','', 'dbfinal')
					or die("connect fail");
				
				
			mysqli_select_db($con,"dbfinal");
			
			$sql = "SELECT restaurant.name FROM restaurant WHERE restaurant.corporate = '".$corporate."'";
				
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
						
						</tr>";
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td><a href='"."restaurant.php?restaurant=" . $row['name'] . "'>" . $row['name'] . "</a></td>";
					
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
