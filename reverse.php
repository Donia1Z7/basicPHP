<?php
$copy_number = $number = 153;
$reversed_num=0;

while ($copy_number>0){
     
    $digit = $copy_number % 10 ;
     $reversed_num *=10;
     $reversed_num += $digit;

    $copy_number =(int)($copy_number/10);

}
echo $reversed_num;
