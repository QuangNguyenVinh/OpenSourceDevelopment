<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Diện tích hình chữ nhật</title>
        <style type="text/css">
            form
            {
                background-color: #ccd9cf;
                text-align: center;

            }
            h3
            {
                background-color: #2d9498;hite;
                text-align: center;
            }    
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST["width"]))
                $width = $_REQUEST["width"];
            else $width = 0;

            if(isset($_POST["height"]))
                $height = $_REQUEST["height"];
            else $height = 0;

            if(isset($_POST["area"]))
                $area = $_REQUEST["area"];
            else $are = 0;
        ?>
        <form action ="" method="POST">
            <h3><font color="black">
                    DIỆN TÍCH HÌNH CHỮ NHẬT
                    </font></h3>
            <table border="0" align="center">
                <tr>
                    <td>Chiều dài</td>
                    <td>
                        <input type="text" name="width" value='<?php echo $width ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Chiều rộng</td>
                    <td>
                        <input type="text" name="height" value='<?php echo $height ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Diện tích</td>
                    <td>
                        <input type="text" name="area" readonly disabled="disabled"
                        value='<?php echo $area = $width * $height ?>'
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