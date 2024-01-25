<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'order',
        'card_list_id',
    ];


    public function cardList(): BelongsTo
    {
        return $this->belongsTo(CardList::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($card) {
            $maxOrder = $card->cardList->cards->max('order');
            $card->order = $maxOrder + 1;
        });
    }
}
