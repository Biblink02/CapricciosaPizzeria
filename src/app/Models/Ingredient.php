<?php

namespace App\Models;

use Carbon\Factory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Ingredient extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = [
        'uuid',
        'created_at',
        'updated_at',
    ];
    protected $fillable=[
        'name',
        'img_url',
        'is_visible'
    ];
    public function info(): MorphTo
    {
        return $this->morphTo('info');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
