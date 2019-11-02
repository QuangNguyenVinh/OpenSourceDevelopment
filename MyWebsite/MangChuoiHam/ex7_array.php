<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bài 7 - Tính năm âm lịch</title>
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
		$solarYear = "";
		$moonYear = "";
		$hinh = "12congiap.jpg";
		$imgSrc = "12congiap/";
		$can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
		$chi = array("Hợi", "Tí", "Sửu", "Dần", "Mẹo", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
		$img = array("hoi.jpg", "ti.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", 
					"ty.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

		$imgSrc = $imgSrc."".$hinh;
		function tinhNam($str_year,$can, $chi,$img,&$imgSrc,&$hinh)
		{
			$year = intval($str_year);
			$year = $year - 3;
			$can_index = $year % 10;
			$chi_index = $year % 12;
			$moonYear = $can[$can_index]." ".$chi[$chi_index];
			$hinh = $img[$chi_index];
			$imgSrc = $imgSrc."".$hinh;
			return $moonYear;
		}
		if(isset($_POST["solarYear"],$_POST["convertBtn"]))
		{
			$imgSrc = "12congiap/";
			$solarYear = $_REQUEST["solarYear"];
			if($solarYear != "")
				$moonYear = tinhNam($solarYear, $can, $chi,$img,$imgSrc,$hinh);
			else
				$imgSrc = $imgSrc."".$hinh;

		}
	 ?>
	 <form action="" method="POST">
	 	<table>
	 		<h3>TÍNH NĂM ÂM LỊCH</h3>
	 		<tr>
	 			<td>Năm dương lịch</td>
	 			<td></td>
	 			<td>Năm âm lịch</td>
	 		</tr>
	 		<tr>
	 			<td><input type="text" name="solarYear" value="<?php echo $solarYear ?>"></td>
	 			<td><input type="submit" name="convertBtn" value="=>" style="background-color: #f9f895"></td>
	 			<td><input type="text" name="moonYear" value="<?php echo $moonYear ?>" disabled="disabled"></td>
	 		</tr>
	 	</table>
	 	 <img src="<?php echo $imgSrc ?>" width="130" height="130">
	 </form>
</body>
</html>