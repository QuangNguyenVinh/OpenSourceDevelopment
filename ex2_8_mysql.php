<!DOCTYPE html>
<html lang="en">
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>QLBS Pager</title>
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
        $rowsPerPage = 2; //Số mẩu tin trên mỗi trang.
        if(!isset($_GET['page'])) //Vị trí  của mẩu tin đầu tiên trên mỗi trang.
        {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage; //Lấy rowsPerPage mẩu tin, bắt đầu từ vị trí offset.


		$sql = 'SELECT Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh
				FROM sua AS s JOIN hang_sua AS hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
								JOIN loai_sua AS ls ON s.Ma_loai_sua = ls.Ma_loai_sua
				LIMIT '.$offset.','.$rowsPerPage;
    	$result = mysqli_query($conn, $sql);
    	function printDS($result)
    	{
    		if(mysqli_num_rows($result)>0)
    		{
                    echo '<table border="1" width="70%" align="center">';
                    
                    while($row = mysqli_fetch_object($result))
                    {
                        echo '<tr>';
                            echo '<td colspan="2" align="center" style="background-color: #2d9498;">'.$row->Ten_sua.'-'.$row->Ten_hang_sua.'</td>';
                        echo '</tr>';

                        echo '<tr>';
                            echo '<td align="center" width="200px"> <img src="Hinh_sua/'.$row->Hinh.'" width="100px" height="100px"></td>';
                        
                            echo '<td>';                  
                                echo '<b> Thành phần dinh dưỡng: </b></br>'.$row->TP_Dinh_Duong.'</br>';
                                echo '<b>Lợi ích:</b> </br>'.$row->Loi_ich.'</br>';
                                echo '<b>Trọng lượng: </b>'.$row->Trong_luong.' gr - <b>Đơn giá:</b> '.$row->Don_gia.' VNĐ';
                            echo '</td>';

                        echo '</tr>';                        
                    }
                    echo '</table>';
    		}
    	}
        $res = mysqli_query($conn, "SELECT * FROM sua");
        //Tổng số mẩu tin cần hiển thị
        $numRows = mysqli_num_rows($res);
        //Tổng số trang
        $maxPage = ceil($numRows/$rowsPerPage);


	?>
	<h3 align="center">THÔNG TIN SỮA</h3>
    <?php printDS($result) ?>  
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