<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Chicken
 *
 * @property int $id
 * @property string $breed
 * @property int $quantity
 * @property \Illuminate\Support\Carbon $purchase_date
 * @property string $status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HealthRecord> $healthRecords
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereBreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereUpdatedAt($value)
 * @method static \Database\Factories\ChickenFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Chicken extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'breed',
        'quantity',
        'purchase_date',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'purchase_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the health records for the chicken.
     */
    public function healthRecords(): HasMany
    {
        return $this->hasMany(HealthRecord::class);
    }

    /**
     * Scope a query to only include healthy chickens.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHealthy($query)
    {
        return $query->where('status', 'healthy');
    }
}