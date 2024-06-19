<?php
class Controller {
    protected $view;

    public function __construct() {
        $this->view = new stdClass();
    }

    protected function render($viewName) {
        require "views/$viewName.php";
    }
}
?>