<?php

namespace Rksugarfree\Gbooks;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rksugarfree\Gbooks\Gbooks
 */
class GbooksFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'gbooks';
    }
}
