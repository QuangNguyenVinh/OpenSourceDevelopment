<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tìm kiếm nâng cao</title>
    <style type="text/css">
            form
            {
                background-color: #ccd9cf;

            }
            h2
            {
                background-color: #2d9498;
                text-align: center;
            }
            #searchBtn
            {
                background-color: #f9f895;
            }    
        </style>    
</head>
<body>
    <?php 
        require('connect.php');
    ?>
    <form action="" method="post">
        <table align="center" width="70%" border="1">
            <tr>
                <td align="center" colspan="2" style="background-color: #2d9498;"><h2>TÌM KIẾM THÔNG TIN SỮA</h2></td>
            </tr>
            <tr>
                <td align="center">Tên sữa: 
                    <input type="text" value="" name="ten_sua"/>
                    <input type="submit" value="Tìm kiếm" name="searchBtn" id="searchBtn">
                </td>
            </tr>
        </table>
        <?php 
            if(isset($_POST["searchBtn"]))
            {
                $ten_sua = $_REQUEST["ten_sua"];
                $sql_search = "SELECT Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh
                            FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                            JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                            WHERE sua.Ten_sua LIKE '%".$ten_sua."%'";
                $res_search = mysqli_query($conn, $sql_search);
                if(mysqli_num_rows($res_search) > 0)
                {
                    echo '<p align="center">Có '.mysqli_num_rows($res_search).' sản phẩm được tìm thấy</p>';
                    echo '<table border="1" width="70%" align="center">';
                    
                    while($row = mysqli_fetch_object($res_search))
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
                else
                {
                    echo '<p align="center">Không tìm thấy sản phẩm này!</p>';
                }
            }
            else 
            {
                echo '<p align="center">Vui lòng nhập thông tin sản phẩm cần tìm!</p>';
            }
        ?>
    </form>
</body>
</html>