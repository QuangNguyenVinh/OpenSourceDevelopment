<?php
    abstract class NhanVien
    {
        private $HoTen, $GioiTinh, $NgayVaoLam, $HeSoLuong, $SoCon;
        const LuongCanBan = 1200000;
        const ToDay = 2019;
        function getHoTen()
        {
            return $this->HoTen;
        }
        function getGioiTinh()
        {
            return $this->GioiTinh;
        }
        function getNgayVaoLam()
        {
            return $this->NgayVaoLam;
        }
        function getHeSoLuong()
        {
            return $this->HeSoLuong;
        }
        function getSoCon()
        {
            return $this->SoCon;
        }
        function getLuongCanBan()
        {
            return self::LuongCanBan;
        }

        function setHoTen($HoTen)
        {
            $this->HoTen = $HoTen;
        }
        function setGioiTinh($GioiTinh)
        {
            $this->GioiTinh = $GioiTinh;
        }
        function setNgayVaoLam($NgayVaoLam)
        {
            $this->NgayVaoLam = $NgayVaoLam;
        }
        function setSoCon($SoCon)
        {
            $this->SoCon = $SoCon;
        }
        function setHeSoLuong($HeSoLuong)
        {
            $this->HeSoLuong = $HeSoLuong;
        }


        abstract public function TinhTienLuong();
        abstract public function TinhTroCap();
        public function TinhTienThuong()
        {
            $array = explode("/", $this->getNgayVaoLam()); //Split DD/MM/YYYY format string to String array
            return (self::ToDay - intval($array[count($array) - 1])) * 1000000;
        }
    
    }


    class NhanVienVanPhong extends NhanVien
    {
        private $SoNgayVang;
        const DinhMucVang = 12;
        const DonGiaPhat = 5000000;

        function getSoNgayVang()
        {
            return $this->SoNgayVang;
        }
        function setSoNgayVang($SoNgayVang)
        {
            $this->SoNgayVang = $SoNgayVang;
        }
        function TinhTroCap()
        {
            if($this->getGioiTinh() == 1)
            {
                return 200000 * $this->getSoCon();
            }
            else
            {
                return 200000 * $this->getSoCon() * 1.5;
            }
        }
        function TinhTienPhat()
        {
            if($this->getSoNgayVang() > self::DinhMucVang)
                return self::DonGiaPhat * $this->getSoNgayVang();
        }
        function TinhTienLuong()
        {
            return $this->getLuongCanBan() * $this->getHeSoLuong() - $this->TinhTienPhat();
        }

    }
    class NhanVienSanXuat extends NhanVien
    {
        private $SoSanPham;
        const DinhMucSP = 200000;
        const DonGiaSP = 2000000;

        function getSoSP()
        {
            return $this->SoSanPham;
        }
        function setSoSP($SoSanPham)
        {
            $this->SoSanPham = $SoSanPham;
        }
        function TinhTienThuong()
        {
            if($this->getSoSP() > self::DinhMucSP)
                return ($this->getSoSp() - self::DinhMucSP ) * self::DonGiaSP * 0.03;
        }
        function TinhTroCap()
        {
            return $this->getSoCon() * 120000;
        }
        function TinhTienLuong()
        {
            return ($this->getSoSP() * self::DonGiaSP) + $this->TinhTienThuong();
        }
    }


?>