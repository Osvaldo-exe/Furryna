<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'sender',
        'receiver',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, foreignKey: 'receiver', ownerKey:'product_owner');
    }
}

