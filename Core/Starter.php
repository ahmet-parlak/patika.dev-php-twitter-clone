<?php
namespace Core;

class Starter
{
    public $router;

    public $db;

    public $request;

    public function __construct()
    {
        //Create Router
        $this->router = new \Bramus\Router\Router();
        $this->db = new Database();
        $this->request = new Request();

    }

}