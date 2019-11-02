<!DOCTYPE html>
<html lang="vi">
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>2.5 List đơn giản</title>
</head>
<body>
	<?php
		require('connect.php');
		$sql = "SELECT Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, Trong_luong, Don_gia, Hinh  FROM sua AS s JOIN hang_sua AS hs ON s.Ma_hang_sua = hs.Ma_hang_sua JOIN loai_sua AS ls ON s.Ma_loai_sua = ls.Ma_loai_sua";
		$result = mysqli_query($conn, $sql);
		function printDS($result)
    	{
    		if(mysqli_num_rows($result)!=0)
    		{
        		while ($row = mysqli_fetch_object($result))
        		{   
        			
        			echo '<tr>';
        			echo '<td align="center" width="200px"> <img src="Hinh_sua/'.$row->Hinh.'" width="100px" height="100px"></td>';
        			echo '<td>';

        				
        			echo '<b>'.$row->Ten_sua.'</b></br>';
        			echo 'Nhà sản xuất: '.$row->Ten_hang_sua.'</br>';
        			echo $row->Ten_loai.' - '.$row->Trong_luong.' gr - '.$row->Don_gia.' VNĐ';


        			echo '</td>';
        			echo '</tr>';
        		}
    		}
    	}
	?>
	
	<table border="1" align="center">
			<tr>
				<th colspan="2"><h3 align="center">THÔNG TIN CÁC SẢN PHẨM</h3></th>
			</tr>
			<tr>

			</tr>
			<?php printDS($result); ?>
			
	</table>

</body>
</html>