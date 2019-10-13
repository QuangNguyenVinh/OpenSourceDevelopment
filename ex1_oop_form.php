<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Quản lý nhân viên</title>
    <style>
        form {
            background-color: #ccd9cf;
            margin-top: 5%;
            left: 30%;
            position: absolute;
        }
        h2{
            background-color: #2d9498;
            color: white;
            text-align: center;
            margin: 0px;
            padding: 10px 0px;
        }
        tr{
            background-color:#CCFDF9 ;
        }
    </style>
</head>
<body>
    <?php
        require 'ex1_oop.php';
        $TenNV = "";
        $SoCon = 0;
        $NgayVaoLam = "12/10/2019";
        $GioiTinh = 1;
        $NgaySinh = "";
        $HeSoLuong = 0;  
        $SoNgayVang = 0;
        $SoSP = 0;
        
        $ThucLinh =
        $Phat =
        $Thuong =
        $Luong =
        $TroCap = 0;
        if(isset($_POST["TinhLuongBtn"]))
        {
            $TenNV = $_POST["HoTenNV"];
            $SoCon = $_POST["SoCon"];
            $NgayVaoLam = $_POST["NgayVaoLam"];
            $GioiTinh = $_POST["GioiTinh"];
            $NgaySinh = $_POST["NgaySinh"];
            $HeSoLuong = $_POST["HSLuong"];

            if($_POST["LoaiNV"] == "VP")
            {   
                $SoNgayVang = $_POST["SoNgayVang"];
                $nv = new NhanVienVanPhong();
                $nv->setHoTen($TenNV);
                $nv->setNgayVaoLam($NgayVaoLam);
                $nv->setGioiTinh($GioiTinh);
                $nv->setSoCon($SoCon);
                $nv->setHeSoLuong($HeSoLuong);
                $nv->setSoNgayVang($SoNgayVang);

                $TroCap = $nv->TinhTroCap();
                $Thuong = $nv->TinhTienThuong();
                $Phat = $nv->TinhTienPhat();
                $Luong = $nv->TinhTienLuong();

                $ThucLinh = $Luong + $TroCap + $Thuong - $Phat;
            }
            else
            {
                $SoSP = $_POST["SoSP"];
                $nv = new NhanVienSanXuat();
                $nv->setHoTen($TenNV);
                $nv->setNgayVaoLam($NgayVaoLam);
                $nv->setGioiTinh($GioiTinh);
                $nv->setSoCon($SoCon);
                $nv->setHeSoLuong($HeSoLuong);
                $nv->setSoSP($SoSP);

                $TroCap = $nv->TinhTroCap();
                $Thuong = $nv->TinhTienThuong();
                $Luong = $nv->TinhTienLuong();

                $ThucLinh = $Luong + $TroCap + $Thuong ;
            }
        }


    ?>
<form action="" method="post">
    <h2>QUẢN LÝ NHÂN VIÊN</h2>
    <table>
        <tr>
            <td>Họ và tên: </td>
            <td><input type="text" name="HoTenNV" value="<?php echo $TenNV ?>" required></td>
            <td>Số con: </td>
            <td><input type="number" name="SoCon"  required min="0"></td>
        </tr>
        <tr>
            <td>Ngày sinh: </td>
            <td><input type="text" name="NgaySinh" value="<?php echo $NgaySinh; ?>"required></td>
            <td>Ngày vào làm: </td>
            <td><input type="text" name="NgayVaoLam" value="<?php echo $NgayVaoLam; ?>"required></td>
        </tr>
        <tr>
            <td>Giới tính: </td>
            <td>
                <input type="radio" name="GioiTinh" value="Nam" checked>Nam&nbsp;
                <input type="radio" name="GioiTinh" value="Nữ">Nữ
            </td>
            <td>Hệ số lương: </td>
            <td><input type="number" name="HSLuong" required></td>
        </tr>
        <tr>
            <td>Loại nhân viên: </td>
            <td><input type="radio" id="NVVP" name="LoaiNV" value="VP" checked >Văn phòng</td>
            <td colspan="2"><input type="radio" id="NVSX"  name="LoaiNV" value="SX">Sản xuất</td>
        </tr>
        <tr>
            <td></td>
            <td>Số ngày vắng: <input type="number" id="SoNgayVang"  name="SoNgayVang" min="0" required></td>
            <td colspan="2">Số sản phẩm: <input type="number" id="SoSP"  name="SoSP" min="0" required></td>
        </tr>
        <tr style="background-color: #CCFDF9" align="center">
            <td colspan="4"><button type="submit" id="TinhLuongBtn" name="TinhLuongBtn">Tính lương</button></td>
        </tr>
        <tr>
            <td>Tiền lương: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $Luong ?>"></td>
            <td>Trợ cấp: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $TroCap ?>"></td>
        </tr>
        <tr>
            <td>Tiền thưởng: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $Thuong ?>"></td>
            <td>Tiền phạt: </td>
            <td><input type="text" disabled="disabled" value="<?php echo $Phat ?>"></td>
        </tr>
        <tr align="center">
            <td colspan="4">Thực lĩnh <input type="text" disabled="disabled" value="<?php echo $ThucLinh ?>"></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    disableSoSP();
    document.getElementById("NVVP").onclick = function() {disableSoSP()};

    function disableSoSP() 
    {
        if(document.getElementById("NVVP").checked == true)
        {
            document.getElementById("SoNgayVang").disabled = false;
            document.getElementById("SoSP").disabled = true;
        }
    }

    document.getElementById("NVSX").onclick = function() {disableSoNV()};

    function disableSoNV()
    {
        if(document.getElementById("NVSX").checked == true)
        {
            document.getElementById("SoNgayVang").disabled = true;
            document.getElementById("SoSP").disabled = false;
        }  
    }
    
</script>
</body>
</html>