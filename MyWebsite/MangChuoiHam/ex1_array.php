<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Bài 1 Mảng</title>
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
                text-align: center;
            }    
        </style>        
    </head>
    <body>
        <?php
            $n = 0;
            $arr = array();
            if(isset($_POST["n"], $_POST["Calc"]))
            {
                $n = $_REQUEST["n"];
                $arr = randomN($n);
            }
                

            function printArray($arr)
            {
                foreach($arr as $value)
                    echo $value."\t\t";
            }
            function randomN($n)
            {
                $arr = array();
                for($i = 1; $i <= $n; $i++)
                    $arr[] = rand(-100,100);
                return $arr;
            }
            function evenNumber($arr)
            {
                foreach($arr as $value)
                {
                    if($value % 2 == 0)
                        echo " " . $value . "\t";
                }

            }
            function lessThan100($arr)
            {
                foreach($arr as $value)
                {
                    if($value < 100)
                        echo " " . $value . "\t";
                }
            }
            function sumOfNegNum($arr)
            {
                $sum = 0;
                foreach($arr as $value)
                {
                    if($value < 0)
                        $sum += $value;
                        
                }
                return $sum;
            }
            function indexOfZeroNum($arr)
            {
                for($i = 0; $i < count($arr); $i++)
                    if($arr[$i] == 0)
                        echo $i . "\t";
            }


        ?>
        <form action ="" method="POST">
            <h3><font>
                    CÁC THAO TÁC TRÊN SỐ TỰ NHIÊN
                    </font></h3>
            <table border="2" align="center">
                <tr>
                    <td>Nhap n</td>
                    <td>
                        <input type="number" max="30" name="n" value='<?php echo $n ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Cau 1: </td>
                    <td>
                        <?php
                            printArray($arr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cau 2: </td>
                    <td>
                        <?php
                            evenNumber($arr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cau 3: </td>
                    <td>
                        <?php
                            lessThan100($arr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cau 4: </td>
                    <td>
                        <?php
                            echo sumOfNegNum($arr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cau 5: </td>
                    <td>
                        <?php
                            indexOfZeroNum($arr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cau 6: </td>
                    <td>
                        <?php
                            sort($arr);
                            printArray($arr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Xử lý" name="Calc" style="background-color: #f9f895"/>
                    </td>
                </tr>
            </table>
            <div id="question">
                <ol type="1">
                    <li>Hiển thị mảng phát sinh ngẫu nhiên có n phần tử là số nguyên.</li>
                    <li>Đếm số phần tử trong mảng có giá trị là số chẵn.</li>
                    <li>Đếm số phần tử trong mảng có giá trị là số nhỏ hơn 100.</li>
                    <li>Tính tổng của các phần tử trong mảng có giá trị là số âm.</li>
                    <li>In ra vị trí của các phần tử trong mảng có giá trị bằng 0.</li>
                    <li>Sắp xếp các phần tử theo thứ tự tăng dần rồi in mảng ra màn hình.</li>
                </ol>
            </div>

        </form>
    </body>
</html>