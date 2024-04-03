<?php 

function redirect(string $url): void
{
    header("Location: $url");
    exit();
}

function checkRequestMethod( $method ) : bool{
    return $_SERVER['REQUEST_METHOD'] === $method;
}



?>