<!DOCTYPE html>
<html lang="vi">
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>2.1 Hiển thị lưới</title>
    <style>
        h3
		{
            color: blue;
        }
    </style>
</head>
<body>
	<?php
		require('connect.php');
		$sql = "SELECT * FROM Hang_sua";
    	$result = mysqli_query($conn, $sql);
    	function printDS($result)
    	{
    		if(mysqli_num_rows($result)!=0)
    		{
    			$dem = 0;
        		while ($row = mysqli_fetch_object($result))
        		{   
        			echo '<tr>';
        			
        			foreach ($row as $key => $value) 
        			{
        				echo '<td align="center">'.$value.'</td>';
        			}
        			echo '</tr>';
        		}
    		}
    	}
	?>
	<h3 align="center">THÔNG TIN HÃNG SỮA</h3>
	<table border="1" align="center">
			<tr>
				<th>Mã hãng sữa</th>
				<th>Tên hãng sữa</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Email</th>
			</tr>
			<?php printDS($result); ?>
			
	</table>
</body>
</html>