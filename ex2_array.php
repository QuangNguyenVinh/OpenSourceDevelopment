<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
            $sumArr = 0;
            $str_arr = "";
            function splitNumInArr($str_arr)
            {
                $arr = explode(",", $str_arr);
                return $arr;
            }
            function sumArr($arr)
            {
                $sum = 0;
                for($i = 0; $i < count($arr); $i++)
                    $sum += $arr[$i];
                return $sum;
            }
            if(isset($_POST["numArr"], $_POST["CalcSumArr"]))
            {
                $str_arr = $_REQUEST["numArr"];
                $sumArr = sumArr(splitNumInArr($str_arr));
            }
        ?>
        <form action="" method="POST">
            <table>
                <h3>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
                <tr>
                    <td>Nhập dãy số:</td>
                    <td><input type="text" name="numArr" value="<?php echo $str_arr ?>"> (*)</td>
                </tr>
                <tr>
                    <td><input type="submit" name="CalcSumArr" value="Tổng dãy số"></td>
                </tr>
                <tr>
                    <td>Tổng dãy số:</td>
                    <td><input type="text" name="res" value="<?php echo $sumArr ?>"></td>
                </tr>
                <tr>
                    <td>(*) Các số được nhập cách nhau bằng dấu ","</td>
                </tr>
            </table>
        </form>
    </body>
</htnl>