<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Dish extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';

    protected $with = ['ingredients'];
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

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class)->withPivot('price');
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
