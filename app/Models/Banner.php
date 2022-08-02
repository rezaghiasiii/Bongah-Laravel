<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['street','city','zip','country','state','price','description'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopeLocatedAt($query,$zip,$street)
    {
        $street = str_replace('-',' ', $street);
        return $query->where(compact('zip','street'));
    }

    public function getPriceAttribute($price)
    {
        return '$' .  number_format($price);
    }

    public function getDescriptionAttribute($description)
    {
        return nl2br($description);
    }
}
