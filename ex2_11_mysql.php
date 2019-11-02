<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sữa</title>
</head>
<body>
    <?php 
        require('connect.php');
    ?>
    <form action="" method="POST">
    <table align="center">
        <tr>
            <th colspan="2">THÊM SỮA MỚI</th>
        </tr>
        <tr>
            <td>Mã sữa: </td>
            <td><input type="text" name="ma_sua_txt" required></td>
        </tr>
        <tr>
            <td>Tên sữa: </td>
            <td><input type="text" name="ten_sua_txt" required></td>
        </tr>
        <tr>
            <td>Hãng sữa</td>
            <td>
            <select name="hang_sua">
                    <?php
                       $sql = "SELECT * FROM Hang_sua"; 
                       $result = mysqli_query($conn, $sql);
                       if(mysqli_num_rows($result) > 0)
                       {
                          while($row = mysqli_fetch_array($result))
                          {
                              $ma_hang_sua = $row['Ma_hang_sua'];
                              $ten_hang = $row['Ten_hang_sua'];
                              echo '<option value="'.$ma_hang_sua.'"';
                              if(isset($_REQUEST['hang_sua']) && ($_REQUEST['hang_sua']==$ma_hang_sua))
                              {
                                   echo 'selected="selected"';
                              } 
                              echo ">".$ten_hang."</option>";
                          } 
                       }
                       mysqli_free_result($result);                       
                    ?>             
            </td>
        </tr>
        <tr>
            <td>Loại sữa: </td>
            <td>
            <select name="loai_sua">
                    <?php
                        $sql = "SELECT * FROM Loai_sua";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                           while($row = mysqli_fetch_array($result))
                           {
                               $ma_loai_sua = $row['Ma_loai_sua'];
                               $ten_loai = $row['Ten_loai'];
                               echo '<option value="'.$ma_loai_sua.'"';
                               if(isset($_REQUEST['loai_sua']) && ($_REQUEST['loai_sua']==$ma_loai_sua))
                               {
                                    echo 'selected="selected"';
                               } 
                               echo ">".$ten_loai."</option>";
                           } 
                        }
                        mysqli_free_result($result);
                    ?>
                    </select>
            </td>
        </tr>
        <tr>
            <td>Trọng lượng: </td>
            <td><input type="number" name="trong_luong_txt" min="1" required> gr hoặc ml</td>
        </tr>
        <tr>
            <td>Đơn giá: </td>
            <td><input type="number" name="don_gia_txt" min="1" required> (VNĐ)</td>
        </tr>
        <tr>
            <td>Thành phần dinh dưỡng: </td>
            <td><textarea rows="3" cols="50" name="tp_dinh_duong_txt" required></textarea></td>
        </tr>
        <tr>
            <td>Lợi ích: </td>
            <td><textarea rows="3" cols="50" name="loi_ich_txt" required></textarea></td>
        </tr>
        <tr>
            <td>Hình ảnh: </td>
            <td><input type="text" name="hinh_txt" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Thêm mới" name="addBtn">
            </td>
        </tr>
    </table>
    <?php
        if(isset($_POST["addBtn"]))
        {
            $ma_sua = $_REQUEST["ma_sua_txt"];
            $ten_sua = $_REQUEST["ten_sua_txt"];
            $hang_sua = $_REQUEST["hang_sua"];
            $loai_sua = $_REQUEST["loai_sua"];
            $trong_luong = $_REQUEST["trong_luong_txt"];
            $don_gia = $_REQUEST["don_gia_txt"];
            $tp_dinh_duong = $_REQUEST["tp_dinh_duong_txt"];
            $loi_ich = $_REQUEST["loi_ich_txt"];
            $hinh = $_REQUEST["hinh_txt"];

            $sql_insert = "INSERT INTO sua (ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh)
                            VALUES ('".$ma_sua."', '".$ten_sua."', '".$hang_sua."', '".$loai_sua."', '".$trong_luong."', '".$don_gia."', '".$tp_dinh_duong."', '".$loi_ich."', '".$hinh."')";
            if (mysqli_query($conn, $sql_insert)) 
            {
                echo '<h5 align="center"> Kết quả sau khi thêm mới thành công</h5>';
                echo '<p align="center">Thêm sữa thành công</p>';
                $sql_search = "SELECT Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh
                            FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                            JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                            WHERE sua.Ma_sua = '".$ma_sua."'";
                $res_search = mysqli_query($conn, $sql_search);
                if(mysqli_num_rows($res_search) > 0)
                {
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
            } else 
            {
                echo '<h3 align="center">Trùng mã sản phẩm</h3>';
            }
            
            mysqli_close($conn);
            
        }
    ?>
    </form>
</body>
</html>