<?php

namespace App\Models\AppOfHolding;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @package App\Models\AppOfHolding
 * @property string $name
 * @property string $description
 * @property float $weight
 * @property int $cost
 */
class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'weight',
        'cost'
    ];

    public function inventory(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Character::class)
            ->as('inventory')
            ->withTimestamps();
    }
}
