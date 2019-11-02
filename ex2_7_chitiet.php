<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết</title>
    <style>
        table{
            width: 50%;
        }
    </style>
</head>
<body>
    <table align="center">
                <?php
                    require('connect.php');
                    if(isset($_GET['ma_sua']))
                    {
                        $ma_sua = $_GET['ma_sua'];
                        $sql = "SELECT Ma_sua, Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh
                                FROM sua AS s JOIN hang_sua AS hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
                                            JOIN loai_sua AS ls ON s.Ma_loai_sua = ls.Ma_loai_sua
                                WHERE Ma_sua = '".$ma_sua."'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            if($row = mysqli_fetch_object($result))
                            {
                            echo '<tr>';
                                echo '<th colspan="2" align="center" style="background-color: #2d9498;">'.$row->Ten_sua.'-'.$row->Ten_hang_sua.'</th>';
                            echo '</tr>';

                            echo '<tr>';
                                echo '<td align="center" width="200px"> <img src="Hinh_sua/'.$row->Hinh.'" width="100px" height="100px"></td>';
                        
                                echo '<td>';                  
                                    echo '<b> Thành phần dinh dưỡng: </b></br>'.$row->TP_Dinh_Duong.'</br>';
                                    echo '<b>Lợi ích:</b> </br>'.$row->Loi_ich.'</br>';
                                    echo '<b>Trọng lượng: </b>'.$row->Trong_luong.' gr - <b>Đơn giá:</b> '.$row->Don_gia.' VNĐ';
                                echo '</td>';

                            echo '</tr>';

                            echo '<tr><td>';
                                echo '<a href="ex2_7_mysql.php">Quay về </a>';
                            echo '</td></tr>';
                            }
                        }
                    } 
                ?>
    </table>
</body>
</html>