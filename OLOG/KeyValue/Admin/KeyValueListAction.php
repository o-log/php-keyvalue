<?php

namespace OLOG\KeyValue\Admin;

use OLOG\CRUD\CRUDFormRow;
use OLOG\CRUD\CRUDFormWidgetInput;
use OLOG\CRUD\CRUDFormWidgetTextarea;
use OLOG\CRUD\CRUDTable;
use OLOG\CRUD\CRUDTableColumn;
use OLOG\CRUD\CRUDTableWidgetDelete;
use OLOG\CRUD\CRUDTableWidgetTextWithLink;
use OLOG\InterfaceAction;
use OLOG\KeyValue\KeyValue;
use OLOG\KeyValue\Permissions;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\InterfacePageTitle;
use OLOG\Layouts\InterfaceTopActionObj;

class KeyValueListAction extends KeyValueAdminActionsBaseProxy implements
    InterfaceAction,
    InterfacePageTitle,
    InterfaceTopActionObj
{
    public function pageTitle()
    {
        return 'Параметры';
    }

    public function url() {
        return '/admin/keyvalue';
    }

    public function action()
    {
        \OLOG\Exits::exit403If(!\OLOG\Auth\Operator::currentOperatorHasAnyOfPermissions([Permissions::PERMISSION_KEYVALUE_MANAGE]));

        $html = '';

        $Key_value_obj = new KeyValue();

        $table_id = 'table_2ct4234cg243g243g';
        $form_id = 'form_2ct4234cg243g243g';

        $html .= CRUDTable::html(
            KeyValue::class,
            \OLOG\CRUD\CRUDForm::html(
                $Key_value_obj,
                [
                    new CRUDFormRow(
                        'Название',
                        new CRUDFormWidgetInput(KeyValue::_NAME)
                    ),
                    new CRUDFormRow(
                        'Значение',
                        new CRUDFormWidgetTextarea(KeyValue::_VALUE)
                    ),
                ],
                '',
                [],
                $form_id
            ),
            [
                new CRUDTableColumn(
                    'Название',
                    new CRUDTableWidgetTextWithLink(
                        '{this->' . KeyValue::_NAME . '}',
                        (new KeyValueEditAction('{this->'.KeyValue::_ID.'}'))->url()

                    )
                ),
                new CRUDTableColumn(
                    '',
                    new CRUDTableWidgetDelete()
                )
            ],
            [],
            'id desc',
            $table_id
        );

        AdminLayoutSelector::render($html, $this);
    }
}