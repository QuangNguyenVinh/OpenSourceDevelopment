<?php
    error_reporting(0);
    $operator = "Null";
    $firstNum = 0;
    $secondNum = 0;
    $res = 0;
    if(isset($_POST["Calc"]))
    {
        $operator = $_POST["operator"];
        $firstNum = $_POST["firstNum"];
        $secondNum = $_POST["secondNum"];
        switch ($operator)
        {
            case "+":
                $operator = "Cộng";
                $res = $firstNum + $secondNum;
                break;
            case "-":
                $operator = "Trừ";
                $res = $firstNum - $secondNum;
                break;
            case "*":
                $operator = "Nhân";
                $res = $firstNum * $secondNum;
                break;
            case "/":
                $operator = "Chia";
                if($secondNum != 0)
                    $res = $firstNum / $secondNum;
                else 
                {
                    echo "<script>alert('Lỗi chia cho 0')</script>";
                    echo "<script>window.onload(window.history.back(-1))</script>";
                }
                break;
        }
    }
?>
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
                text-align: center;
            }    
        </style>
    </head>
    <body>
    <form>
        <h3 align="center">PHÉP TÍNH TRÊN HAI SỐ</h3>
        <table>
        <tr>
            <td>Chọn phép tính:</td>
            <td><?php echo $operator?></td>
        </tr>
        <tr>
            <td>Số thứ nhất:</td>
            <td><input type="number" value="<?php echo $firstNum?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td>Số thứ hai:</td>
            <td><input type="number" value="<?php echo $secondNum?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td>Kết quả:</td>
            <td><input type="text" value="<?php echo $res?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td align="center"><a href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
        </tr>
    </table>
</form>
</body>
</html>