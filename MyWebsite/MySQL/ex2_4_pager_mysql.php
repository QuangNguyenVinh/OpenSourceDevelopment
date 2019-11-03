<!DOCTYPE html>
<html lang="vi">
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>2.4 Lưới phân trang</title>
    <style>
        a
        {
            text-decoration:None;
        }
    </style>
</head>
<body>
	<?php
		require('connect.php');
        $rowsPerPage = 10; //Số mẩu tin trên mỗi trang.
        if(!isset($_GET['page'])) //Vị trí  của mẩu tin đầu tiên trên mỗi trang.
        {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage; //Lấy rowsPerPage mẩu tin, bắt đầu từ vị trí offset.


		$sql = 'SELECT Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, Trong_luong, Don_gia 
				FROM sua AS s JOIN hang_sua AS hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
								JOIN loai_sua AS ls ON s.Ma_loai_sua = ls.Ma_loai_sua
				LIMIT '.$offset.','.$rowsPerPage;
    	$result = mysqli_query($conn, $sql);
    	function printDS($result)
    	{
    		if(mysqli_num_rows($result)>0)
    		{
    			$dem = 0;
        		while ($row = mysqli_fetch_object($result))
        		{
					$dem++;   
        			if($dem % 2 == 0) //Tô màu hàng chẵn, lẻ.
        			{
        				$str = 'style= "background-color: lightblue;"';
        			}
        			else
        			{
        				$str = 'style= "background-color: lightpink;"';
        			}
        			echo '<tr '.$str.'>';
        			echo '<td align="center">'.$dem.'</td>';
        			foreach ($row as $key => $value) 
        			{
						if($key == "Trong_luong")
							echo '<td align="center">'.$value.' gram </td>';
						else if($key == "Don_gia")
							echo '<td align="center">'.$value.' VNĐ</td>';
						else
        					echo '<td align="center">'.$value.'</td>';
        			}
        			echo '</tr>';
        		}
    		}
    	}
        $res = mysqli_query($conn, "SELECT * FROM sua");
        //Tổng số mẩu tin cần hiển thị
        $numRows = mysqli_num_rows($res);
        //Tổng số trang
        $maxPage = ceil($numRows/$rowsPerPage);


	?>
	<h3 align="center">THÔNG TIN SỮA</h3>
	<table border="1" align="center">
			<tr>
				<th>STT</th>
				<th>Tên sữa</th>
				<th>Hãng sữa</th>
				<th>Loại sữa</th>
				<th>Trọng lượng</th>
				<th>Đơn giá</th>
			</tr>
			<?php printDS($result); ?>
	</table>
    <p align="center"><?php
    //Về đầu
    echo "<a href=".$_SERVER['PHP_SELF']."?page=1>First Page &nbsp; </a>";
    //Gắn nút Prev
    if($_GET['page']>1)
        echo "<a href=".$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Prev</a>";
    else
        echo "<a href='#' disabled='disabled'> Prev </a>";
    //Tạo link tương ứng tới các trang.
    for($i = 1; $i <= $maxPage; $i++)
    {
        if($i == $_GET['page'])
            echo '<b>  '.$i.'</b>';
        else
            echo "<a href=".$_SERVER['PHP_SELF']."?page=".$i.">  ".$i."</a> ";
    }
    //Gắn nút Next
    if($_GET['page']<$maxPage)
        echo "<a href=".$_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">Next</a>";
    else
        echo "<a href='#' disabled='disabled'> Next </a>";
    echo "<a href=".$_SERVER['PHP_SELF']."?page=".$maxPage."> &nbsp; Last Page</a>";
    ?></p>
</body>
</html>