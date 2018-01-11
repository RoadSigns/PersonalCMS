<?php

    namespace PersonalCMS\Core\Contracts;

    interface IRouter
    {
        public function generateRoutes();
        public function getController();
    }