<html>
<body>
<head><meta charset="UTF-8"></head>
밑변<?php echo $_POST["width"]; ?><br>
높이<?php echo $_POST["height"]; ?><br>
삼각형<?php echo $_POST["width"]*$_POST["height"]/2;?><br>
직사각형<?php echo $_POST["width"]*$_POST["height"];?><br>
원<?php echo $_POST["radius"]**2*pi();?><br>
직육면체<?php echo $_POST["width"]*$_POST["height"]*$_POST["legth"];?><br>
원통<?php echo $_POST["radius"]**2*pi()*$_POST["height"];?><br>
구<?php echo $_POST["radius"]**3*pi()*4/3;?><br>
</body>
</html>
