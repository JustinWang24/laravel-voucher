<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 3:17 PM
 */

namespace SmartBro\Voucher\contracts;


use SmartBro\Voucher\models\Voucher;

interface Redeemable
{
    /**
     * User the given voucher; Return true means all good, return false means failed
     * @param Voucher $voucher
     * @return boolean
     */
    public function useThis(Voucher $voucher = null);

    /**
     * 获取使用者的ID
     * @return int
     */
    public function getUserId();
}