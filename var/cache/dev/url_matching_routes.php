<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/actu' => [[['_route' => 'actu', '_controller' => 'App\\Controller\\ActuController::fetchPosts'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/moodle' => [[['_route' => 'moodle', '_controller' => 'App\\Controller\\MoodleController::index'], null, null, null, false, false, null]],
        '/post-ue' => [[['_route' => 'post_ue', '_controller' => 'App\\Controller\\PostUeController::index'], null, null, null, false, false, null]],
        '/prof_course' => [[['_route' => 'prof_course', '_controller' => 'App\\Controller\\ProfCourseController::index'], null, null, null, false, false, null]],
        '/student_course' => [[['_route' => 'student_course', '_controller' => 'App\\Controller\\StudentCourseController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
