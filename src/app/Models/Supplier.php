<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Supplier extends Model
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

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::Class);
    }
}
