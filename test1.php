<?php
$myfile = fopen("jsonOrderDress.txt", "w");
$array = array();
fwrite($myfile, json_encode($array));
fclose($myfile);
