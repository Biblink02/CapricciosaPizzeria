<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Dish extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $with = ['ingredients', 'allergens'];
    protected $guarded = [
        'uuid',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
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
        return $this->belongsToMany(Menu::class)->withPivot(['price', 'sort_key']);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('sort_key');
    }

    public function allergens(): BelongsToMany
    {
        return $this->belongsToMany(Allergen::class);
    }

    protected static function booted(): void
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->with(['ingredients' => function ($query) {
                $query->where('is_visible', true)->orderBy('sort_key', 'asc');
            }]);
        });
    }
}
