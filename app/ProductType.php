<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    // protected $fillable = ['type_name'];

    // public function product() {
    //     一對多關聯取出來的資料會是陣列，無法直接使用，必須用 for 迴圈取出來
    //     return $this->hasMany(Product::class);
    //     return $this->hasMany('App\Product','product_type_id','id');
    // }

    protected $fillable = ['type_name'];

    public function product() {
        // 一對多關聯取出來的資料會是陣列，無法直接使用，必須用 for 迴圈取出來
        return $this->hasMany(Product::class);
    }
}
