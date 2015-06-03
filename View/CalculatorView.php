
<?php

class CalculatorView {

    public function setView() {
        require_once(__DIR__ . '/Templates/layout.php');
    }

    public function outputView($output) {
        echo '<div>' . $output . '</div>';
    }

}