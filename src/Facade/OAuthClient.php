<?php
/**
 * @author     Dariusz Prząda <artdarek@gmail.com>
 * @copyright  Copyright (c) 2013
 * @license    http://www.opensource.org/licenses/mit-license.html MIT License
 */

namespace Ithome\OAuthClient\Facade;

use Illuminate\Support\Facades\Facade;

class OAuthClient extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'oauth-client';
    }

}