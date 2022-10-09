<!DOCTYPE html>
<html>
<div class="center">
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
		
		.center{
		  text-align: center;
		}
		
	</style>
	
	
	
</head>

<body background="./final.png";>


    <h1>好。食</h1>
    <h2>請輸入查詢條件</h2>

		<form id="form"  method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
			<h3>
				餐廳種類
				<select name="restaurant" id="restaurant">
					<option value="0">種類</option>
					<option value="餃子類">餃子類</option>
					<option value="麵類">麵類</option>
					<option value="飯類">飯類</option>
					<option value="排餐">排餐</option>
					<option value="速食類">速食類</option>
					<option value="鍋類">鍋類</option>
					<option value="湯品">湯品</option>
					<option value="沙拉">沙拉</option>
					<option value="吃到飽">吃到飽</option>

				</select>
				
				
				&nbsp;&nbsp;&nbsp;

				查詢各國菜色
				<select name="country" id="country">
					<option value="0">國家</option>
					<option value="台灣">台灣</option>
					<option value="西班牙">西班牙</option>
					<option value="義大利">義大利</option>
					<option value="英國">英國</option>
					<option value="美國">美國</option>
					<option value="法國">法國</option>
					<option value="韓國">韓國</option>
					<option value="日本">日本</option>
					<option value="泰國">泰國</option>
					<option value="馬來西亞">馬來西亞</option>
					<option value="新加坡">新加坡</option>
					<option value="印度">印度</option>
					<option value="中國">中國</option>
					<option value="越南">越南</option>
					<option value="緬甸">緬甸</option>
					<option value="德國">德國</option>
				</select>

			   

				&nbsp;&nbsp;&nbsp;

				所在區域
				<select name="area" id="area">
					<option value="0">區域</option>
					<option value="北區">北區</option>
					<option value="中區">中區</option>
					<option value="西區">西區</option>
					<option value="南區">南區</option>
					<option value="北屯區">北屯區</option>
					<option value="西屯區">西屯區</option>
					<option value="南屯區">南屯區</option>
					<option value="大里區">大里區</option>
					<option value="沙鹿區">沙鹿區</option>
					<option value="龍井區">龍井區</option>
					<option value="大雅區">大雅區</option>
					<option value="后里區">后里區</option>
					<option value="太平區">太平區</option>
					<option value="神岡區">神岡區</option>

				</select>

				&nbsp;&nbsp;&nbsp;

				營業時間
				<select name="time" id="time">
					<option value="0">時間</option>
					<option value="1">一</option>
					<option value="2">二</option>
					<option value="3">三</option>
					<option value="4">四</option>
					<option value="5">五</option>
					<option value="6">六</option>
					<option value="7">日</option>
				</select>

				&nbsp;&nbsp;&nbsp;

				評價幾顆星
				<select name="star" id="star">
					<option value="0">0顆星以上</option>
					<option value="1">1顆星以上</option>
					<option value="2">2顆星以上</option>
					<option value="3">3顆星以上</option>
					<option value="4">4顆星以上</option>
				</select>

				&nbsp;&nbsp;&nbsp;

				可否外帶
				<select name="takeout" id="takeout">
					<option value="0">都可以</option>
					<option value="Y">Y</option>
					<option value="N">N</option>
					
				</select>
				
				&nbsp;&nbsp;&nbsp;
				<input type="submit" value="查詢">
			</h3>
		</form>
		
		
		<br>
		
		
		<?php
		
			
			
			if(isset($_POST['restaurant']) && isset($_POST['country']) && isset($_POST['area']) && isset($_POST['time']) && isset($_POST['star']) && isset($_POST['takeout']))
			{
				
				$restaurant = $_POST['restaurant'];
				$country = $_POST['country'];
				$area = $_POST['area'];
				$time = $_POST['time'];
				$star = $_POST['star'];
				$takeout = $_POST['takeout'];
				
				$con = mysqli_connect('localhost','root','', 'dbfinal')
						or die("connect fail");
						
						
				if($restaurant == 0){
					$restaurant = "in (SELECT DISTINCT kinds FROM menu)";
				}
				else{
					$restaurant = "='".$restaurant."'";
				}
				
				if($country == 0){
					$country = "in (SELECT DISTINCT country FROM menu)";
				}
				else{
					$country = "='".$country."'";
					
				}
				if($area == 0){
					$area = "in (SELECT DISTINCT area FROM restaurant)";
				}
				else{
					$area = "='".$area."'";
				}
				
				
				if($star == 0){
					$star = "in (SELECT DISTINCT stars FROM restaurant)";
				}
				else{
					$star = ">".$star;
				}
				
				
				if($takeout == 0){
					$takeout = "in (SELECT DISTINCT take_out FROM restaurant)";
				}
				else{
					$takeout = "='".$takeout."'";
				}
				
				
				mysqli_select_db($con,"dbfinal");
				//$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu NATURAL JOIN competition WHERE menu.kinds ="."'".$restaurant."' and menu.country="."'".$country."' and restaurant.area="."'".$area."' and period_time LIKE'%"."".$time."%' and restaurant.stars >"."".$star." and restaurant.take_out="."'".$takeout."'";
				//$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu NATURAL JOIN competition WHERE menu.kinds in (SELECT DISTINCT kinds FROM menu) and menu.country="."'".$country."' and restaurant.area="."'".$area."' and period_time LIKE'%"."".$time."%' and restaurant.stars >"."".$star." and restaurant.take_out="."'".$takeout."'";
				//$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu NATURAL JOIN competition WHERE menu.kinds in (SELECT DISTINCT kinds FROM menu) and menu.country in (SELECT DISTINCT country FROM menu) and restaurant.area in (SELECT DISTINCT area FROM restaurant) and restaurant.stars in (SELECT DISTINCT stars FROM restaurant) and restaurant.take_out in (SELECT DISTINCT take_out FROM restaurant)";
				if($time == 0){
					//$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu NATURAL JOIN competition WHERE menu.kinds ".$restaurant." and menu.country ".$country." and restaurant.area ".$area." and restaurant.stars ".$star." and restaurant.take_out ".$takeout."";
					$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu,competition WHERE menu.dish_id = competition.dishes_id and menu.kinds ".$restaurant." and menu.country ".$country." and restaurant.area ".$area." and restaurant.stars ".$star." and restaurant.take_out ".$takeout."";

				}
				else{
					//$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu NATURAL JOIN competition WHERE menu.kinds ".$restaurant." and menu.country ".$country." and restaurant.area ".$area." and period_time LIKE'%"."".$time."%' and restaurant.stars ".$star." and restaurant.take_out ".$takeout."";
					$sql = "SELECT restaurant.name, dishes, price, competition_name_and_ranking FROM restaurant NATURAL JOIN menu,competition WHERE menu.dish_id = competition.dishes_id and menu.kinds ".$restaurant." and menu.country ".$country." and restaurant.area ".$area." and period_time LIKE'%"."".$time."%' and restaurant.stars ".$star." and restaurant.take_out ".$takeout."";

				}
				
				
				$result = mysqli_query($con,$sql);
				
				if(!$result){
					printf("Error : %s\n", mysqli_error($con));
					
				}
				
				
				if(mysqli_num_rows($result) == 0){
					echo "查無資料QQ";
				}
				else{
					echo "<div margin:0px auto;>";
					echo "<table>
						<tr>
						<th>restaurant</th>
						<th>dishes</th>
						<th>price</th>
						<th>competition_name_and_ranking</th>
						
						</tr>";
						while($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td><a href='"."restaurant.php?restaurant=" . $row['name'] . "'>" . $row['name'] . "</a></td>";
							echo "<td>" . $row['dishes'] . "</td>";
							echo "<td>" . $row['price'] . "</td>";
							echo "<td>" . $row['competition_name_and_ranking'] . "</td>";
							echo "</tr>";
						}
					echo "</table>";
					echo "</div>";
				}
				mysqli_close($con);
			
			}
		?>
		
		
	
</body>
</div>
</html>
