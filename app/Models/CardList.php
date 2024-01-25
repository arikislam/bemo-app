<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CardList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
        'status',
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cardList) {
            $maxOrder = static::max('order');
            $cardList->order = $maxOrder + 1;
        });

        static::deleting(function ($cardList) {
            $deletedOrder = $cardList->order;
            static::where('order', '>', $deletedOrder)
                ->decrement('order');
        });
    }

}
