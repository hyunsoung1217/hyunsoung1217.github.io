
<?php
$link = mysqli_connect("localhost", 'root', '','classscore');
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>classscore</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0 auto;
        }
        td, th {
            border: 1px solid #ccc;
        }
        a { text-decoration: none; }
    </style>
</head>
고객성명<input type="text" name="name">
<body>
    <div class="input-wrap">
        <form action="classscore.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>구분</th>
                        <th>어린이</th>
                        <th>어른</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>입장권</td>
                        <td>7000<input type="number"></td>
                        <td>10000<input type="number" ></td>
                        <td>입장</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12000<input type="number"></td>
                        <td>16000<input type="number" name="num"></td>
                        <td>입장+놀이3종</td>
                    </tr>   
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21000<input type="number"></td>
                        <td>26000<input type="number" ></td>
                        <td>입장+놀이자유</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70000<input type="number"></td>
                        <td>90000<input type="number" ></td>
                        <td>입장+놀이자유</td>
                    </tr>
                <input type="submit" value="합계">

                </tbody>
            </table>
       </form>
       <?php echo date("h:i:sa"); ?>

            <tbody>
                <?php
                    if (isset($_POST['number']) && strlen($_POST['number']) > 0) {
                        if (isset($_POST['submit']) && $_POST['submit'] == "submit" ) {
                            $sum = $_POST['math'] + $_POST['science'] + $_POST['korea'] + $_POST['english'];
                            $mean = $sum / 4;
                            /* insert */
                            $sql=" INSERT INTO  `scores` ".     //scores -> table name
                            "(`number` , `name` , `math` , `science` , `korea` , `english` , `mean` , `sum` )".
                            "VALUES ('$_POST[number]',  '$_POST[name]',  '$_POST[math]',  '$_POST[science]',  '$_POST[korea]',  '$_POST[english]',  '$mean',  '$sum')";
                            
                        }
                        else if (isset($_POST['update']) &&  $_POST['update'] == "update" ) {
                            $sum = $_POST['math'] + $_POST['science'] + $_POST['korea'] + $_POST['english'];
                            $mean = $sum / 4;
                            /* insert OR update */
                            $sql = "REPLACE INTO  `scores` ".   //scores -> table name
                            "(`number` , `name` , `math` , `science` , `korea` , `english` , `mean` , `sum` )".
                            "VALUES ('$_POST[number]',  '$_POST[name]',  '$_POST[math]',  '$_POST[science]',  '$_POST[korea]',  '$_POST[english]',  '$mean',  '$sum')";
                            
                        }
                        else if ( $_POST['delete'] == "delete" ) {
                            /* delete */
                            $sql = "DELETE FROM  `scores` ".    //scores -> table name
                            "WHERE number = '$_POST[number]'";
                            
                        }
                        mysqli_query($link,$sql);
                    }


                    if(isset($_GET['sorting'])) {
                        if ( $_GET['sorting'] == 'math' ) {
                            $query = 'SELECT * FROM scores ORDER BY math DESC';
                        }
                        else if ( $_GET['sorting'] == "science") {
                            $query = 'SELECT * FROM scores ORDER BY science DESC';
                        }
                        else if ( $_GET['sorting'] == "korea") {
                            $query = 'SELECT * FROM scores ORDER BY korea DESC';
                        }
                        else if ( $_GET['sorting'] == "english") {
                            $query = 'SELECT * FROM scores ORDER BY english DESC';
                        }
                        else if ( $_GET['sorting'] == "mean") {
                            $query = 'SELECT * FROM scores ORDER BY mean DESC';
                        }
                        else if ( $_GET['sorting'] == "sum") {
                            $query = 'SELECT * FROM scores ORDER BY sum DESC';
                        }
                        else {
                            $query = 'SELECT * FROM scores ORDER BY sum DESC';
                        }                        
                    }
                    else {
                        $query = 'SELECT * FROM scores ORDER BY sum DESC';
                    }


                    $result = mysqli_query($link,$query) or die('Query failed: ' . mysqli_error());
                        while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                        echo "<tr>";
                        foreach ($line as $col_value) {
                            echo "<td>$col_value</td>";
                        }
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                    mysqli_close($link);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

