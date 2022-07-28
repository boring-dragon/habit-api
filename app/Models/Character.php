<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'race',
        'price',
        'image_path'
    ];

    protected $appends = [
        'character_img'
    ];

    public function getCharacterImgAttribute() : string
    {
        return "https://robohash.org/". $this->image_path;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
