<?php

function assets($assetName): string
{
    return URL . 'public/' . $assetName;
}

function route($route = ''): string
{
    return URL . $route;
}

?>