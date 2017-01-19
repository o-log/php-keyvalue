<?php

namespace OLOG\KeyValue\Admin;

use OLOG\Auth\Auth;
use OLOG\KeyValue\Admin\KeyValueListAction;
use OLOG\Layouts\InterfaceMenu;
use OLOG\Layouts\MenuItem;
use OLOG\KeyValue\Permissions;

class KeyValueAdminMenu implements InterfaceMenu
{
	static public function menuArr()
	{
	    $menu_arr = [];

        if (Auth::currentUserHasAnyOfPermissions([\OLOG\KeyValue\Permissions::PERMISSION_KEYVALUE_MANAGE])) {
            $menu_arr = array_merge($menu_arr, [
                new MenuItem((new KeyValueListAction())->pageTitle(), (new KeyValueListAction())->url(), [], 'glyphicon glyphicon-pushpin')
            ]);
        }

        return $menu_arr;
	}
}