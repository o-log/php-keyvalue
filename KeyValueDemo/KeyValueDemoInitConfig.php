<?php

namespace KeyValueDemo;

use OLOG\Auth\AuthConfig;
use OLOG\Auth\AuthConstants;
use OLOG\BT\LayoutBootstrap;
use OLOG\Cache\CacheConfig;
use OLOG\Cache\MemcacheServerSettings;
use OLOG\DB\DBConfig;
use OLOG\DB\DBSettings;
use OLOG\KeyValue\KeyValueConfig;
use OLOG\Layouts\LayoutsConfig;
use KeyValueDemo\KeyValueDemoAdminActionsBase;

class KeyValueDemoInitConfig
{
    static public function initConfig(){
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        DBConfig::setDBSettingsObj(
            AuthConstants::DB_NAME_PHPAUTH,
            new DBSettings('localhost', 'db_keyvalue', 'root', '1', 'vendor/o-log/php-auth/db_phpauth.sql')
        );

        DBConfig::setDBSettingsObj(
            KeyValueConfig::DB_ID,
            new DBSettings('localhost', 'db_keyvalue', 'root', '1')
        );

        CacheConfig::addServerSettingsObj(new MemcacheServerSettings('localhost', 11211));

        AuthConfig::setFullAccessCookieName('lkjdhfglkjdsgf');

        AuthConfig::setAdminActionsBaseClassname(KeyValueDemoAdminActionsBase::class);
        KeyValueConfig::setAdminActionsBaseClassname(KeyValueDemoAdminActionsBase::class);

        LayoutsConfig::setAdminLayoutClassName(LayoutBootstrap::class);
    }
}