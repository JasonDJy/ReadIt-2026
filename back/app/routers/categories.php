<?php

use \App\Controllers\CategoriesController;

include '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
