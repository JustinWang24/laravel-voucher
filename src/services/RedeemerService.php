<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 3:53 PM
 */

namespace SmartBro\Voucher\services;


use SmartBro\Voucher\contracts\Redeemable;
use SmartBro\Voucher\models\DiscountResult;
use SmartBro\Voucher\models\Voucher;

class RedeemerService
{
    /**
     * 可以使用Voucher的人，兑换此购物券
     * @param $cartTotalAmount              // 购物车总价 Total amount of the cart
     * @param Voucher $voucher
     * @param Redeemable $redeemable
     * @return DiscountResult
     */
    public function Redeem($cartTotalAmount, Voucher $voucher, Redeemable $redeemable){
        $result = new DiscountResult();
        $result->setSuccess($redeemable->useThis($voucher));
        if($result->isSuccess()){
            $result->setDiscount($cartTotalAmount - $voucher->getAmountAfterDiscount($cartTotalAmount));
            $result->setAmountAfterDiscount($voucher->getAmountAfterDiscount($cartTotalAmount));
            $result->setMsg('All Good');
        }else{
            $result->setMsg('Can not use this voucher');
            $result->setAmountAfterDiscount($cartTotalAmount);
        }
        return $result;
    }
}