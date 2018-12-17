<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 3:12 PM
 */

namespace SmartBro\Voucher\models;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    const TYPE_GENERAL = 0; // General Voucher 通用型的Voucher 无任何使用限制

    protected $fillable = [
        'code',             // Voucher的代码，最多200个字符长度
        'type',             // Voucher的类型，可自定义: 比如学生专用， 中介专用，通用类型
        'discount_value',   // 折扣值 百分比或数字
        'is_percent',       // 折扣值是百分比吗
        'used',             // 是否已经使用过了
        'used_by_user_id',  // 被哪个用户使用了
        'commence',         // 有效使用的开始日期， null表示可以随时开始
        'expired_at',       // 使用的截止日期, null表示可以无限制
    ];

    public $casts = [
        'is_percent'=>'boolean',
        'used'=>'boolean',
    ];

    public $dates = [
        'commence','expired_at'
    ];

    /**
     * @param float|int $total
     * @return float|int
     */
    public function getAmountAfterDiscount($total){
        if($this->is_percent){
            // 表示该打折券是按照百分比来折扣的
            return $total * ( 1 - $this->discount_value/100);
        }else{
            // 表示该打折券是按照绝对值来折扣的
            return $total - $this->discount_value;
        }
    }
}