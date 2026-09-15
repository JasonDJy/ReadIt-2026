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

function loginAction(PDO $connexion, array $userdata)
{
    // Y a t-il une correspondance entre le login et le mot de passe dans la base de données ?

    $user = UsersModel\findOneLoginAndPwd($connexion, $userdata);

    // si aucune correspondance, on redirige vers le formulaire de login avec un message d'erreur

    if ($user) {
        // Les identifiants sont corrects
        // On redirige vers la page d'accueil
        header('Location: ' . ADMIN_BASE_URL);
        exit();
    } else {
        // Les identifiants sont incorrects
        // On redirige vers le formulaire de login avec un message d'erreur
        header('Location: ' . PUBLIC_BASE_URL . '/users/login-form');
        exit();
    }

}
