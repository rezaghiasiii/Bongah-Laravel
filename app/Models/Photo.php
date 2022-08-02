<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'banners_photos';

    protected $fillable = ['photo'];

    public function banners()
    {
        return $this->belongsTo(Banner::class);
    }
}
