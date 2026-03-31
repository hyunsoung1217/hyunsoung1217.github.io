<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>놀이공원 요금 계산기</title>
    <style>
        body { font-family: "맑은 고딕", sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 650px; margin-bottom: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .input-section { margin-bottom: 15px; }
        .result-box { 
            background-color: #fafafa; 
            padding: 15px; 
            border: 1px dashed #ccc; 
            width: 620px; 
            line-height: 1.8;
        }
    </style>
</head>
<body>

<?php
// 1. 요금 데이터 설정 (번호, 구분, 어린이요금, 어른요금, 비고)
$items = [
    1 => ["입장권", 7000, 10000, "입장"],
    2 => ["BIG3", 12000, 16000, "입장+놀이3종"],
    3 => ["자유이용권", 21000, 26000, "입장+놀이자유"],
    4 => ["연간이용권", 70000, 90000, "입장+놀이자유"]
];
?>

<form method="post">
    <div class="input-section">
        고객성명 <input type="text" name="customer_name" required>
        <input type="submit" name="calc" value="합계" style="float: right; padding: 5px 15px;">
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>구분</th>
            <th>어린이</th>
            <th>어른</th>
            <th>비고</th>
        </tr>
        <?php foreach ($items as $no => $info): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $info[0] ?></td>
            <td>
                <?= number_format($info[1]) ?>원 
                <select name="child_<?= $no ?>">
                    <?php for($i=0; $i<=10; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
            </td>
            <td>
                <?= number_format($info[2]) ?>원 
                <select name="adult_<?= $no ?>">
                    <?php for($i=0; $i<=10; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
            </td>
            <td><?= $info[3] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>

<hr>

<?php
// 2. [합계] 버튼을 눌렀을 때 실행되는 계산 로직
if (isset($_POST['calc'])) {
    $name = htmlspecialchars($_POST['customer_name']);
    $total_price = 0;
    $details = "";

    foreach ($items as $no => $info) {
        $c_count = $_POST["child_$no"]; // 선택한 어린이 수량
        $a_count = $_POST["adult_$no"]; // 선택한 어른 수량

        // 어린이 계산
        if ($c_count > 0) {
            $price = $c_count * $info[1];
            $total_price += $price;
            $details .= "어린이 {$info[0]} {$c_count}매<br>";
        }
        // 어른 계산
        if ($a_count > 0) {
            $price = $a_count * $info[2];
            $total_price += $price;
            $details .= "어른 {$info[0]} {$a_count}매<br>";
        }
    }

    // 3. 결과 출력
    echo "<div class='result-box'>";
    echo date("Y년 m월 d일 A g:i분") . "<br>";
    echo "<strong>{$name}</strong> 고객님 감사합니다.<br>";
    echo $details;
    echo "<strong>합계 " . number_format($total_price) . "원입니다.</strong>";
    echo "</div>";
}
?>

</body>
</html>
