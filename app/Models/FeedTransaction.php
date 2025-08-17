<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\FeedTransaction
 *
 * @property int $id
 * @property int $feed_stock_id
 * @property string $type
 * @property string $quantity
 * @property string|null $cost
 * @property \Illuminate\Support\Carbon $transaction_date
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FeedStock $feedStock
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereFeedStockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedTransaction whereUpdatedAt($value)
 * @method static \Database\Factories\FeedTransactionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class FeedTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'feed_stock_id',
        'type',
        'quantity',
        'cost',
        'transaction_date',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'decimal:2',
        'cost' => 'decimal:2',
        'transaction_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the feed stock that owns the transaction.
     */
    public function feedStock(): BelongsTo
    {
        return $this->belongsTo(FeedStock::class);
    }
}