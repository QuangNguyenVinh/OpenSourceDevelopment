<?php
    $str = "1,2,3,4,5,6,7,8,9,10";
    if(preg_match("/^[0-9\,]+$/", $str, $res))
    {
        var_dump($res);
    };
?>