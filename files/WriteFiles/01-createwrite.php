<?php
    $myfile = fopen("./data/newfile.txt", "w") or die("Unable to open file!");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Prueba archivos \n";
    fwrite($myfile, $txt);
    fclose($myfile);
?>