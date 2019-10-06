<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
            <table border="0">
                <tr bgcolor = "yellow">
                <th colspan="2" align="center"><h2><font color = "red">
                    THANH TOÁN TIỀN ĐIỆN
                    </font></h2></th>
                </tr>
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
                        <input type="submit" value="Tính" name="Calc"/>
                    </td>
                </tr>
            </table>

        </form>
    </body>
</html>