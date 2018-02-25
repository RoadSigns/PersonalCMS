<?php
    session_start();

    // Required for Start up
    require ('Bootstrap/config.php'    );
    require ('Bootstrap/autoloader.php');
    // Debugging Tools
    require ('Bootstrap/debug.php');

    use PersonalCMS\Infrastructure\Router\RouterEngine;
    use PersonalCMS\Infrastructure\Router\Router;

    $routerEngine = new RouterEngine();
    $router = new Router($routerEngine);

    $router->generateRoutes();
    $router->getController();