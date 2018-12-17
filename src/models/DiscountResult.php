<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 4:07 PM
 */

namespace SmartBro\Voucher\models;


class DiscountResult
{
    /**
     * 折扣金额
     * @var int|float
     */
    private $discount = 0;

    /**
     * 折扣后总价
     * @var int|float
     */
    private $amountAfterDiscount = 0;

    /**
     * 文字描述消息
     * @var string
     */
    private $msg = null;

    /**
     * 是否成功
     * @var bool 
     */
    private $success = true;

    /**
     * @return float|int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float|int $discount
     */
    public function setDiscount($discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return float|int
     */
    public function getAmountAfterDiscount()
    {
        return $this->amountAfterDiscount;
    }

    /**
     * @param float|int $amountAfterDiscount
     */
    public function setAmountAfterDiscount($amountAfterDiscount): void
    {
        $this->amountAfterDiscount = $amountAfterDiscount;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     */
    public function setMsg(string $msg): void
    {
        $this->msg = $msg;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }
}