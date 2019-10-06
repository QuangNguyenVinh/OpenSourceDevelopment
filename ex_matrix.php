<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Matrix</title>
</head>
<body>
	<?php
		$str_indexMatrix = "";
		$arr = array();
		$m = 0;
		$n = 0;
		function splitStr($str)
		{
			$arr = explode(",", $str);
			return $arr;
		}
		function printMatrix($matrix, $m, $n)
		{
			for($i = 0; $i < $m; $i++)
			{
				for($j = 0; $j < $n; $j++)
					echo $matrix[$i][$j]."\t\t\t";
				echo "</br>";
			}

		}
		function createMatrix($m, $n)
		{
			$matrix = array();
			for($i = 0; $i < $m; $i++)
			{
				for($j = 0; $j < $n; $j++)
				{
					$matrix[$i][$j] = rand(-100,100);
				}
			}
			printMatrix($matrix, $m, $n);
		} 
		if(isset($_POST["indexMatrix"], $_POST["CreateMatrix"]))
		{
			$str_indexMatrix = $_REQUEST["indexMatrix"];
			if($str_indexMatrix != "")
			{
				$arr = splitStr($str_indexMatrix);
				$m = $arr[0];
				$n = $arr[1];
			}
		}

	?>
	<form action="" method="POST">
		<table>
			<h3>Ma Trận</h3>
			<tr>
				<td>Nhập m,n: </td>
				<td><input type="text" name="indexMatrix" value="<?php echo $m.",".$n ?>"> (*)</td>
			</tr>
			<tr>
				<td><input type="submit" name="CreateMatrix" value="Tạo ma trận"></td>
			</tr>
			<tr>
				<td>Ma trận: </td>
				<td><?php createMatrix($m, $n) ?></td>
			</tr>
		</table>
	</form>
</body>
</html>