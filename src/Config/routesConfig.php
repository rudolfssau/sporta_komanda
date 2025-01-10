<?php

/**
 * Config file for route configuration
 *
 * @return array{
 *   path: string,
 *   controller: string,
 *   method: array
 *  }
 *
 */

return [// For Sports team site
    [
        'path' => '/home',
        'controller' => Main\App\Controllers\Main::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/login',
        'controller' => Main\App\Controllers\Login::class,
        'methods' => ['POST']
    ],
    [
        'path' => '/register',
        'controller' => Main\App\Controllers\Register::class,
        'methods' => ['POST']
    ],
    [
        'path' => '/pictures',
        'controller' => Main\App\Controllers\Pictures::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/get/posts',
        'controller' => Main\App\Controllers\FetchPosts::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/get/pictures',
        'controller' => Main\App\Controllers\FetchPictures::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/get/users',
        'controller' => Main\App\Controllers\FetchUsers::class,
        'methods' => ['GET']
    ],
    // Authentification
    [
        'path' => '/auth/register',
        'controller' => Main\App\Controllers\RegisterPage::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/auth/login',
        'controller' => Main\App\Controllers\LoginPage::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/logout',
        'controller' => Main\App\Controllers\Logout::class,
        'methods' => ['POST']
    ],

    // Authentification check
    [
        'path' => '/login/check',
        'controller' => Main\App\Controllers\LoginCheck::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/loggedin/home',
        'controller' => Main\App\Controllers\LoggedIn_Main::class,
        'methods' => ['GET']
    ],
    [
        'path' => '/isloggedin',
        'controller' => Main\App\Controllers\CheckAuthentification::class,
        'methods' => ['GET']
    ],

    [
        'path' => '/comment',
        'controller' => Main\App\Controllers\Comment::class,
        'methods' => ['GET', 'POST']
    ],
    [
        'path' => '/vote',
        'controller' => Main\App\Controllers\Vote::class,
        'methods' => ['GET', 'POST']
    ],

    [
        'path' => '/admin',
        'controller' => Main\App\Controllers\Admin::class,
        'methods' => ['GET', 'POST']
    ],
    [
        'path' => '/admin/login',
        'controller' => Main\App\Controllers\AdminLogin::class,
        'methods' => ['GET', 'POST']
    ],
    [
        'path' => '/admin/dashboard',
        'controller' => Main\App\Controllers\Dashboard::class,
        'methods' => ['GET', 'POST']
    ],
];
