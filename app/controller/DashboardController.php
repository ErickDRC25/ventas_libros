<?php

    class DashboardController{

        public function index(){
            $vista='app/views/dashboard/index.php';
            $titulo='Bievenido al Panel';
            require 'app/views/layout.php';
        }
    }

?>