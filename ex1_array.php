<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
            if(isset($_POST["n"], $_POST["Calc"]))
                $n = $_REQUEST["n"];
                $arr = randomN($n);

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
            <table border="0">
                <tr bgcolor = "yellow">
                <th colspan="2" align="center"><h2><font color = "red">
                    CAC THAO TAC TREN SO TU NHIEN
                    </font></h2></th>
                </tr>
                <tr>
                    <td>Nhap n</td>
                    <td>
                        <input type="text" name="n" value='<?php echo $n ?>'/>
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
                        <input type="submit" value="Xu ly" name="Calc"/>
                    </td>
                </tr>
            </table>

        </form>
    </body>
</html>