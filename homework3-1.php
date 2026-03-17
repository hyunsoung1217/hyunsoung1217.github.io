<?php
$n = 30;
$sum = 0;
$prod = 1;

echo "1부터 $n 까지의 숫자: ";
for ($i = 1; $i <= $n; $i++) {
    echo $i . ($i == $n ? "" : ", ");
    $sum += $i;
    $prod *= $i;
}

echo "<br>1 + ... + $n = $sum";
echo "<br>1 * ... * $n = " . number_format($prod, 0, '', ''); 
?>
