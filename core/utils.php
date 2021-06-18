<?php
/**
 * 
 * Redirects the user to the location indicated in the param
 * @param string
 * 
 **/
function redirect(string $url): void{
    header("Location: ".$url);
}
/**
 * 
 * Show the desired html template.
 * - It takes one(1) string, this will be part of the location and the 
 * name of the required template
 * - It takes also one(1) array with info for 
 * the rendering of the page (query(/ies) with the data and the title of the page)
 * @param string $template
 * @param array $donnes
 * 
 */
function render(string $template, array $donnees):void{
    extract($donnees);
    ob_start();
    require_once "templates/".$template.".html.php";
    $contenuDeLaPage = ob_get_clean();
    require_once "templates/layout.html.php";
}
