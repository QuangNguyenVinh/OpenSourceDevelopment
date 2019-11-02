<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tính tiền KARAOKE</title>
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
            $start = 10;
            $stop = 24; 
            $payment = 0;
            if(isset($_POST["Calc"]))
            {
                $start = $_POST["start"];
                $stop = $_POST["stop"];
                if($start>=$stop)
                    echo "<script>alert(' Giờ kết thúc phải > Giờ bắt đầu')</script>";
                else
                {
                    if($start < 17 && $stop < 17)
                        $payment = ($stop-$start)*20000;
                    else if($start > 17 && $stop > 17)
                        $payment = ($stop-$start)*45000;
                    else
                        $payment = (17 - $start)*20000 + ($stop - 17)*45000;
                }
            }
        ?>
        <form action="" method="POST">
            <h3>TÍNH TIỀN KARAOKE</h3>
                <table align="center">
                    <tr>
                        <td>Giờ bắt đầu:</td>
                        <td><input type="number" name="start" value="<?php echo $start?>" min="10" required> (h)</td>
                    </tr>
                    <tr>
                        <td>Giờ kết thúc:</td>
                        <td><input type="number" name="stop" value="<?php echo $stop?>" max="24" required> (h)
                        </td>
                    </tr>
                    <tr>
                        <td>Tiền thanh toán:</td>
                        <td><input type="number" style="background-color: #fffaae" value="<?php echo $payment?>" disabled="disabled"> (VNĐ)</td>
                    </tr>
                </table>
            <button type="submit" name="Calc" style="background-color: #f9f895" >Tính tiền</button>
        </form>
    </body>
<html>