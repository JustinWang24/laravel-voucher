<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 3:41 PM
 */

namespace SmartBro\Voucher;


use Illuminate\Support\Facades\Facade;

class RedeemerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redeemer';
    }

}