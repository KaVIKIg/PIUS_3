<?php

namespace App\Domain\Customers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name', 'purchased', 'discount',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
