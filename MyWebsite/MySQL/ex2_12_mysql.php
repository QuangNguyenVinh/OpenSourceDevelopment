<!DOCTYPE html>
<html lang="vi">
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>2.12 Xóa - Sửa</title>
	<style>
		table
        {
            background-color: #ccd9cf;

        }
        #headerTable
        {
            background-color: #2d9498;
            text-align: center;
        }
	</style>
</head>
<body>
	<?php
		require('connect.php');
		$sql = "SELECT * FROM khach_hang";
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
                        if($key == "Phai")
                        {
                            if($value == 0)
                                echo '<td align="center">Nam</td>';
                            else 
                                echo '<td align="center">Nữ</td>';
                        }
                        else 
        				    echo '<td align="center">'.$value.'</td>';
                    }
                    echo '<td><a href="ex2_12_edit.php?ma_kh='.$row->Ma_khach_hang.'">Sửa</a></td>';
                    echo '<td><a href="ex2_12_del.php?ma_kh='.$row->Ma_khach_hang.'">Xóa</a></td>';
        			echo '</tr>';
        		}
    		}
    	}
	?>
    <form action="" method="GET">
	<table border="1" align="center">
			<tr id="headerTable">
				<td colspan="8"><h3 align="center">THÔNG TIN KHÁCH HÀNG</h3></td>
			</tr>
			<tr>
				<th>Mã khách hàng</th>
				<th>Tên khách hàng</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Email</th>
                <th>Sửa</th>
                <th>Xóa</th>
			</tr>
			<?php printDS($result); ?>
			
	</table>
    </form>
</body>
</html>