<?php

use Illuminate\Support\Facades\Config;

return array(

    /*
     |--------------------------------------------------------------------------
     | Package Settings
     |--------------------------------------------------------------------------
     |
     | Debugbar is enabled by default, when debug is set to true in app.php.
     |
     */

    'enabled' => Config::get('app.debug'),

);
