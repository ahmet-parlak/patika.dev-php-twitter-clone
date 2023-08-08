<?php
namespace Core;

class Controller extends Starter
{
    public function view($viewName, $data = [])
    {
        return $this->view->load($viewName, $data);
    }

    public function render($viewName, $data = [])
    {
        echo $this->view->load($viewName, $data);
    }
}