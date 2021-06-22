<?php

class Http{

/**
 * 
 * Redirects the user to the location indicated in the param
 * @param string
 * 
 **/
    public static function redirect(string $url): void{
        header("Location: ".$url);
    }
}