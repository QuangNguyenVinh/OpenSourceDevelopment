<!DOCTYPE html>
<html>
    <body>
        <h1>Tìm sách</h1>
        <form action="" method="POST">
            Từ khóa : <input type="text" name = "txtKeyword"/>
            <input type="submit" value="Search"/>
        </form>
        <?php
            $strKeyWord = "";
            if(isset($_POST["txtKeyword"]))
                $strKeyWord = $_REQUEST["txtKeyword"];    
        ?>
        <p>Từ khóa chính là : <?php echo $strKeyWord; ?>
    </body>
</html>