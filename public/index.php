<?php

require_once "../vendor/autoload.php";

\KeyValueDemo\KeyValueDemoInitConfig::initConfig();

\OLOG\Auth\RegisterRoutes::registerRoutes();
\OLOG\KeyValue\RegisterRoutes::registerRoutes();

\OLOG\Router::processAction(\KeyValueDemo\Pages\MainPageAction::class, 0);

