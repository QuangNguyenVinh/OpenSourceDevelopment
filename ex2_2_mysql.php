<!DOCTYPE html>
<html lang="en">
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>QLBS</title>
</head>
<body>
	<?php
		require('connect.php');
		$sql = "SELECT * FROM Khach_hang";
    	$result = mysqli_query($conn, $sql);
    	function printDS($result)
    	{
    		if(mysqli_num_rows($result)!=0)
    		{
    			$dem = 0;
        		while ($row = mysqli_fetch_object($result))
        		{   
        			if($dem == 1)
        			{
        				$str = 'style= "background-color: lightblue;"';
        				$dem = 0;
        			}
        			else
        			{
        				$str = 'style= "background-color: lightpink;"';
        				$dem = 1;
        			}
        			echo '<tr '.$str.'>';
        			
        			foreach ($row as $key => $value) 
        			{
        				echo '<td align="center">'.$value.'</td>';
        			}
        			echo '</tr>';
        		}
    		}
    	}
	?>
	<h3 align="center">THÔNG TIN KHÁCH HÀNG</h3>
	<table border="1" align="center">
			<tr>
				<th>Mã khách hàng</th>
				<th>Tên khách hàng</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Email</th>
			</tr>
			<?php printDS($result); ?>
			
	</table>
</body>
</html>