<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Cache;

class Pdfmenu extends Model
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
        'pdf_url',
        'is_visible',
        'lang',
    ];
    public function info(): MorphTo
    {
        return $this->morphTo('info');
    }

    protected static function booted()
    {
        static::saved(function ($pdfmenu) {
            Cache::forget('pdfmenus_last_updated_' . $pdfmenu->lang);
        });

        static::deleted(function ($pdfmenu) {
            Cache::forget('pdfmenus_last_updated_' . $pdfmenu->lang);
        });
    }
}
