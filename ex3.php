<?php
   function isPrimeNumber($n) //Kiem tra so n la so nguyen to hay khong.
   {
       if($n < 2) return false;
       $m = (int)sqrt($n); 
       for($i = 2; $i < $m; $i++) //Chay tu 2 toi sqrt(n) giam thoi gian kiem tra.
        if($n % $i == 0)
            return false;
        return true;
   } 
   function sumPrimeNumber($n) //Tinh tong cac so nguyen to < n.
   {
       $sum = 0;
       for($j = 1; $j < $n; $j++)
       if(isPrimeNumber($j))
           $sum += $j;
        return $sum;

   }
   function isSquareNumber($n) //Kiem tra n co phai la so chinh phuong hay khong.
   {
        $m = (int)sqrt($n);
        if($n == 1) return false;
        if($m*$m == $n)
            return true;
        return false;
   }
   function printDivisor($n) //In cac uoc so cua n.
   {
        echo "Uoc so cua $n la: ";
        for($i = 1; $i <= $n; $i++)
        {
            if($n % $i == 0)
                echo "$i ";
        }
   }
    $n = rand(-100, 100); //random [-100,100]
    echo "Gia tri n la: $n \n";
    if($n > 0)
    {
        printDivisor($n);

        $sum = sumPrimeNumber($n);
        echo "\nTong cac so nguyen to be hon $n: $sum" ;

        if(isSquareNumber($n))
            echo "\n$n la so chinh phuong!";
        else
            echo "\n$n khong la so chinh phuong!";


    }
?>