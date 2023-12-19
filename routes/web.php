<?php
use core\router;

router::add(
    'users/{id:\d+}/edit',
    [
        'controller' => \app\controllers\usersController::class,
        'action' => 'edit',
        'method' => 'GET',
    ]
);