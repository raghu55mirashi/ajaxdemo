<?php

// $myfile = readfile('hello.txt');

// $myfile = fopen('hello.txt','r');
// echo fread($myfile,filesize('hello.txt'));
// fclose($myfile);

$myfile = fopen('sample.json','w+');
$txt = array("name:raghu");
$txt = JSON.stringify($txt);
fwrite($myfile,$txt);
echo fread($myfile,filesize('hello.txt'));
fclose($myfile);