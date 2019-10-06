<?php
    $n = rand(1, 100);
    echo "Gia tri n la: $n \n";
    echo "Gia tri chan tu 1 toi $n la: ";
    for($i = 1; $i <= $n; $i++)
        if (!($i & 1))
            echo "$i ";
?>