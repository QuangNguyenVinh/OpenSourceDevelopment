<?php
    session_start();

    $fieldSV = array(
        "MaSV" => array('58131369'),
        "HoTenSV" => array('Nguyễn Vinh Quang'),
        "NgaySinh" => array('16/02/1998'),
        "GioiTinh" => array('Nam'),
        "DiaChi" => array('8 Đường số 2'),
        "TenLop" => array('58CNTT1')
    );

    if(isset($_SESSION["DB"]))
        $DB = $_SESSION["DB"];
    else
        $DB = $fieldSV;

    $maSV = "";
    $htSV = "";
    $nsSV = "";
    $gtSV = "";
    $dcSV = "";
    $tlSV = "";

    

    function isExist($arr, $key)// Kiểm tra xem Mã SV mới thêm vào có tồn tại chưa.
    {
        if(!is_null($arr))
        {
            for($i = 0; $i < count($arr["MaSV"]); $i++)
                if($key == $arr["MaSV"][$i])
                    return true;
            return false;
        }

    }
    function addSV($arr, $maSV, $htSV, $nsSV, $gtSV, $dcSV, $tlSV)
    {
        if(!is_null($arr))
        {
            if(!isExist($arr, $maSV))
            {
                {
                    $arr["MaSV"][count($arr["MaSV"])] = $maSV;
                    $arr["HoTenSV"][count($arr["HoTenSV"])] = $htSV;
                    $arr["NgaySinh"][count($arr["NgaySinh"])] = $nsSV;
                    $arr["GioiTinh"][count($arr["GioiTinh"])] = $gtSV;
                    $arr["DiaChi"][count($arr["DiaChi"])] = $dcSV;
                    $arr["TenLop"][count($arr["TenLop"])] = $tlSV;
                    return $arr;
                }
            }
            else
                {
                    echo "<script>alert('Sinh viên nãy đã tồn tại trong hệ thống!')</script>";
                }
        }
        return $arr;
    }
    function Xuat($arr)
    {
        echo '<table border="1">';
        echo '<tr>
            <th>Mã sinh viên</th>
            <th>Họ tên sinh viên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Tên lớp</th>
        </tr>';
        for($i = 0; $i < count($arr["MaSV"]); $i++)
        {
            echo '<tr>';
            echo '<td>'.$arr["MaSV"][$i].'</td>';
            echo '<td>'.$arr["HoTenSV"][$i].'</td>';
            echo '<td>'.$arr["NgaySinh"][$i].'</td>';
            echo '<td>'.$arr["GioiTinh"][$i].'</td>';
            echo '<td>'.$arr["DiaChi"][$i].'</td>';
            echo '<td>'.$arr["TenLop"][$i].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    if(isset($_POST["themSV"]))
    {
        $maSV = $_POST["maSV"];
        $htSV = $_POST["htSV"];
        $nsSV = $_POST["nsSV"];
        $gtSV = $_POST["gtSV"];
        $dcSV = $_POST["dcSV"];
        $tlSV = $_POST["tlSV"];
        if($gtSV != "Nam")
            $gtSV = "Nữ";
        
        $DB = AddSV($DB, $maSV, $htSV, $nsSV, $gtSV, $dcSV, $tlSV);
        
        $_SESSION["DB"] = $DB;
    }
      



   
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đề 3</title>
    <style type="text/css">
        form
            {
                background-color: #ccd9cf;
                text-align: center;

            }
        h3
            {
                background-color: #2d9498;
                text-align: center;
            }    
        </style>    
</head>
<body>
    <form action="" method="POST" align="center">
        <h3>THÔNG TIN SINH VIÊN</h3>
        <table align="center">
            <tr>
                <td>Mã sinh viên</td>
                <td><input type="text" name="maSV" required></td>
            </tr>
            <tr>
                <td>Họ và tên sinh viên</td>
                <td><input type="text" name="htSV" required></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><input type="text" name="nsSV" required></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <input type="radio" name="gtSV" value="Nam" checked="checked"> Nam
                    <input type="radio" name="gtSV" value="Nu"> Nữ
                </td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="dcSV" required></td>
            </tr>
            <tr>
                <td>Tên lớp</td>
                <td><input type="text" name="tlSV" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="themSV" value="Thêm sinh viên" style="background-color: #f9f895">
                </td>
            </tr>
        </table>
        <div align="center">
            <?php Xuat($DB); ?>
        </div>
    </form>
</body>
</html>