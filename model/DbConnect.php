<?php

class Connect
{
    protected function dbConnect()
    {
	$bdd = new PDO('mysql:host=localhost;dbname=MyShopBikes;charset=utf8','fabino', 'MonopolI');
    return $bdd;
    }
}