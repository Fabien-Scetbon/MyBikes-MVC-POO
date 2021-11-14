<?php

require_once('model/BikeManager.php');

function getBikes()
{
    $getBikes = new BikesManager();
    $bikes = $getBikes->getAllBikes();
    require('view/admin/bikesCrud.php');
}

function getBike($id)
{
    $getBike = new BikesManager();
    $bike = $getBike->getOneBike($id);
    $categories = $getBike->getAllCategories();
    require('view/admin/bikeEdit.php');
}

function deleteBike($id)
{
    $getBike = new BikesManager();
    $bike = $getBike->deleteOneBike($id);
    header('location: /indexAdmin.php?action=bikes');
    exit();
}

function updateBike($id, $name, $price, $image, $description, $category_name)
{
    $getBike = new BikesManager();
    $category_id = $getBike->getIdCategory($category_name);  // array [ [id] => id , [0] => id ]
    $getBike->updateOneBike($id, $name, $price, $image, $description, $category_id[0]);
    header('location: /indexAdmin.php?action=bikes');
    exit();
}

function createBike() 
{
    $getBike = new BikesManager();
    $categories = $getBike->getAllCategories();
    require('view/admin/bikeCreate.php');
    
}

function insertBike($name, $price, $image, $description, $category_name)
{
    $getBike = new BikesManager();
    $category_id = $getBike->getIdCategory($category_name); // array [ [id] => id , [0] => id ]
    $getBike->createOneBike($name, $price, $image, $description, $category_id[0]);
    header('location: /indexAdmin.php?action=bikes');
    exit();
}

function createCategory()
{
    $getBike = new BikesManager();
    $categories = $getBike->getAllCategories();
    require('view/admin/categoryCreate.php');
}

function insertCategory($category_name)
{
    $getBike = new BikesManager();
    $getBike->createOneCategory($category_name);
    header('location: /indexAdmin.php?action=createcategory');
    exit();
}

function deleteCategory($id)
{
    $getBike = new BikesManager();
    $category = $getBike->deleteOneCategory($id);
    header('location: /indexAdmin.php?action=deletecategory');
    exit();
}