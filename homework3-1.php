<?php
$n = 30;
$sum = 0;
$prod = 1;
for($i=0; $i<$n;$i++){
    $sum+=$i;
    $product *= $i;
}
echo "1부터 " . $n . "까지의 합: " . $sum . "\n<br>";
echo "1부터 " . $n . "까지의 곱: " . $product;
