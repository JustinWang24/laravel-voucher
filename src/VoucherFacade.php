<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 3:27 PM
 */

namespace SmartBro\Voucher;

use Illuminate\Support\Facades\Facade;

class VoucherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'voucher';
    }
}