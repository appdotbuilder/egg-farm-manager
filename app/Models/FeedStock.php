<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\FeedStock
 *
 * @property int $id
 * @property string $feed_type
 * @property string $current_stock
 * @property string $minimum_stock
 * @property string $price_per_kg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FeedTransaction> $transactions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock whereFeedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock whereCurrentStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock whereMinimumStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock wherePricePerKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedStock whereUpdatedAt($value)
 * @method static \Database\Factories\FeedStockFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class FeedStock extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feed_stocks';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'feed_type',
        'current_stock',
        'minimum_stock',
        'price_per_kg',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'current_stock' => 'decimal:2',
        'minimum_stock' => 'decimal:2',
        'price_per_kg' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the transactions for the feed stock.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(FeedTransaction::class);
    }

    /**
     * Scope a query to only include low stock feeds.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowStock($query)
    {
        return $query->whereRaw('current_stock <= minimum_stock');
    }
}