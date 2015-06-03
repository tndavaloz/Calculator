
<?php

class CalculatorView {

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function setView() {
        require_once(__DIR__ . '/Templates/layout.php');
    }


    public function receiveOutputData($retrievedData) {
        $html = '<html><body>The answer is ' . $retrievedData . '</body></html>';
        echo $html;
    }
}