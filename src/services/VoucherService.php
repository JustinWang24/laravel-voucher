<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 4:20 PM
 */

namespace SmartBro\Voucher\services;
use SmartBro\Voucher\models\BulkOfVouchers;

class VoucherService
{
    public function generate($number,$type,$value,$isPercent=false,$commence=null,$expiredAt=null){
        $bulk = new BulkOfVouchers($type,$value,$isPercent,$commence,$expiredAt);
        return $bulk->generate($number);
    }
}