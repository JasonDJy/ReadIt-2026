<?php

if(!isset($_SESSION['user'])) {
    header('location: ' . PUBLIC_BASE_URL . '/users/login-form');
}
