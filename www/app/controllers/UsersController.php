<?php

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;

include_once '../app/models/usersModel.php';

function loginFormAction(PDO $connexion)
{
    global $content, $title;
    $title = "Login Form";
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}

function loginAction(PDO $connexion, array $userData)
{
    // On va cherche le/la user.euse qui correspond aux userData
    $user = UsersModel\findOneByLoginAndPwd($connexion, $userData);

    // Si y en pas, on redirige vers la route login
    if (!$user) :
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        header('location: ' . PUBLIC_BASE_URL . '/users/login-form');
    else:
        // On donne le badge
        $_SESSION['user'] = $user;
        // On redirige vers le dashboard admin
        header('location: ' . ADMIN_BASE_URL);
    endif;
}
