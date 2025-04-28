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
        '/admin/user/add' => [[['_route' => 'add_user', '_controller' => 'App\\Controller\\AdminController::manageUser'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/moodle' => [[['_route' => 'moodle', '_controller' => 'App\\Controller\\MoodleController::index'], null, null, null, false, false, null]],
        '/post-ue' => [[['_route' => 'post_ue', '_controller' => 'App\\Controller\\PostUeController::index'], null, null, null, false, false, null]],
        '/prof_course' => [[['_route' => 'prof_course', '_controller' => 'App\\Controller\\ProfCourseController::index'], null, null, null, false, false, null]],
        '/student_course' => [[['_route' => 'student_course', '_controller' => 'App\\Controller\\StudentCourseController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/admin/(?'
                    .'|user/edit(?:/([^/]++))?(*:75)'
                    .'|delete/u(?'
                        .'|ser/([^/]++)(*:105)'
                        .'|e/([^/]++)(*:123)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        75 => [[['_route' => 'edit_user', 'id' => null, '_controller' => 'App\\Controller\\AdminController::manageUser'], ['id'], null, null, false, true, null]],
        105 => [[['_route' => 'delete_user', '_controller' => 'App\\Controller\\AdminController::deleteUser'], ['id'], ['DELETE' => 0], null, false, true, null]],
        123 => [
            [['_route' => 'delete_ue', '_controller' => 'App\\Controller\\AdminController::deleteUe'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
