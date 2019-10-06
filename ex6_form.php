<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="ex6_form_res.php" method="POST">
            <table>
                <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
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
                    <td><input type="submit" name="Calc"/ value="Tính"></td>
                </tr>
            </table>
        </form>
    </body>
</html>