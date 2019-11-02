<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bài 4 - Tìm kiếm</title>
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
		$str_arr = "";
		$valueOfSearch = 0;
		$res = "";
		function convertStr2Arr($str)
		{
			$arr = explode(",", $str);
			return $arr;
		}
		function convertArr2Str($arr)
		{
			$str_arr = implode(", ", $arr);
			return $str_arr;
		}
		function resSearch($value, $arr)
		{
			for($i = 0; $i < count($arr); $i++)
				if($arr[$i] == $value)
					return "Tìm thấy ".$value." tại vị trí thứ ".$i." trong mảng";
			return "Không tìm thấy ".$value." trong mảng";
		}
		if(isset($_POST["strArr"],$_POST["valueOfSearch"],$_POST["searchBtn"]) && $_REQUEST["strArr"] != "")
		{
			$str_arr = $_REQUEST["strArr"];
			$valueOfSearch = $_REQUEST["valueOfSearch"];
			$arr = convertStr2Arr($str_arr);
			$res = resSearch($valueOfSearch, $arr);
		}
	?>
	
	<form action="" method="POST">
		<h3>TÌM KIẾM</h3>
		<table>
			<tr>
				<td>Nhập mảng: </td>
				<td><input type="text" name="strArr" value="<?php echo $str_arr ?>" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Nhập số cần tìm: </td>
				<td><input type="text" name="valueOfSearch" value="<?php echo $valueOfSearch ?>" style="width: 80px;"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="searchBtn" value="Tìm kiếm" style="background-color: #f9f895"></td>
			</tr>
			<tr>
				<td>Mảng: </td>
				<td><input type="text" value="<?php echo $str_arr ?>" style="width: 250px;" disabled="disabled"></td>
			</tr>
			<tr>
				<td>Kết quả tìm kiếm: </td>
				<td><input type="text" value="<?php echo $res ?>" style="width: 250px;" disabled="disabled"></td>
			</tr>
		</table>
	</form>
</body>
</html>