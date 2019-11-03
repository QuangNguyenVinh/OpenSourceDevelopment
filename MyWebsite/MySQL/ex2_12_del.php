<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xóa thông tin khách hàng</title>
    <style>
        table
        {
            background-color: #ccd9cf;

        }
        th
        {
            background-color: #2d9498;
            text-align: center;
        }
        #deleteBtn
        {
                background-color: #f9f895;
        }
    </style>
</head>
<body>
    <?php
        require('connect.php');
        if(isset($_GET["ma_kh"]))
        {
            $ma_kh=$_GET['ma_kh']; 
        }
        else
            $ma_kh = "";

        $query = "SELECT * from khach_hang WHERE Ma_khach_hang='".$ma_kh."'"; 
        
        $ten_khach_hang = "";
        $phai = 0;
        $sdt = "";
        $dia_chi = "";
        $email = "";

        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_object($result))
            {
                $ten_khach_hang = $row->Ten_khach_hang;
                $phai = $row->Phai;
                $sdt = $row->Dien_thoai;
                $dia_chi = $row->Dia_chi;
                $email = $row->Email;
            }
        }
        mysqli_free_result($result);

    ?>
    <form action="" method="POST">
    <table align="center">
        <tr>
            <th align="center" colspan="2">XÓA THÔNG TIN KHÁCH HÀNG</th>
        </tr>
        <tr>
            <td>Mã khách hàng</td>
            <td>
                <input type="text" name="ma_khach_hang_txt" value="<?php echo $ma_kh; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td>Tên khách hàng</td>
            <td>
                <input type="text" name="ten_khach_hang_txt" value="<?php echo $ten_khach_hang; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td>Phái</td>
            <td>
                <input type="radio" name="phai" value="0" <?php if($phai==0) echo 'checked' ?> disabled>Nam
                <input type="radio" name="phai" value="1" <?php if($phai==1) echo 'checked' ?> disabled>Nữ
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="dia_chi_txt" value="<?php echo $dia_chi; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td>
                <input type="text" name="dien_thoai_txt" value="<?php echo $sdt; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
             <input type="text" name="email_txt" value="<?php echo $email; ?>" disabled="disabled">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="deleteBtn" value="Xóa" id="deleteBtn">
            </td>
        </tr>
    </table>
    </form>
    <?php
        if(isset($_POST["deleteBtn"]))
        {

            $sql_delete = "DELETE FROM khach_hang WHERE Ma_khach_hang = '".$ma_kh."'"; 
            if(mysqli_query($conn, $sql_delete))
            {
                echo '<p align="center">XÓA THÔNG TIN THÀNH CÔNG!!</p>';
                echo '<p align="center"><a href="ex2_12_mysql.php">Quay về</a></p>';
            }
            else
                echo '<p align="center">KHÁCH HÀNG '.$ma_kh.' ĐÃ MUA HÀNG NÊN KHÔNG THỂ XÓA ĐƯỢC!</p>';


        } 
    ?>
</body>
</html>