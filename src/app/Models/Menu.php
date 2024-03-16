<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Menu extends Model
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
        'event_uuid',
        'img_url',
        'is_visible'
    ];
    public function info(): MorphTo
    {
        return $this->morphTo('info');
    }

    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
