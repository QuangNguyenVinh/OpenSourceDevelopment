<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Lottery</title>
	<style>
		table
		{
			width: 20%;
		}
		td
		{
			border: 2px solid black;
		}
	</style>
</head>
<body>
	<?php
		$arr = array();
		$strArrNum = "";
		$strNotiRes ="";
		$arrRes =
		$arrJackpot1 =
		$arrJackpot2 = 
		$firstPrize = 
		$secondPrize = 
		$thirdPrize = array();
		function checkExist($arr, $value)
		{
			for($i = 0; $i < count($arr) - 1; $i++)
				if($arr[$i] == $value)
					return true;
			return false;
		} 
		function checkExistJackpot1($arr, $value)
		{
			for($i = 0; $i < count($arr); $i++)
				if($value == $arr[$i])
					return true;
			return false;
		}
		function random($n)
		{
			$arr = array();
			for($i = 0; $i < $n; $i++)
			{
				do
				{
					$arr[$i] = rand(1,55);
				}while(checkExist($arr,$arr[$i]));
					
			}
			return $arr;
		}
		function specialNum($arr)
		{	
			do
			{
				$sNum = rand(1,55);
			}while(checkExistJackpot1($arr, $sNum));	
			return $sNum;
		}
		function printRes($arr)
		{
			foreach($arr as $value)
			{
				echo $value." ";
			}
		}
		function checkRes($resArr, $prizeArr)
		{
			$dem = 0;
			for($i = 0; $i < count($prizeArr); $i++)
				for($j = 0; $j < count($resArr); $j++)
					if($prizeArr[$i] == $resArr[$j])
						$dem += 1;
			return $dem == count($prizeArr) ? true : false;
		}
			$arrJackpot1 = random(6);
			$arrJackpot2 = random(5);
			$firstPrize = random(5);
			$secondPrize = random(4);
			$thirdPrize = random(3);
			array_push($arrJackpot2, specialNum($arrJackpot1));

		if(isset($_POST["strArrNum"], $_POST["checkBtn"]))
		{
				$strArrNum = $_REQUEST["strArrNum"];
				if($strArrNum != "")
					$arrRes = explode(",", $strArrNum);
				if(checkRes($arrRes, $arrJackpot1))
					$strNotiRes = "Bạn trúng giải Jackpot 1";
				else if(checkRes($arrRes, $arrJackpot2))
					$strNotiRes = "Bạn trúng giải Jackpot 2";
				else if(checkRes($arrRes, $firstPrize))
					$strNotiRes = "Bạn trúng giải nhất";
				else if(checkRes($arrRes, $secondPrize))
					$strNotiRes = "Bạn trúng giải nhì";
				else if(checkRes($arrRes, $thirdPrize))
					$strNotiRes = "Bạn trúng giải ba";
				else
					$strNotiRes = "Chúc bạn may mắn lần sau!";

		}

	 ?>
	<form action="" method="POST">
		<table border="0">
			<tr>
				<td>Giải thưởng</td>
				<td>Kết quả</td>
			</tr>
			<tr>
				<td>Giải Jackpot 1</td>
				<td><?php printRes($arrJackpot1); ?></td>
			</tr>
			<tr>
				<td>Giải Jackpot 2</td>
				<td><?php printRes($arrJackpot2); ?></td>
			</tr>
			<tr>
				<td>Giải Nhất</td>
				<td><?php printRes($firstPrize) ?></td>
			</tr>
			<tr>
				<td>Giải Nhì</td>
				<td><?php printRes($secondPrize) ?></td>
			</tr>
			<tr>
				<td>Giải Ba</td>
				<td><?php printRes($thirdPrize) ?></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Xem kết quả" name="checkBtn">
				</td>
			</tr>
			<tr>
				<td>Nhập dãy số: </td>
				<td><input type="text" name="strArrNum" value="<?php echo $strArrNum ?>"></td>
			</tr>
			<tr>
				<td><?php echo $strNotiRes; ?></td>
			</tr>
		</table>
	</form>
</body>
</html>