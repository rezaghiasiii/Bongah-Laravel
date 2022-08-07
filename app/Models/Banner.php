<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['street','city','zip','country','state','price','description'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public static function locatedAt($zip,$street)
    {
        $street = str_replace('-',' ', $street);
        return static::where(compact('zip','street'))->first();
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }


    public function getPriceAttribute($price)
    {
        return '$' .  number_format($price);
    }

    public function getDescriptionAttribute($description)
    {
        return nl2br($description);
    }

    public function users()
    {
       return $this->belongsTo(User::class);
    }

    public function ownedBy(User $user)
    {
     return $this->user_id == $user->id;
    }
}
