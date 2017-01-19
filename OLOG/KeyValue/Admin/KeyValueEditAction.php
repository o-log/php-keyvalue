<?php

namespace OLOG\KeyValue\Admin;

use OLOG\CRUD\CRUDForm;
use OLOG\CRUD\CRUDFormRow;
use OLOG\CRUD\CRUDFormWidgetInput;
use OLOG\CRUD\CRUDFormWidgetTextarea;
use OLOG\InterfaceAction;
use OLOG\KeyValue\KeyValue;
use OLOG\KeyValue\Permissions;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\InterfacePageTitle;
use OLOG\Layouts\InterfaceTopActionObj;

class KeyValueEditAction extends KeyValueAdminActionsBaseProxy implements
    InterfaceAction,
    InterfaceTopActionObj,
    InterfacePageTitle
{
    protected $key_value_id;

    public function topActionObj()
    {
        return new KeyValueListAction();
    }

    public function pageTitle()
    {
        $key_value_obj = KeyValue::factory($this->key_value_id);
        return $key_value_obj->getName();
    }

    public function __construct($key_value_id)
    {
        $this->key_value_id = $key_value_id;
    }

    public function url()
    {
        return '/admin/keyvalue/' . $this->key_value_id;
    }

    static public function urlMask()
    {
        return '/admin/keyvalue/(\d+)';
    }

    public function action()
    {
        \OLOG\Exits::exit403If(!\OLOG\Auth\Operator::currentOperatorHasAnyOfPermissions([Permissions::PERMISSION_KEYVALUE_MANAGE]));

        $html = '';

        $key_value_obj = KeyValue::factory($this->key_value_id, false);
        \OLOG\Exits::exit404If(!$key_value_obj);

        $html .= CRUDForm::html(
            $key_value_obj,
            [
                new CRUDFormRow(
                    'name',
                    new CRUDFormWidgetInput(KeyValue::_NAME)
                ),
                new CRUDFormRow(
                    'value',
                    new CRUDFormWidgetTextarea(KeyValue::_VALUE)
                ),
            ]
        );

        AdminLayoutSelector::render($html, $this);
    }

}
