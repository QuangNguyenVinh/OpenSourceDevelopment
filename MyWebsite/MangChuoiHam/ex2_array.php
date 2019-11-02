<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            form
            {
                background-color: #ccd9cf;
                text-align: center;
            }
            h3
            {
                background-color: #2d9498;
                color: white;
            }
            
        </style>
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
        <form action="" method="POST" align="center" >
            <table border="1" align="center" >
                <h3 align="center" >NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
                <tr>
                    <td>Nhập dãy số:</td>
                    <td><input type="text" name="numArr" value="<?php echo $str_arr ?>" required> (*)</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="CalcSumArr" style="background-color: #f9f895" value="Tổng dãy số"></td>
                </tr>
                <tr>
                    <td>Tổng dãy số:</td>
                    <td><input type="text" name="res" value="<?php echo $sumArr ?>" disabled="disabled"></td>
                </tr>
            </table>
            <span style="color: red">(*) </span> Các số được cách nhau bằng dấu ","
        </form>
    </body>
</htnl>