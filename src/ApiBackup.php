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
        'title' => 'Apibackup',
        'path'  => 'apibackup',
        'icon'  => 'fa-gears',
    ];
}