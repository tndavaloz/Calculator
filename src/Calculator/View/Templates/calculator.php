{% extends 'layout.twig' %}

{% block content %}
<form method="POST" action="/">
    <div class='title' align="center"><strong>Calculator</strong></div>
    <div class="calc" align="center">
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
            <input type="submit" class="submit" value="Submit">
        </div>
    </div>

</form>
{% endblock content %}