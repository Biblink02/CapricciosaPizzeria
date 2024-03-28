<?php

namespace App\Models;

use Filament\Tables\Actions\AttachAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Menu extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';

    protected $with = ['dishes'];
    protected $guarded = [
        'uuid',
        'created_at',
        'updated_at',
    ];
    protected $fillable=[
        'name',
        'img_url',
        'is_visible',
        'is_visible_in_menus',
    ];

    protected $appends = [
        'label'
    ];

    public function info(): MorphTo
    {
        return $this->morphTo('info');
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot(['price','sort_key']);
    }

    public function label(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name
        );
    }

    protected static function booted(): void
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->with(['dishes' => function ($query) {
                $query->where('is_visible', true)->orderBy('sort_key','asc');
            }]);
        });
    }
}
