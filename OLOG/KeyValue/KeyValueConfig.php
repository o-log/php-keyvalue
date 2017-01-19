<?php

namespace OLOG\KeyValue;

class KeyValueConfig
{
    const DB_ID = 'db_keyvalue';

    static protected $admin_actions_base_class_name;

    /**
     * @return mixed
     */
    public static function getAdminActionsBaseClassName()
    {
        return self::$admin_actions_base_class_name;
    }

    /**
     * @param mixed $admin_actions_base_class_name
     */
    public static function setAdminActionsBaseClassName($admin_actions_base_class_name)
    {
        self::$admin_actions_base_class_name = $admin_actions_base_class_name;
    }
}