<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm tài liệu tham khảo</title>
</head>
<body>
    <?php 
        require('connect.php');
        $ma_tl = "";
        $ten_tl = "";
        $so_trang = 0;
        $nam_ph = "";
        if(isset($_POST["addBtn"]))
        {
            $ma_ltl = $_POST["ten_loai"];
            $ma_tg = $_POST["tac_gia"];
            $ma_tl = $_POST["ma_tl_txt"];
            $ten_tl = $_POST["ten_tl_txt"];
            $so_trang = $_POST["so_trang_txt"];
            $nam_ph = $_POST["nam_ph_txt"];
        }

    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        THÊM TÀI LIỆU THAM KHẢO
        <fieldset>
            <legend>Thông tin tài liệu cần thêm</legend>
            <table>
            <tr>
                <td>
                Chọn tên thể loại: 
                </td>
                <td>
                    <select name="ten_loai" id="ten_loai">
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
                </td>
                <td>
                Chọn tên tác giả: 
                </td>
                <td>
                    <select name="tac_gia" id="tac_gia">
                    <?php
                        $sql = "SELECT * FROM tacgia";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                           while($row = mysqli_fetch_array($result))
                           {
                               $ma_tg = $row['MaTacGia'];
                               $ten_tg = $row['TenTacGia'];
                               echo '<option value="'.$ma_tg.'"';
                               if(isset($_REQUEST['tac_gia']) && ($_REQUEST['tac_gia']==$ma_tg))
                               {
                                    echo 'selected="selected"';
                               } 
                               echo ">".$ten_tg."</option>";
                           } 
                        }
                        mysqli_free_result($result);
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã tài liệu:</td>
                <td> <input type="text" name="ma_tl_txt" value="<?php echo $ma_tl; ?>" required> </td>
                <td>Tên tài liệu: </td>
                <td><input type="text" name="ten_tl_txt" value="<?php echo $ten_tl; ?>" required></td>
            </tr>
            <tr>
                <td>Số trang: </td>
                <td><input type="number" name="so_trang_txt" min="1" value="<?php echo $so_trang; ?>" required></td>
                <td>Năm phát hành: </td>
                <td><input type="text" name="nam_ph_txt" value="<?php echo $nam_ph; ?>" required></td>
            </tr>
            <tr>
                <td>Ảnh bìa: </td>
                <td><input type="file" name="anh_bia" required></td>
            </tr>
            <tr>
                <td align="center" colspan="4">
                    <input type="submit" name="addBtn" value="Thêm tài liệu" id="addBtn">
                </td>
            </tr>
            </table>
        </fieldset>
    </form>
    <?php
        if(isset($_POST["addBtn"]))
        {
            //Xử lý file ảnh
            $errors= array();
            $file_name = $_FILES['anh_bia']['name'];
            $file_size = $_FILES['anh_bia']['size'];
            $file_tmp = $_FILES['anh_bia']['tmp_name'];
            $file_type= $_FILES['anh_bia']['type'];
            $tmp = explode('.', $_FILES['anh_bia']['name']);
            $file_ext= strtolower(end($tmp));
            $expensions= array("jpeg","jpg","png");
            if(in_array($file_ext, $expensions)=== false)
            {
                $errors[]="Tệp có phần mở rộng phải là định djang JPG, JPEG hoặc PNG.";
            }
            if($file_size > 2097152)
            {
                $errors[]='Kích thước file phải bé hơn hoặc bằng 2MB';
            }
            if(empty($errors)==true)
            {
                move_uploaded_file($file_tmp,"images/".$file_name);
                $anh_bia =  $_FILES['anh_bia']['name'];
                $sql_insert = "INSERT INTO tailieu (MaTaiLieu, TenTaiLieu, AnhBia, SoTrang, NamPhatHanh, MaLoaiTaiLieu, MaTacGia)
                               VALUES ('".$ma_tl."', '".$ten_tl."', '".$anh_bia."', '".$so_trang."', '".$nam_ph."', '".$ma_ltl."', '".$ma_tg."')";
                if (mysqli_query($conn, $sql_insert)) 
                {
                    echo '<h3 align="center">Đã thêm tài liệu thành công vào CSDL!</h3>';
                } 
                else
                {
                    echo '<h3 align="center">Không thêm tài liệu được!</h3>';
                }              
            }
            else
            {
                print_r($errors);
            }  
        }
    ?>
</body>
</html>