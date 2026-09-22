<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;
use \PDO;

include '../app/models/categoriesModel.php';

function indexAction(PDO $connexion)
{
    $categories = CategoriesModel\findAll($connexion);

    global $content, $title;
    $title = "GESTION DES CATÉGORIES";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}
