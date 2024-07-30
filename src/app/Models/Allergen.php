<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Allergen extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $guarded = [
        'uuid',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'number'
    ];

    public function info(): MorphTo
    {
        return $this->morphTo('info');
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
