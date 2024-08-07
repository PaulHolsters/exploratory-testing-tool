<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $charter
 * @property string $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test find($id)
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCharter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereUpdatedAt($value)
 * @mixin Builder
 */
class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'charter', 'date'
    ];

    function bugreports(): HasMany
    {
        return $this->hasMany(BugReport::class);
    }
}
