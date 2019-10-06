<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bài 5 - Mảng</title>
</head>
<body>
	<?php 
		$str_arr = "";
		$valNeedRepl = null;
		$valRepl = null;
		$oldArr_str = "";
		$newArr_str = "";
		function String2Array($str)
		{
			return explode(",", $str);
		}
		function Array2String($arr)
		{
			return implode(" ", $arr);
		}
		function searchValue($arr, $val)
		{
			for($i = 0; $i < count($arr); $i++)
				if($arr[$i] == $val)
					return $i;
			return -1;
		}
		function replaceValue(&$arr, $valNeedRepl, $valRepl)
		{
			if(searchValue($arr, $valNeedRepl) != -1)
				{
					$arr[searchValue($arr, $valNeedRepl)] = $valRepl;
					return true;
				}
			return false;
		}
		if(isset($_POST["strArr"],$_POST["valNeedRepl"],$_POST["valRepl"],$_POST["replBtn"]))
		{
			$str_arr = $_REQUEST["strArr"];
			$valNeedRepl = $_REQUEST["valNeedRepl"];
			$valRepl = $_REQUEST["valRepl"];
			$oldArr_str = str_replace(",", " ", $str_arr);
			$array = String2Array($str_arr);
			if(replaceValue($array, $valNeedRepl, $valRepl))
				$newArr_str = Array2String($array);
			else
				$newArr_str = "Không tìm thấy phần tử cần thay thế!";
		}

	 ?>
	 <form action="" method="POST">
	 	<table>
	 		<tr>
	 			<td>Nhập các phần tử: </td>
	 			<td><input type="text" name="strArr" value="<?php echo $str_arr ?>"></td>
	 		</tr>
	 		<tr>
	 			<td>Giá trị cần thay thế: </td>
	 			<td><input type="text" name="valNeedRepl" value="<?php echo $valNeedRepl ?>"></td>
	 		</tr>
	 		<tr>
	 			<td>Giá trị thay thế: </td>
	 			<td><input type="text" name="valRepl" value="<?php echo $valRepl ?>"></td>
	 		</tr>
	 		<tr>
	 			<td></td>
	 			<td><input type="submit" name="replBtn" value="Thay thế"></td>
	 		</tr>
	 		<tr>
	 			<td>Mảng cũ: </td>
	 			<td><input type="text" name="oldArr" value="<?php echo $oldArr_str ?>" disabled="disabled"></td>
	 		</tr>
	 		<tr>
	 			<td>Mảng mới: </td>
	 			<td><input type="text" name="newArr" value="<?php echo $newArr_str ?>" disabled="disabled"></td>
	 		</tr>
	 	</table>
	 </form>
</body>
</html>