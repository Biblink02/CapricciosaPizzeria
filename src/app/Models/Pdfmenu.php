<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
}
