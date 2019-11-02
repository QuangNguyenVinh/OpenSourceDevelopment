<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Matrix</title>
	<style type="text/css">
		form
            {
                background-color: #ccd9cf;
                text-align: center;
            }
           h3
            {
                background-color: #2d9498;
                color: white;
                text-align: center;
            }    
    </style>
</head>
<body>
	<?php
		$arr = array();
		$m= 0;
		$n= 0;
		$rowReq ="";
		$colReq = "";
		function checkValueOnly($str) //Kiểm tra chuỗi chỉ chứa kí tự số
		{
			return preg_match('/^[0-9]+$/', $str);
		}
		function String2Value($str)
		{
			return intval($str);
		}
		function printMatrix($matrix) //Tạo bảng matrix gồm m hàng n cột
		{
			echo "<table>";
			for($i = 0; $i < count($matrix); $i++)
			{
				echo "<tr>";
				for($j = 0; $j < count($matrix[$i]); $j++)
					echo "<td style='border: 3px solid lightblue; text-align: center;'>".$matrix[$i][$j]."</td>";
				echo "</tr>";
			}
			echo "</table>";

		}
		function createMatrix($m, $n)
		{
			$matrix = array();
			for($i = 0; $i < $m; $i++)
			{
				for($j = 0; $j < $n; $j++)
				{
					$matrix[$i][$j] = rand(-100,100); //Tạo ngẫu nhiên giá trị từng phần tử trong matrix [-100;100]
				}
			}
			return $matrix;
		} 
		if(isset($_POST["rowMatrix"],$_POST["colMatrix"], $_POST["CreateMatrix"]))
		{
			if(checkValueOnly($_REQUEST["rowMatrix"]) && checkValueOnly($_REQUEST["colMatrix"]))
			{
				$m = String2Value($_REQUEST["rowMatrix"]); //Chuyển chuỗi thành số
				$n = String2Value($_REQUEST["colMatrix"]); //Chuyển chuỗi thành số
				if($m > 10 || $m < 2 || $n > 10 || $n < 2) //Kiểm tra số hàng và số cột nằm trong khoảng [2;10]
				{
					if($m > 10 || $m < 2)
						$rowReq = "Số hàng nằm trong khoảng [2;10]";
					if($n > 10 || $n < 2)
						$colReq = "Số cột nằm trong khoảng [2;10]";
				}
				else
					$arr = createMatrix($m, $n);
			}
			else
			{
				if(!checkValueOnly($_REQUEST["rowMatrix"]))
					$rowReq = "Chỉ chấp nhận số!";
				if(!checkValueOnly($_REQUEST["colMatrix"]))
					$colReq = "Chỉ chấp nhận số!";
			}

		}

	?>
	<form action="" method="POST">
		<h3 align="center">MA TRẬN</h3>
		<table border="0" align="center">
			<tr>
				<td>Nhập số hàng: </td>
				<td><input type="text" name="rowMatrix" value="<?php echo $m ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $rowReq?></td>
			</tr>
			<tr>
				<td>Nhập số cột: </td>
				<td><input type="text" name="colMatrix" value="<?php echo $n ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $colReq?></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="CreateMatrix" value="Tạo ma trận"  style="background-color: #f9f895"></td>
			</tr>
			<tr>
				<td align="center" colspan="2">Ma trận</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><?php printMatrix($arr) ?></td>
			</tr>
		</table>
	</form>
</body>
</html>