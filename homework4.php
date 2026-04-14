<?php
$link = mysqli_connect("localhost", "root", "", "amusementpark");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>homework 4</title>
    <style>
        body { font-family: "맑은 고딕", sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 750px; margin-bottom: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<form action="homework4.php" method="GET"> 고객성명 <input type="text" name="customer_name" required>
    <input type="submit" name="calc" value="합계" style="float: right;">

    <table>
        <tr>
            <th>No</th><th>구분</th><th>어린이</th><th>어른</th><th>비고</th>
        </tr>
        
        <tr>
            <td>1</td>
            <td>입장권</td>
            <td>7,000 
                <select name="sel11"> <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>10,000 
                <select name="sel12"> <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>입장</td>
        </tr>

        <tr>
            <td>2</td>
            <td>BIG3</td>
            <td>12,000 
                <select name="sel21">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>16,000 
                <select name="sel22">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>입장+놀이3종</td>
        </tr>

        <tr>
            <td>3</td>
            <td>자유이용권</td>
            <td>21,000 
                <select name="sel31">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>26,000 
                <select name="sel32">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>입장+놀이자유</td>
        </tr>

        <tr>
            <td>4</td>
            <td>연간이용권</td>
            <td>70,000 
                <select name="sel41">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>90,000 
                <select name="sel42">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                </select>
            </td>
            <td>입장+연간이용</td>
        </tr>
    </table>
</form>

<?php
if (isset($_GET['calc'])) {
    $name = $_GET['customer_name'];
    $date_now = date("Y년 n월 j일 a g:i분"); //
    $total = ($_GET['sel11'] * 7000) + ($_GET['sel12'] * 10000) + ($_GET['sel21'] * 12000) + ($_GET['sel22']* 16000) + 
             ($_GET['sel31'] * 21000) + ($_GET['sel32'] * 26000) + ($_GET['sel41'] * 70000) + ($_GET['sel42'] * 90000);
    // 화면 출력
    echo "<div>";
    echo "$date_now<br>";
    echo "<strong>$name</strong> 고객님 감사합니다.<br>";
    if($_GET['sel11'] > 0) echo "어린이 입장권 {$_GET['sel11']}매<br>"; if($_GET['sel12'] > 0) echo "어른 입장권 {$_GET['sel12']}매<br>";
    if($_GET['sel21'] > 0) echo "어린이 BIG3 {$_GET['sel21']}매<br>"; if($_GET['sel22'] > 0) echo "어른 BIG3 {$_GET['sel22']}매<br>";
    if($_GET['sel31'] > 0) echo "어린이 자유이용권 {$_GET['sel31']}매<br>"; if($_GET['sel32'] > 0) echo "어른 자유이용권 {$_GET['sel32']}매<br>";
    if($_GET['sel41'] > 0) echo "어린이 연간이용권 {$_GET['sel41']}매<br>"; if($_GET['sel42'] > 0) echo "어른 연간이용권 {$_GET['sel42']}매<br>";
    echo "합계 <strong>" . number_format($total) . "원</strong>입니다.";
    echo "</div>";

    $sql = "INSERT INTO users(Date,Name,EnterChild,EnterAdult,Big3Child,Big3Adult,FreeChild,FreeAdult,YearChild,YearAdult)
            VALUES ('$date_now', '$name', '{$_GET['sel11']}', '{$_GET['sel12']}', '{$_GET['sel21']}', '{$_GET['sel22']}', '{$_GET['sel31']}', '{$_GET['sel32']}', '{$_GET['sel41']}', '{$_GET['sel42']}')";
    echo"SQL:".$sql."<br>";
    mysqli_query($link, $sql);
    echo"에러내용".mysqli_error($link);
    mysqli_close($link);
}
?>
</body>
</html>
