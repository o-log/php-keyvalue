<?php

namespace KeyValueDemo;

use OLOG\Layouts\InterfaceMenu;
use OLOG\Layouts\InterfaceTopActionObj;
use OLOG\KeyValue\Admin\KeyValueAdminMenu;
use KeyValueDemo\Pages\MainPageAction;

class KeyValueDemoAdminActionsBase implements
    InterfaceMenu,
    InterfaceTopActionObj
{
    public function topActionObj(){
        return new MainPageAction();
    }

    static public function menuArr()
    {
        return array_merge(KeyValueAdminMenu::menuArr());
    }
}