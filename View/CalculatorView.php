
<?php

class CalculatorView {
    public function sendUserInput() {
        $inputData = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputData[0] = test_input($_POST["xValue"]);
            $inputData[1] = test_input($_POST["yValue"]);
            $inputData[2] = test_input($_POST["operator"]);
        }
        return $inputData;
    }

    public function receiveOutputData() {}


}

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


<html>
<head>
    <link href="/Templates/index.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alegreya:700italic,400' rel='stylesheet' type='text/css'>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table cellpadding=30px align=center>
        <tr>
            <td id="title" align=center colspan=2>CALCULATOR</td>
        </tr>
        <tr>
            <td class="xy" align=center colspan=2>
                X Value: <input type="text" name="xValue" required="" />
            </td>
        </tr>
        <tr>
            <td class="xy" align=center colspan=2>
                Y Value: <input type="text" name="yValue" required="" />
            </td>
        <tr>
            <td align=center width=100px>
                <button name="operator" type="submit" value="subtract">-</button>
            </td>
            <td align=center width=100px>
                <button name="operator" type="submit" value="addition">+</button>
            </td>
        </tr>
        <tr>
            <td align=center width=100px>
                <button name="operator" type="submit" value="multiply">x</button>
            </td>
            <td align=center width=100px>
                <button name="operator" type="submit" value="divide">/</button>
            </td>
        </tr>
    </table>
</form>
</body></html>