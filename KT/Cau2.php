<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tài liệu tham khảo</title>
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
                <td align="center" colspan="2" style="background-color: #2d9498;"><h2>TRA CỨU THÔNG TIN TÀI LIỆU THAM KHẢO</h2></td>
            </tr>
            <tr width="70%">
                <td align="center">Chọn tên thể loại: <select name="ten_loai" id="ten_loai">
                    <?php
                        $sql = "SELECT * FROM theloaitailieu";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                           while($row = mysqli_fetch_array($result))
                           {
                               $ma_loai = $row['MaLoaiTaiLieu'];
                               $ten_loai = $row['TenLoaiTaiLieu'];
                               echo '<option value="'.$ma_loai.'"';
                               if(isset($_REQUEST['ten_loai']) && ($_REQUEST['ten_loai']==$ma_loai))
                               {
                                    echo 'selected="selected"';
                               } 
                               echo ">".$ten_loai."</option>";
                           } 
                        }
                        mysqli_free_result($result);
                    ?>
                    </select>
                    <input type="submit" value="Tìm kiếm" name="searchBtn" id="searchBtn">      
                </td>
            </tr>
        </table>
        <?php 
            if(isset($_POST["searchBtn"]))
            {
                $ma_loai = $_REQUEST["ten_loai"];
                $sql_search = "SELECT MaTaiLieu, TenTaiLieu, AnhBia, SoTrang, NamPhatHanh, TenTacGia
                            FROM tailieu AS tl JOIN theloaitailieu AS tltl ON tl.MaLoaiTaiLieu = tltl.MaLoaiTaiLieu
                            JOIN tacgia AS tg ON tl.MaTacGia = tg.MaTacGia
                            WHERE tl.MaLoaiTaiLieu = '".$ma_loai."'";
                $res_search = mysqli_query($conn, $sql_search);
                if(mysqli_num_rows($res_search) > 0)
                {
                    echo '<table border="1" width="70%" align="center">';
                    echo '<tr><td align="center">STT</td><td align="center" colspan="2">THÔNG TIN TÀI LIỆU</td></tr>';
                    $stt = 0;
                    while($row = mysqli_fetch_object($res_search))
                    {
                        $stt++;
                        echo '<tr>';
                            echo '<td align="center">'.$stt.'</td>';

                        echo '<td align="center" width="200px"> <img src="images/'.$row->AnhBia.'" width="100px" height="100px"></td>';
                        
                        echo '<td>';                  
                                echo '<b> Mã số: </b>'.$row->MaTaiLieu.'</br>';
                                echo '<b> Tên tài liệu: </b>'.$row->TenTaiLieu.'</br>';
                                echo '<b> Số trang: </b>'.$row->SoTrang.'</br>';
                                echo '<b> Năm phát hành: </b>'.$row->NamPhatHanh.'</br>';
                                echo '<b> Tên tác giả: </b>'.$row->TenTacGia.'</br>';
                        echo '</td>';

                        echo '</tr>';                        
                    }
                    echo '</table>';
                }
                else
                {
                    echo '<p align="center" id="thongbao"></p>';
                    echo '<script>
                    function getText(element) 
                    {
                        var textHolder = element.options[element.selectedIndex].text
                        document.getElementById("thongbao").innerText = "Thể loại " + textHolder + " chưa có tài liệu nào!";
                    }
                        var element = document.getElementById("ten_loai");
                        getText(element);
                    </script>';
                    
                }
            }
        ?>
    </form>
</body>
</html>