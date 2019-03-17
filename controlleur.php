<?php
    session_start();


    define("PATHROOT", __DIR__);
    define("DS", DIRECTORY_SEPARATOR); // permet de mettre le / ou \ en fonction de linux ou windows
    define("PATHVIEW",PATHROOT.DS.'view'.DS);
    define("PATHMODELE", PATHROOT.DS.'modele'.DS);
    require PATHROOT.DS.'conf/ressource.php';
    require 'modele/connect/bdd.php';
    require 'controlleur/userControlleur.php';

    $content = FILTER_INPUT(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    $action = FILTER_INPUT(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!is_null($action))
    {
        $tabAction = explode ('-', $action);
        $controlleurName=$tabAction[0].'Controlleur';
        $controlleur = new $controlleurName();
        $controlleur->$tabAction[1]();
    }

    var_dump($action);
    if (is_null($content))
    {
        $content = 'accueil';
    }

    include 'view/page.php';