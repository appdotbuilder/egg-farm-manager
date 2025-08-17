<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DailyProduction
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $production_date
 * @property int $total_eggs
 * @property int $good_eggs
 * @property int $broken_eggs
 * @property int $small_eggs
 * @property int $mortality_count
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereProductionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereTotalEggs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereGoodEggs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereBrokenEggs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereSmallEggs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereMortalityCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyProduction whereUpdatedAt($value)
 * @method static \Database\Factories\DailyProductionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class DailyProduction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'production_date',
        'total_eggs',
        'good_eggs',
        'broken_eggs',
        'small_eggs',
        'mortality_count',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'production_date' => 'date',
        'total_eggs' => 'integer',
        'good_eggs' => 'integer',
        'broken_eggs' => 'integer',
        'small_eggs' => 'integer',
        'mortality_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}