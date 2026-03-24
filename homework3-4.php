<html>
<body>
<head><meta charset="UTF-8"></head>
<form action="homework3-4.php" method="get">
밑변(세로): <input type="text" name="width"><br>
높이: <input type="text" name="height"><br>
가로: <input type="text" name="legth"><br>
지름: <input type="text" name="radius"><br>
<input type="submit">
</form>
<?php if (isset($_GET["width"]) && isset($_GET["height"])&& isset($_GET["legth"])&& isset($_GET["radius"])){
    echo"삼각형 : " . $_GET{"width"}/2*$_GET{"height"}."<br>";
    echo "직사각형 : " .$_GET{"width"}*$_GET{"height"}."<br>";
    echo "원 : " . $_GET["radius"]**2*pi()."<br>";
    echo"직육면체:".$_GET["width"]*$_GET["height"]*$_GET["legth"]."<br>";
    echo"원통 :".$_GET["radius"]**2*pi()*$_GET["height"]."<br>";
    echo"구:".$_GET["radius"]*3/4**3*pi()."<br>";
}
?>
</body>
</html>
