<html>
<head>
    <link href="/View/Templates/index.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alegreya:700italic,400' rel='stylesheet' type='text/css'>
</head>
<body>
<form method="POST" action="/">
    <table cellpadding=30px>
        <tr>
            <td id="title" align=center colspan=2>CALCULATOR</td>
        </tr>
        <tr>
            <td class="xy" align=center colspan=2>

                <label for="X Value">X Value:</label>
                <input type="text" name="xValue" id="X Value" required/>

            </td>
        </tr>
        <tr>
            <td class="xy" align=center colspan=2>

                <label for="Y Value">Y Value:</label>
                <input type="text" name="yValue" id="Y Value" required/>
            </td>
        </tr>
        <tr>
            <td align=center width=100px>
                <input type="radio" name="operator" value="add">Addition
            </td>
            <td align=center width=100px>
                <input type="radio" name="operator" value="subtract">Subtract
            </td>
        </tr>
        <tr>
            <td align=center width=100px>
                <input type="radio" name="operator" value="multiply">Multiply
            </td>
            <td align=center width=100px>
                <input type="radio" name="operator" value="divide">Divide
            </td>
        </tr>
        <tr>
            <td align=center colspan=2>
                <input type="submit" name="submit" value="Submit">
        </tr>
    </table>
</form>
</body></html>