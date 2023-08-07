<?php

function assets(string $assetName): string
{
    return URL . 'public/' . $assetName;
}

function route(string $route = ''): string
{
    return URL . $route;
}

function redirect($route = '')
{
    header('Location:' . URL . $route);
}

?>