<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Diện tích và chu vi hình tròn</title>
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
            if(isset($_POST["radius"]))
                $radius = $_REQUEST["radius"];
            else $radius = 0;

            if(isset($_POST["perimeter"]))
                $perimeter = $_REQUEST["perimeter"];
            else $perimeter = 0;

            if(isset($_POST["area"]))
                $area = $_REQUEST["area"];
            else $area = 0;
        ?>
        <form action ="" method="POST">
            <h3><font color ="black">
                    DIỆN TÍCH và CHU VI HÌNH TRÒN
                    </font></h3>
            <table border="0" align="center">
                <tr>
                    <td>Bán kính</td>
                    <td>
                        <input type="text" name="radius" value='<?php echo $radius ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Chu vi</td>
                    <td>
                    <input type="text" name="perimeter" readonly disabled="disabled"
                        value='<?php echo $perimeter = round(2 * $radius * pi()) ?>'
                        />
                    </td>
                </tr>
                <tr>
                    <td>Diện tích</td>
                    <td>
                        <input type="text" name="area" readonly disabled="disabled"
                        value='<?php echo $area = round($radius * $radius * pi()) ?>'
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