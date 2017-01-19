<?php

namespace KeyValueDemo\Pages;

use OLOG\HTML;
use OLOG\InterfaceAction;
use OLOG\KeyValue\Admin\KeyValueListAction;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\InterfacePageTitle;

class MainPageAction implements
    InterfaceAction,
    InterfacePageTitle
{
	public function url()
	{
		return "/";
	}

	public function pageTitle()
	{
		return 'php-keyvalue demo';
	}

	public function action()
	{
		$html = '';

        $html .= '<div>' . HTML::a((new KeyValueListAction())->url(), 'KeyValue list') . '</div>';

        // TODO: write example keyvalue value

		AdminLayoutSelector::render($html);
	}
}