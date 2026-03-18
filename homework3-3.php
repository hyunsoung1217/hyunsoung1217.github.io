<?php
$n = <rand>(1,100);
$f = [0, 1, 1];

echo "<pre>i   f_i   f_{i+1}/f_i</pre>";

for ($i = 1; $i <= $n; $i++) {
  
    if ($i > 2) {
        $f[$i] = $f[$i-1] + $f[$i-2];
    }

    $next_f = ($i == 1) ? 1 : $f[$i] + $f[$i-1];
    $ratio = $next_f / $f[$i];

    echo "$i   $f[$i]   " . round($ratio, 6) . "<br>";
}
?>
