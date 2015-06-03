
<?php

class CalculatorView {

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function retrieveUserInput() {
        require(__DIR__ . '/Templates/index.html');
        $inputData = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputData[0] = $this->test_input($_POST["xValue"]);
            $inputData[1] = $this->test_input($_POST["yValue"]);
            $inputData[2] = $this->test_input($_POST["operator"]);
        }
        return $inputData;
    }

    public function receiveOutputData($retrievedData) {
        $html = '<html><body>The answer is ' . $retrievedData . '</body></html>';
        return $html;
    }
}