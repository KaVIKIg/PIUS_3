<?php

namespace App\Domain\Reviews\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'name', 'description', 'like', 'dislike', 'customer_id',
    ];

    public function customers():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
