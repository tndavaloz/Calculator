<?php $view = new CalculatorView(); ?>

<html>
<head>
    <link href="/View/Templates/index.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alegreya:700italic,400' rel='stylesheet' type='text/css'>
</head>
<body>
<?php include_once(__DIR__ . '/../CalculatorView.php'); ?>

<form method="POST" action="/">
    <div class='title' align="center">CALCULATOR</div>
    <div class ='xy' align="center">
        <?php $view->getX(); ?>
        <?php $view->getY(); ?>
    </div>
    <div class="answerTitle" align="center">ANSWER:</div>
    <div class="answer" align="center">
        <?php $view->output(); ?>
    </div>
    <div class="operator" align="center">
        <?php $view->getOperator(); ?>
    </div>
    <div class="Submit" align="center">
        <?php $view->submit(); ?>
    </div>
</form>
</body></html>