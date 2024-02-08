<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    const IMAGE_PATH = 'images/image';
    protected $fillable=['image'];
    protected $hidden=['created_at','updated_at'];
}
