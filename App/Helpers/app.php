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



/**
 * Includes a file under view/static
 * 
 *
 * @param string $staticFile The file name to attach.
 * @param array $data Dynamic values to be used in the file. For example the title value for the header file.
 * 
 * 
 */
function includeStaticFile($staticFile, $data = [])
{
    extract($data);
    require BASEDIR . "/app/view/static/$staticFile.php";
}

?>