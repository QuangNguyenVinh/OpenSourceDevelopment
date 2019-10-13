<?php
    class PhanSo
    {
        private $Tu, $Mau;
        function __construct($Tu, $Mau)
        {
            $this->Tu = $Tu;
            $this->Mau = $Mau;
        }
        function getMau()
        {
            return $this->Mau;
        }
        function getTu()
        {
            return $this->Tu;
        }
        function isValid($num)
        {
            if($num == 0)
                return false;
            return true;
        }
        function CongPS(PhanSo $ps)
        {
            $this->Tu = $this->Tu * $ps->getMau() + $this->Mau * $ps->getTu();
            $this->Mau = $this->Mau * $ps->getMau();
        }
        function TruPS(PhanSo $ps)
        {
            $this->Tu = $this->Tu * $ps->getMau() - $this->Mau * $ps->getTu();
            $this->Mau = $this->Mau * $ps->getMau();
        }
        function NhanPS(PhanSo $ps)
        {
            $this->Tu = $this->Tu * $ps->getTu();
            $this->Mau = $this->Mau * $ps->getMau();
        }
        function ChiaPS(PhanSo $ps)
        {
            if($this->isValid($ps->getMau()) && $this->isValid($ps->getTu()))
            {
                $this->Tu = $this->Tu * $ps->getMau();
                $this->Mau = $this->Mau * $ps->getTu();   
            }

        }
        function UCLN($Tu, $Mau)
        {
            if($Tu < 0 ) $Tu = -$Tu;
            if($Mau < 0) $Mau = -$Mau;
            if ($Tu == 0 || $Mau == 0)
            {
                return $Tu + $Mau;
            }
            while ($Tu != $Mau){
                if ($Tu > $Mau){
                    $Tu -= $Mau; 
                }else{
                    $Mau -= $Tu;
                }
            }
            return $Tu; 
        }
        function RutGonPS()
        {
            $gcd = $this->UCLN($this->Tu, $this->Mau);
            if($gcd != 0)
            {
                $this->Tu = $this->Tu / $gcd;
                $this->Mau = $this->Mau / $gcd;
            }

        }
        function printPS()
        {
            return $this->Tu."/".$this->Mau;
        }
        function getRes()
        {
            $this->RutGonPS();
            if($this->Tu != 0 && $this->Tu % $this->Mau == 0)
                return $this->Tu/$this->Mau;
            if($this->Tu == 0)
                return 0;
            return $this->Tu."/".$this->Mau;
        }

    }
?>
