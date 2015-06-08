
<html>
    <head>
        <link href="/View/Templates/index.css" type="text/css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Alegreya:700italic,400' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <form method="POST" action="/">
            <div class='title' align="center">CALCULATOR</div>
            <div class ='xy' align="center">
            <?php echo $view->getX(); ?>
            <?php echo $view->getY(); ?>
            </div>
            <div class="answer" align="center">
                <?php echo $view->output(); ?>
            </div>
                <div class="operator" align="center">
                    <?php echo $view->getOperator(); ?>
                </div>
                <div class="submitButton" align="center">
                    <?php echo $view->submit(); ?>
                </div>

        </form>
    </body>
</html>