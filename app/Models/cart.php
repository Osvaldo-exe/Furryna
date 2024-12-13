<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id', ownerKey: 'id');
    }

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class, foreignKey: 'product_id', ownerKey:'id');
    }
}
