<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\HealthRecord
 *
 * @property int $id
 * @property int $chicken_id
 * @property \Illuminate\Support\Carbon $record_date
 * @property string $type
 * @property string $treatment_name
 * @property string|null $description
 * @property string|null $cost
 * @property \Illuminate\Support\Carbon|null $next_due_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Chicken $chicken
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereChickenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereRecordDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereTreatmentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereNextDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthRecord whereUpdatedAt($value)
 * @method static \Database\Factories\HealthRecordFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class HealthRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'chicken_id',
        'record_date',
        'type',
        'treatment_name',
        'description',
        'cost',
        'next_due_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'record_date' => 'date',
        'next_due_date' => 'date',
        'cost' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the chicken that owns the health record.
     */
    public function chicken(): BelongsTo
    {
        return $this->belongsTo(Chicken::class);
    }
}