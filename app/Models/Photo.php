<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use phpDocumentor\Reflection\Types\This;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'banners_photos';

    protected $fillable = ['path'];

    protected $baseDir = 'banners_photo/photo';

    public function banners()
    {
        return $this->belongsTo(Banner::class);
    }


    public static function formFrom(array|UploadedFile|null $file)
    {
        $photo = new static;

        $name = time() . '-' . $file->getClientOriginalName();

        $photo->path = $photo->baseDir . DIRECTORY_SEPARATOR . $name;

        $file->move($photo->baseDir, $name);

        return $photo;
    }
}
