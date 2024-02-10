<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['background_id', 'shapes'];

    protected $casts = [
        'shapes' => 'array',
    ];

    public function background()
    {
        return $this->belongsTo(Image::class, 'background_id');
    }
}
