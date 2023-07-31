<?php
namespace Core;

use Bramus\Router\Router;

class Starter
{
    public Router $router;

    public Database $db;

    public Request $request;

    public View $view;

    public function __construct()
    {
        //Create Router
        $this->router = new Router();

        //Create Database
        $this->db = new Database();

        //Create Request
        $this->request = new Request();

        //Create View
        $this->view = new View();

    }

}