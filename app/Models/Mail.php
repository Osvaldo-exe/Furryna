<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'body',
        'recipient_email',
        'sender_email',
        'quantity',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id', ownerKey: 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, foreignKey: 'product_id', ownerKey:'id');
    }

    public function carts()
    {
        return $this->belongsTo(Product::class, foreignKey: 'id', ownerKey:'user_id');
    }
}
