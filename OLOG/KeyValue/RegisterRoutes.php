<?php

namespace OLOG\KeyValue;

class RegisterRoutes
{
    static public function registerRoutes(){
        \OLOG\Router::processAction(\OLOG\KeyValue\Admin\KeyValueListAction::class, 0);
        \OLOG\Router::processAction(\OLOG\KeyValue\Admin\KeyValueEditAction::class, 0);
    }
}