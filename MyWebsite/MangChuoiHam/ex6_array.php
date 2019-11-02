<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bài 6 - Sắp xếp mảng</title>
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
		$incArr = "";
		$decArr = "";
		$strArr = "";
		function String2Array($str)
		{
			return explode(",", $str);
		}
		function Array2String($arr)
		{
			return implode(" ", $arr);
		} 
		function IncSort($arr)
		{
			sort($arr);
			return $arr;
		}
		function DecSort($arr)
		{
			rsort($arr);
			return $arr;
		}
		if(isset($_POST["strArr"],$_POST["sortBtn"]))
		{
			$strArr = $_REQUEST["strArr"];
			if($strArr != "")
			{
				$incArr = Array2String(IncSort(String2Array($strArr)));
				$decArr = Array2String(DecSort(String2Array($strArr)));
			}

		}
	 ?>
	 <form action="" method="POST">
	 	<table>
	 		<h3>SẮP XẾP MẢNG</h3>
	 		<tr>
	 			<td>Nhập mảng: </td>
	 			<td><input type="text" name="strArr" value="<?php echo $strArr ?>"></td>
	 		</tr>
	 		<tr>
	 			<td></td>
	 			<td><input type="submit" name="sortBtn" value="Sắp xếp tăng/giảm" style="background-color: #f9f895"></td>
	 		</tr>
	 		<tr>
	 			<td>Sau khi sắp xếp: </td>
	 			<td></td>
	 		</tr>
	 		<tr>
	 			<td>Tăng dần: </td>
	 			<td><input type="text" value="<?php echo $incArr ?>" disabled="disabled"></td>
	 		</tr>
	 		<tr>
	 			<td>Giảm dần: </td>
	 			<td><input type="text" value="<?php echo $decArr ?>" disabled="disabled"></td>
	 		</tr>
	 	</table>
	 	<p><span style="color: red">(*)</span> Các số được nhập cách nhau bằng dấu ","</p>
	 </form>
</body>
</html>