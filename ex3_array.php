<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bài 3 - Mảng</title>
</head>
<body>
	<?php
		$numOE = 0;
		$min = 0;
		$max = 0;
		$sum = 0;
		$str_arr = "";
		function createArray($n)
		{
			$arr = array();
			for($i = 0; $i < $n; $i++)
				$arr[$i] = rand(0,20);
			return $arr;
		} 
		function convertArr2Str($arr)
		{
			$str_arr = implode(",", $arr);
			return $str_arr;
		}
		function maxValue($arr)
		{
			$max = $arr[0];
			for($i = 1; $i < count($arr); $i++)
				if($max < $arr[$i])
					$max = $arr[$i];
			return $max;
		}
		function minValue($arr)
		{
			$min = $arr[0];
			for($i = 1; $i < count($arr); $i++)
				if($min > $arr[$i])
					$min = $arr[$i];
			return $min;
		}
		function sumArr($arr)
		{
			$sum = 0;
			for($i = 0; $i < count($arr); $i++)
				$sum += $arr[$i];
			return $sum;
		}
		if(isset($_POST["numOfElement"],$_POST["createBtn"]) && $_REQUEST["numOfElement"] > 0)
		{
			$numOE = $_REQUEST["numOfElement"];
			$arr = createArray($numOE);
			$str_arr = convertArr2Str($arr);
			$max = maxValue($arr);
			$min = minValue($arr);
			$sum = sumArr($arr);

		}
	?>
	<h3>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h3>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Nhập số phần tử</td>
				<td><input type="text" name="numOfElement" value="<?php echo $numOE?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="createBtn" value="Phát sinh mảng và tính toán"></td>
			</tr>
			<tr>
				<td>Mảng: </td>
				<td><input type="text" value="<?php echo $str_arr; ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td>GTLN (MAX) trong mảng: </td>
				<td><input type="text" value="<?php echo $max ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td>GTNN (MIN) trong mảng: </td>
				<td><input type="text" value="<?php echo $min ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td>Tổng mảng: </td>
				<td><input type="text" value="<?php echo $sum ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td colspan="2">(<b>Ghi chú:</b> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
			</tr>
		</table>
	</form>
</body>
</html>