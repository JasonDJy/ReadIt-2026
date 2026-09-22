<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;
use \PDO;

include '../app/models/usersModel.php';

function logoutAction()
{
    unset($_SESSION['user']);
    header('Location: ' . PUBLIC_BASE_URL);
}
