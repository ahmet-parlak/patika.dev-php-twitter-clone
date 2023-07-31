<?php
namespace Core;

class View
{
    public $content;
    public function load($viewName, $data = [])
    {
        ob_start();
        extract($data); //Import variables into the current symbol table from an array
        require BASEDIR . '/App/View/' . $viewName . '.php';
        $this->content = ob_get_contents();
        ob_clean();

        return $this->content;

    }
}