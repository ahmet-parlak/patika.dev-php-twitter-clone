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
        $this->db = new Database();
        $this->request = new Request();
        $this->view = new View();
        
    }

}