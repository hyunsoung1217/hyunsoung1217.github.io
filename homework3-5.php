<!DOCTYPE html>
<html>
<head>
    <style>

        table {
            width: 600px;
            border-collapse: collapse;
            text-align: left;
            font-family: "맑은 고딕", sans-serif;
            border: 1px solid #333;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            width: 14%;
            height: 60px;
            vertical-align: top;
        }
       
        .title-row {
            background-color: #a7c1e1;
            text-align: center;
            font-weight: bold;
            font-size: 1.2em;
        }
        
        .day-header {
            background-color: #e9b3bc; 
            text-align: center;
        }
    </style>
</head>
<body>

<?php

    $year = 2001;
    $month = 2;


    $total_days = date('t', mktime(0, 0, 0, $month, 1, $year));
    

    $start_day = date('w', mktime(0, 0, 0, $month, 1, $year));
?>

<table>
    <tr class="title-row">
        <td colspan="7"><?php echo "{$year}년 {$month}월 달력"; ?></td>
    </tr>
    
    <tr class="day-header">
        <td>일</td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td>토</td>
    </tr>

    <tr>
        <?php

        for ($i = 0; $i < $start_day; $i++) {
            echo "<td>&nbsp;</td>";
        }

        for ($day = 1; $day <= $total_days; $day++) {
            echo "<td>$day</td>";


            if (($day + $start_day) % 7 == 0) {
                echo "</tr><tr>";
            }
        }

        $remaining_cells = (7 - (($total_days + $start_day) % 7)) % 7;
        for ($i = 0; $i < $remaining_cells; $i++) {
            echo "<td>&nbsp;</td>";
        }
        ?>
    </tr>
</table>

</body>
</html>
