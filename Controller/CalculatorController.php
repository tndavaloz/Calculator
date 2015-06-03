<?php
require_once(__DIR__ . '/../View/CalculatorView.php');
require_once(__DIR__ . '/../Model/CalculatorModel.php');



class CalculatorController {

    public $model;
    public $view;
    public $route;
    public $inputValues;
    public $output;


    public function __construct(CalculatorModel $model, CalculatorView $view, Slim\Http\Request $router) {
        $this->model = $model;
        $this->view = $view;
        $this->route = $router;
    }

    public function __invoke() {
        $this->getView();
        $this->output = $this->getModel();

        if ($this->output != null) {
            $this->view->outputView($this->output);
        }

    }

    /*
     * Render the layout
     */
    public function getView() {
        $this->view->setView();
        $this->inputValues = array('X'=>$this->route->post('xValue'),
            'Y'=>$this->route->post('yValue'),
            'Op'=>$this->route->post('operator')
        );
    }

    /*
     * Use input and pass to model
     */
    public function getModel() {
        if ($this->setModel()) {
            $output = $this->model->assignModel($this->inputValues['X'], $this->inputValues['Y'], $this->inputValues['Op']);
            if ($output == 1) {
                return $this->model->performCalculation();
            }
            return $output;
        }
        return null;
    }

    /*
     * Set the model up for the calculation, not actually setting any values (change name?)
     */
    public function setModel() {
        $this->model->set($this->inputValues);
        return $this->model->inputCheck();
    }

}