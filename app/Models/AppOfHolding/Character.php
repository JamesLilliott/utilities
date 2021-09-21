<?php

namespace App\Models\AppOfHolding;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Character
 * @package App\Models\AppOfHolding
 */
class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'strength',
    ];
}
