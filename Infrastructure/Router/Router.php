<?php

    namespace PersonalCMS\Infrastructure\Router;

    use PersonalCMS\Core\Contracts\IRouter;

    class Router implements IRouter
    {
        public $router;

        public function __construct(RouterEngine $router)
        {
            $this->router = $router;
            $this->router->setBasePath(BASEPATH);
        }

        public function generateRoutes()
        {
            $this->router->map('GET', '/', function(){
                echo "This is the homepage";
            });

            $this->router->map('GET', '/project/[:projectName]', function($projectName){
               echo  "<h1>$projectName</h1>";
            });

            $this->router->map('GET', '/blog/[:blogPost]', function($blogPost){
                echo  "<h1>$blogPost</h1>";
            });
        }

        public function getController()
        {
            $match = $this->router->match();
            ($match && is_callable( $match['target']))
                ? call_user_func_array( $match['target'], $match['params'] )
                : header('Location: '. BASEPATH .'/');
        }
    }