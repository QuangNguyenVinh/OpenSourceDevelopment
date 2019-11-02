<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QLBS</title>
</head>
<body>
    <form action="" method="GET">
        <table border="1" align="center">
            <tr>
                <th align="center" colspan="5"><h3> THÔNG TIN CÁC SẢN PHẨM <h3></th>
            </tr>
           <?php
                $numsCol = 5;
                
                require('connect.php');
		        $sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh 
                        FROM sua AS s JOIN hang_sua AS hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
                                    JOIN loai_sua AS ls ON s.Ma_loai_sua = ls.Ma_loai_sua";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    $dem = 0;
                    while ($row = mysqli_fetch_object($result))
                    {
                        if($dem % $numsCol == 0)
                            echo '<tr>';
                        echo '<td align="center"><a href="ex2_7_chitiet.php?ma_sua='.$row->Ma_sua.'"><b>'.$row->Ten_sua.'</b></a></br>'.$row->Trong_luong.' gr - '.$row->Don_gia.' VNĐ </br>';
                        echo ' <img src="Hinh_sua/'.$row->Hinh.'" width="75px" height="95px" />';
                        echo '</td>';
                        $dem++;
                        if($dem % $numsCol == 0)
                            echo '<tr>';
                        
                    }
                }
                mysqli_free_result($result);
                
           ?>
        </table>
    </form>
</body>
</html>