<?php
$myfile = fopen("jsonOrderDress.txt", "r") or die("Unable to open file!");
$obj = json_decode(fread($myfile, filesize("jsonOrderDress.txt")));
var_dump($obj);
fclose($myfile);
