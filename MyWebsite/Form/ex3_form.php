<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Thanh toán tiền điện</title>
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
            if(isset($_POST["nameOwner"]))
                $nameOwner = $_REQUEST["nameOwner"];
            else $nameOwner = "";

            if(isset($_POST["oldVal"]))
                $oldVal = $_REQUEST["oldVal"];
            else $oldVal = 0;

            if(isset($_POST["newVal"]))
                $newVal = $_REQUEST["newVal"];
            else $newVal = 0;

            if(isset($_POST["price"]))
                $price = $_REQUEST["price"];
            else $price = 2000;

            if(isset($_POST["payment"]))
                $pay = $_REQUEST["payment"];
            else $pay = 0;
        ?>
        <form action ="" method="POST">
            <h3><font color ="black">
                    THANH TOÁN TIỀN ĐIỆN
                    </font></h3>
            <table border="0" align="center">
                <tr>
                    <td>Tên chủ hộ</td>
                    <td>
                        <input type="text" name="nameOwner" value='<?php echo $nameOwner ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Chỉ số cũ</td>
                    <td>
                        <input type="text" name="oldVal" value='<?php echo $oldVal ?>'/>
                        Kw
                    </td>
                </tr>
                <tr>
                    <td>Chỉ số mới</td>
                    <td>
                        <input type="text" name="newVal" value='<?php echo $newVal ?>'/>
                        Kw
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                        <input type="text" name="price" value='<?php echo $price ?>'/>
                        VNĐ
                    </td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán</td>
                    <td>
                        <input type="text" name="payment" readonly disabled="disabled"
                        value='<?php echo $pay = ($newVal - $oldVal) * $price ?>'
                        />
                        VNĐ
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