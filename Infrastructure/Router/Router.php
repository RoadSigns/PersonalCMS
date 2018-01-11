<?php

    namespace PersonalCMS\Infrastructure\Router;

    use PersonalCMS\Core\Contracts\IRouter;

    class Router implements IRouter
    {
        public $router;

        public function __construct(RouterEngine $router)
        {
            $this->router = $router;
        }

        public function generateRoutes()
        {
            $this->router->map('GET', '/', function(){
                echo "This is the homepage";
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