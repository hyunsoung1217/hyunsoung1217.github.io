<?php
$n = 30;
$arr = [];

for ($i = 0; $i < $n; $i++) {
    $arr[$i] = rand(10, 100);
}

// 오름차순 정렬
sort($arr);

echo "<br>올림차순 정렬 결과: ";
foreach ($arr as $value) {
    echo $value . " ";
}
?>
