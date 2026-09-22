<?php
// ROUTES USERS
// URL: ?users=xxx
// ROUTER: users
if (isset($_GET['users'])):
    include_once '../app/routers/users.php';
else:
    // ROUTE PAR DÉFAUT: DASHBOARD
    // PATTERN: /
    // URL: ?
    // CTRL: pagesController
    // ACTION: dashboard

    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\dashboardAction($connexion);
endif;
