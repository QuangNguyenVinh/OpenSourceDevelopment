<?php
    abstract class Hinh
    {
        protected $ten, $dodai;
        public function setTen($ten)
        {
            $this->ten= $ten;
        }
        public function getTen($ten)
        {
            return $this->ten;
        }
        public function setDoDai($dodai)
        {
            $this->dodai = $dodai;
        }
        public function getDoDai()
        {
            return $this->dodai;
        }
        abstract public function tinhCV();
        abstract public function tinhDT();
    }
    class HinhTron extends Hinh
    {
        const PI = 3.14;
        function tinhCV()
        {
            return $this->getDoDai() *2*self::PI;
        }
        function tinhDT()
        {
            return $this->getDoDai() ** 2 * self::PI;
        }
    }
    class HinhVuong extends Hinh 
    {
        function tinhCV()
        {
            return $this->getDoDai() * 4;
        }
        function tinhDT()
        {
            return $this->getDoDai() ** 2;
        }
    }

    $hinhTron = new HinhTron();
    $hinhTron->setDoDai(5);
    echo $hinhTron->tinhCV();
?>