<?php

require 'classes/Smarty.class.php';
// create object

require 'classes/Template.php';

if(isset($_GET['nav'])){
    $nav = $_GET['nav'];
} else {
    $nav = 'startseite';
}

$smarty = new Smarty();
switch($nav){
    case 'kontakt':
        $content_str = $smarty->fetch('kontakt.html');
        break;  
    case 'impressum':
        $content_str = $smarty->fetch('impressum.html');
        break;
    default:
        $content_str = $smarty->fetch('startseite.html');
        break;
}
$tpl = new Template('layout.tpl');
$tpl->replace('#CONTENT#', $content_str);


// display it
$smarty->display('layout.tpl');