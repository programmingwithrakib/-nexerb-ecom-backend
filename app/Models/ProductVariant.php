<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    public function getDiscountValueAttribute()
    {
        $discount_amount = $this->discount_amount ?? 0;
        $discount_type = $this->discount_type ?? 0;
        if($discount_type == 'percent'){
            return ($this->sell_price * $discount_amount) / 100;
        }else{
            return $discount_amount;
        }
    }


    public function getAfterDiscountValueAttribute(){
        return $this->sell_price - $this->discount_value;
    }
}
