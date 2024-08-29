<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
