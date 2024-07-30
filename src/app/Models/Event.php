<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Event extends Model
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
        'is_visible',
        'starts_at',
        'ends_at',
        'description'
    ];
    public function info(): MorphTo
    {
        return $this->morphTo('info');
    }
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }
}
