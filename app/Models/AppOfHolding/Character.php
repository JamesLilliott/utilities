<?php

namespace App\Models\AppOfHolding;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Character
 *
 * @package App\Models\AppOfHolding
 * @property User $user_id
 * @property string $name
 * @property int $strength
 */
class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'strength',
    ];

    public function inventory(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Item::class)
            ->as('inventory')
            ->withTimestamps();
    }
}
