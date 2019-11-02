<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Kết quả thi Đại học</title>
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
        <?php
            if(isset($_POST["mathPoint"]))
                $mathPoint = $_REQUEST["mathPoint"];
            else $mathPoint = 0;

            if(isset($_POST["physicPoint"]))
                $physicPoint = $_REQUEST["physicPoint"];
            else $physicPoint = 0;

            if(isset($_POST["chemistryPoint"]))
                $chemistryPoint = $_REQUEST["chemistryPoint"];
            else $chemistryPoint = 0;

            if(isset($_POST["defaultPoint"]))
                $defaultPoint = $_REQUEST["defaultPoint"];
            else $defaultPoint = 0;

            if(isset($_POST["res"]))
                $sumPoint = $_REQUEST["res"];
            else $sumPoint = 0;
            
        ?>
        <form action ="" method="POST">
            <h3><font color="black">
                    KẾT QUẢ THI ĐẠI HỌC
                    </font></h3>
            <table border="0" align="center">
                </tr>
                <tr>
                    <td>Toán</td>
                    <td>
                        <input type="text" name="mathPoint" value='<?php echo $mathPoint ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Lý</td>
                    <td>
                        <input type="text" name="physicPoint" value='<?php echo $physicPoint ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Hóa</td>
                    <td>
                        <input type="text" name="chemistryPoint" value='<?php echo $chemistryPoint ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Điểm chuẩn</td>
                    <td>
                        <input type="text" name="defaultPoint" value='<?php echo $defaultPoint ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Tổng điểm</td>
                    <td>
                        <input type="text" name="sumPoint" readonly disabled="disabled"
                        value='<?php echo $sumPoint = $mathPoint + $physicPoint + $chemistryPoint ?>'
                        />
                    </td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td>
                        <input type="text" name="res" readonly disabled="disabled"
                        value='<?php if($defaultPoint == 0) echo ""; else if($sumPoint >= $defaultPoint) echo 'Đậu'; else echo 'Rớt' ?>'
                        />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Tính" name="Calc" style="background-color: #f9f895" />
                    </td>
                </tr>
            </table>

        </form>
    </body>
</html>