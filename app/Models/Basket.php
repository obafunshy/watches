<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function product() {
        $this->hasOne(Product::class, 'id', 'product_id');
    }
}
