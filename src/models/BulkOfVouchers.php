<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 17/12/18
 * Time: 4:23 PM
 */

namespace SmartBro\Voucher\models;

use Illuminate\Support\Facades\DB;

class BulkOfVouchers
{
    private $type = 0;
    private $value = 0;
    private $isPercent = false;
    private $commence = null;
    private $expiredAt = null;

    public function __construct(
        $type,$value,$isPercent=false,$commence=null,$expiredAt=null
    )
    {
        $this->type = $type;
        $this->value = $value;
        $this->isPercent = $isPercent;
        $this->commence = $commence;
        $this->expiredAt = $expiredAt;
    }

    public function generate($number){
        $data = [];
        for ($i=0;$i<$number;$i++){
            $data[] = [
                'code'=>strtoupper(str_random(config('voucher.code_length'))),             // Voucher的代码，最多200个字符长度
                'type'=>$this->type,                                                            // Voucher的类型，可自定义: 比如学生专用， 中介专用，通用类型
                'discount_value'=>$this->value,                                                 // 折扣值 百分比或数字
                'is_percent'=>$this->isPercent,                                                 // 折扣值是百分比吗
                'used'=>false,                                                                  // 是否已经使用过了
                'used_by_user_id'=>0,                                                           // 被哪个用户使用了
                'commence'=>$this->commence?$this->commence:date('Y-m-d'),               // 有效使用的开始日期， null表示可以随时开始
                'expired_at'=>$this->expiredAt?$this->expiredAt: (intval(date('Y')) + 1).'-12-31',       // 使用的截止日期, null表示可以无限制
            ];
        }

        /**
         * Insert into database
         */
        DB::table('vouchers')->insert($data);
    }
}