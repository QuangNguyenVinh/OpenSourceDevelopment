<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Phép tính trên hai số</title>
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
        <form action="ex6_form_res.php" method="POST">
            <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
            <table align="center">   
                <tr>
                    <td>Chọn phép tính</td>
                    <td>
                        <input type="radio" checked name="operator" value="+"/>Cộng
                        <input type="radio" name="operator" value="-"/>Trừ
                        <input type="radio" name="operator" value="*"/>Nhân
                        <input type="radio" name="operator" value="/"/>Chia
                    </td>
                </tr>
                <tr>
                    <td>Số thứ nhất</td>
                    <td><input type="text" value="" name="firstNum"/></td>
                </td>
                <tr>
                    <td>Số thứ hai</td>
                    <td><input type="text" value="" name="secondNum"/></td>
                </td>
                <tr>
                    <td colspan="2"><input type="submit" name="Calc" align="center" value="Tính" style="background-color: #f9f895" ></td>
                </tr>
            </table>
        </form>
    </body>
</html>