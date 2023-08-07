<?php

function assets(string $assetName): string
{
    return URL . 'public/' . $assetName;
}

function route(string $route = ''): string
{
    return URL . $route;
}


function requiredFields(array $expectedKeys, array $data): bool
{
    foreach ($expectedKeys as $key) {

        if (!isset($data[$key]))
            return false;
    }

    return true;
}

?>