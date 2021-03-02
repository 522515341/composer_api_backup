<?php

namespace Encore\ApiBackup;

use Encore\Admin\Admin;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Extension;

class ApiBackup extends Extension
{
    public $name = 'apibackup';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        [
            'title' => '库列表',
            'path'  => 'db_list',
            'icon'  => 'fa-gears',
        ],
        [
            'title' => '库备份列表',
            'path'  => '#',
            'icon'  => 'db_down_list',
        ],
    ];
}