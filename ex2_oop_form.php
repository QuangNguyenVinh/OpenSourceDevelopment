<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Fraction</title>
	<style>
		form {
            background-color: #ffffcc;
            text-align: center;
            margin-top: 5%;
            left: 35%;
            min-width: 30%;
            position: absolute;
            border: 2px solid gray;
        }
	</style>
</head>
<body>
	<?php 
		require 'ex2_oop_fraction.php';
		$TuSo_1st = 
		$MauSo_1st =
		$TuSo_2nd =
		$MauSo_2nd = 0;
		$res = "";
		function isNumber($str)
		{
			return preg_match("^-?\d+$", $str);
		}
		if(isset($_POST["resBtn"]))
		{
			$operator = $_POST["operator"];
			$TuSo_1st = $_POST["TuSo_1st"];
			$MauSo_1st = $_POST["MauSo_1st"];
			$TuSo_2nd = $_POST["TuSo_2nd"];
			$MauSo_2nd = $_POST["MauSo_2nd"];

			$ps1 = new PhanSo($TuSo_1st, $MauSo_1st);
			$ps2 = new PhanSo($TuSo_2nd, $MauSo_2nd);

			$res = $ps1->printPS();

			switch ($operator) 
			{
				case "+":
					$ps1->CongPS($ps2);
					$res = $res." + ".$ps2->printPS()." = ".$ps1->getRes();
					break;

				case "-":
					$ps1->TruPS($ps2);
					$res = $res." - ".$ps2->printPS()." = ".$ps1->getRes();
					break;
				case "*":
					$ps1->NhanPS($ps2);
					$res = $res." * ".$ps2->printPS()." = ".$ps1->getRes();
					break;
				case "/":
					if($ps2->isValid($ps2->getTu()) && $ps2->isValid($ps2->getMau()))
					{
						$ps1->ChiaPS($ps2);
						$res = $res." / ".$ps2->printPS()." = ".$ps1->getRes();
					}
					else $res = "Lỗi chia cho 0";	
					break;
				
			}
		}

	 ?>
	 <form action="" method="post">
	 	<h2>PHÉP TÍNH VỚI PHÂN SỐ</h2>
	 	<table border="1">
	 		<tr>
	 			<td colspan = "2">Chọn các phép tính trên phân số</td>
	 		</tr>
	 		<tr>
	 			<td colspan = "2">Nhập phân số thứ 1:</td>
	 		</tr>
	 		<tr>
	 			
	 			<td>Tử số: <input type="text" name="TuSo_1st" value="<?php echo $TuSo_1st ?>" required> </td>
	 			<td>Mẫu số: <input type="text" name="MauSo_1st" id="MauSo_1st" value="<?php echo $MauSo_1st  ?>" required></td>
	 		</tr>
	 		<tr>
	 			<td colspan = "2">Nhập phân số thứ 2:</td>
	 		</tr>
	 		<tr>
	 			
	 			<td>Tử số: <input type="text" name="TuSo_2nd" value="<?php echo $TuSo_2nd  ?>" required> </td>
	 			<td>Mẫu số: <input type="text" name="MauSo_2nd" id="MauSo_2nd" value="<?php echo $MauSo_2nd  ?>" required></td>
	 		</tr>
	 		<tr>
	 			<td colspan = "2">
	 				Chọn phép tính
	 			<input type="radio" name="operator"  value="+" checked>Cộng
	 			<input type="radio" name="operator"  value="-">Trừ
	 			<input type="radio" name="operator"  value="*" >Nhân
	 			<input type="radio" name="operator" id="divide" value="/" >Chia
	 			</td>
	 		</tr>
	 		<tr>
	 			<td colspan = "2">
	 				<input type="submit" name="resBtn" id="resBtn" value="Kết quả">
	 			</td>
	 		</tr>
	 		<tr>
	 			<td colspan = "2" id="res"><?php echo "Kết quả: ".$res ?></td>
	 		</tr>
	 	</table>
	 </form>
</body>
</html>