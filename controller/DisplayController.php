<?php

require_once('model/DisplayManager.php');

function listBikesPage($page)
{
    $displayManager = new DisplayManager();
    $bikes = $displayManager->getBikesPage($page);
    $nbResult = $bikes->rowCount();
    $nbPages = $displayManager->getNbPage();
    require('view/home/home.php');
}

function listBikesSearch($search) 
{
    $displayManager = new DisplayManager();
    $bikes = $displayManager->getBikesSearch($search);
    $nbResult = $bikes->rowCount();
    $nbPages = 1;
    require('view/home/home.php');

}

function listBikesCategory($search)
{
    $displayManager = new DisplayManager();
    $bikes = $displayManager->getBikesCategory($search);
    $nbResult = $bikes->rowCount();
    $nbPages = 1;
    require('view/home/home.php');
}